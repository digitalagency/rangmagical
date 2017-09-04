<?php
if (!empty($user_detail)) {
    $action = base_url() . 'admin/User/editUser/' . $user_detail->id;
} else {
    $action = base_url() . 'admin/User/addUser';
}
?> 

<div class="box box-info">
    <div class="box-header with-border">
         <section class="content-header">
          <h1>
            <?php if (!empty($user_detail)) { echo "Edit Registration Number"; } else { echo "Add Registration Number"; } ?>
          </h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1', 'enctype' => 'multipart/form-data');
        echo form_open($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Registration Number :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="registration_number" id='registration_number' class="form-control" value='<?php if (!empty($user_detail)) echo $user_detail->registration_number; ?>' />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Passcode:<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="passcode" id='passcode' class="form-control" value='<?php if (!empty($user_detail)) echo $user_detail->passcode; ?>' />
            </div>
        </div>
        <?php if (!empty($user_detail)) {?>
        <div class="form-group">
            <label class="col-sm-3 control-label">Full Name:<!-- <span class="asterisk">*</span> --></label>
            <div class="col-sm-7">
                <input type="text" name="full_name" id='full_name' class="form-control" value='<?php if (!empty($user_detail)) echo $user_detail->full_name; ?>' />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Main Region:<!-- <span class="asterisk">*</span> --></label>
            <div class="col-sm-7">                
                <select class="form-control chosen-select" name='main_region' id="main_region" data-placeholder="Choose Main Region">
                    <option value='0'>Main Region</option>
                    <?php foreach ($main_region as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>' <?php if(!empty($user_detail) && $user_detail->main_region == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->region; ?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Sub Region:<!-- <span class="asterisk">*</span> --></label>
            <div class="col-sm-7">                               
                <select class="form-control chosen-select" name='sub_region' id="sub_region" data-placeholder="Choose Sub Region">
                    <option value='0'>Sub Region</option>
                    <?php 
                    if(!empty($user_detail)  && !empty($user_detail->main_region))
                    {
                        //echo "main_region = ".$user_detail->main_region;exit();
                    $parent_id = $user_detail->main_region;
                    $where = array('parent_id'=>$parent_id); 
                    $sub_region = $this->general_model->getAll('tbl_regions',$where);
                    
                    foreach ($sub_region as $key => $value) {?>
                    <option value='<?php echo $value->id; ?>' <?php if(!empty($user_detail) && $user_detail->sub_region == $value->id){ echo "selected='selected'"; } ?>><?php echo $value->region; ?></option>
                    <?php  
                    } 
                    }
                    ?>
                    <?php ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Coupon Number:<!-- <span class="asterisk">*</span> --></label>
            <div class="col-sm-7">
                <input type="text" name="coupon_no" id='coupon_no' class="form-control" value='<?php if (!empty($user_detail)) echo $user_detail->coupon_no; ?>' />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Coupon Quantity:<!-- <span class="asterisk">*</span> --></label>
            <div class="col-sm-7">
                <input type="text" name="coupon_qty" id='coupon_qty' class="form-control" value='<?php if (!empty($user_detail)) echo $user_detail->coupon_qty; ?>' />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Image:<!-- <span class="asterisk">*</span> --></label>
            <div class="col-sm-7">
                <input type="file" name="image" id='image' class="form-control" />
            </div>
        </div>
        <?php } ?>
        <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-7">
                <input type="hidden" name="medium" id='medium' value='admin' />
                <button class="btn btn-success btn-flat" type="submit">
                    <?php
                    if (!empty($user_detail)) {
                        echo 'Update';
                    } else {
                        echo 'Add';
                    }
                    ?>
                </button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->

<script type="text/javascript">
$('document').ready(function(){
    /*$("#main_region").on("change",function(){
        var parent_id = $(this).val();
        $.ajax({
             url : "User/get_sub_regions/"+parent_id,
             type: "post",
             success : function(data){
                 $("#sub_region").html(data);
             },
        });
    });*/

    /*$("#main_region").change(function(){
        var parent_id = $(this).val();
        $("#sub_region").load("User/get_sub_regions/"+parent_id);
    });*/
    
     $('#main_region').on('change', function() {
            var parent_id = $(this).val();
            //alert(parent_id);
            if(parent_id) {
                $.ajax({
                    url: 'User/get_sub_regions/'+parent_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#sub_region').empty();
                        $.each(data, function(key, value) {
                            $('#sub_region').append('<option value="'+ value.id +'">'+ value.region +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
});
</script>