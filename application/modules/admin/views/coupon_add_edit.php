<?php
if (!empty($coupon_detail)) {
    $action = base_url() . 'admin/Coupon/editCoupon/' . $coupon_detail->id;
} else {
    $action = base_url() . 'admin/Coupon/addCoupon';
}
?> 

<div class="box box-info">
    <div class="box-header with-border">
         <section class="content-header">
          <h1>
            <?php if (!empty($coupon_detail)) { echo "Edit Coupon"; } else { echo "Add Coupon"; } ?>
          </h1>
        </section>
    </div>
    <div class="panel-body panel-body-nopadding">
        <?php
        $attributes = array('class' => 'form-horizontal form-bordered', 'id' => 'form1', 'enctype' => 'multipart/form-data');
        echo form_open($action, $attributes);
        ?>

        <div class="form-group">
            <label class="col-sm-3 control-label">Coupon Code :<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="coupon_code" id='coupon_code' class="form-control" value='<?php if (!empty($coupon_detail)) echo $coupon_detail->coupon_code; ?>' />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Prize Details:<span class="asterisk">*</span></label>
            <div class="col-sm-7">
                <input type="text" required name="prize_details" id='prize_details' class="form-control" value='<?php if (!empty($coupon_detail)) echo $coupon_detail->prize_details; ?>' />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-7">
                <button class="btn btn-success btn-flat" type="submit">
                    <?php
                    if (!empty($coupon_detail)) {
                        echo 'Update Coupon';
                    } else {
                        echo 'Add Coupon';
                    }
                    ?>
                </button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div><!-- panel-body -->
</div><!-- panel -->

