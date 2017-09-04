
<script src="<?php echo base_url();?>content_home/js/jquery-min-1.11.1.js"></script>
    <script type="text/javascript">

    $(document).ready(function() {
    var container = document.getElementsByClassName("container")[0];
    container.onkeyup = function (e) {
        var target = e.srcElement;
        var maxLength = parseInt(target.attributes["maxlength"].value, 15);
        var myLength = target.value.length;
        if (myLength >= maxLength) {
            var next = target;
            while (next = next.nextElementSibling) {
                if (next == null)
                    break;
                if (next.tagName.toLowerCase() == "input") {
                    next.focus();
                    break;
                }
            }
        }
    }

    var wrapper = $(".container");
    $("#addButton").click(function(e){ //on add input button click
        e.preventDefault();
        $(wrapper).append('<input class="textbox" maxlength="7" type="text" name="couponumber[]" id="couponumber[]" style="float:left; width: 22%;">');
    });

});
</script>
<style>
    .error {
        color: #f00;
        margin-bottom: 10px;
        text-align: center;
        font-weight: bold;
        background-color: mintcream;
        padding: 1px;
    }
</style>

<!-- <div id="wrapper" class="for">
  <?php /*include_once("include/menu.php");*/ ?>
  <div class="form">
    <div class="logo"> <img src="images/logo.png"> </div>
    <div class="content">
      <div class="error" style="color:#FFF; font-weight:bold;">Thank You Dear Valued customer’s for immense support.</div>
      <div class="error" style="color:#FFF; font-weight:bold; text-align:left;font-size: 15px;">We are glad to get thousands of entries for Berger Nagadpati Competition. The judgment process is ongoing and we will be soon declaring the winners.</div>

    </div>
  </div>
</div> -->

<script>
 function showSubregion(region_id)
 {  
    $.get( "../home/showSubregion/"+region_id+"/selectbox", { region_id: region_id } )
    .done(function( data ) {
    $("#div_address").html(data);
    });
 }

 function showPatterns(shade)
 {
    if(shade=="metalica")
    {
        $(".pattern").prop('checked', false);
        $(".pattern").attr("checked", false);
        uncheckRadio();
        $("#nonmetalica").hide();
        $("#metalica").show();
    }
    else
    {    
        $(".pattern").prop('checked', false);
        $(".pattern").attr("checked", false);
        uncheckRadio();
        $("#metalica").hide();    
        $("#nonmetalica").show();
    }

  //   $("#loading").show();
  // $.get( "showPatterns.php", { shade: shade } )
  // .done(function( data ) {
  //   $("#showPattern").html(data);
  //   $("#loading").hide();
  //});
 }

 function uncheckRadio()
 {
    var allRadios = document.getElementsByName('pattern');
        var booRadio;
        var x = 0;
        for(x = 0; x < allRadios.length; x++){

            allRadios[x].onclick = function() {
                if(booRadio == this){
                    this.checked = false;
                    booRadio = null;
                }else{
                    booRadio = this;
                }
            };
        }
 }
</script>

      

<!-- prettyPhoto starts here -->
<link rel="stylesheet" href="<?php echo base_url();?>content_home/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<script src="<?php echo base_url();?>content_home/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css">      
a.pp_previous, a.pp_next, pp_arrow_previous, pp_arrow_next, .pp_nav, .pp_description, .pp_gallery, .pp_expand{
display: none !important;
}
</style>
<!-- prettyPhoto ends here -->

      <div class="form">
        <div class="logo" style="padding-top: 20px;"></div>
        <div class="content">
            <?php $this->load->view('includes/flash_message'); ?>
            <?php 
            if (isset($_GET['message']) && !empty($_GET['message']))
                $message = $_GET['message'];
            if(!empty($message)){
            ?>
                <div class="error"><?php echo $message; ?></div>
            <?php } ?>
            <?php if (isset($_GET['m']) && $_GET['m'] == "succ") { ?>
                <div class="error">You are registered successfully!!!</div>
            <?php } else { ?>
            <form name="frmt" action="<?php echo site_url().'facebook/photo_album_process';?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Customers Name :</label>
                    <input class="textbox" required type="text" name="fname" id="fname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname'];?>">
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label>Regd. No. :</label>
                    <input class="textbox" required type="text" name="regno" id="regno" value="<?php if(isset($_POST['regno'])) echo $_POST['regno'];?>" maxlength="14" style="text-transform:uppercase">
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label>Passcode :</label>
                    <input class="textbox" required type="text" name="passcode" id="passcode" value="<?php if(isset($_POST['passcode'])) echo $_POST['passcode'];?>">
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label>Coupon No. :</label>                      
                    <div class="clear"></div>
                    <div class="container">
                    <?php for($i=0;$i<12;$i++){?>
                    <input class="textbox" maxlength="7" type="text" name="couponumber[]" id="couponumber[]" style="float:left; width: 22%;" value="<?php if(isset($_POST['couponumber'][$i])) echo $_POST['couponumber'][$i];?>" >
                    <?php } ?>
                    </div>
                    <input type='button' value='Add More' id='addButton' style="float: left; width: 22%;">
                    <div class="clear"></div>
                </div>                    
                <div class="form-group">
                      <?php
                        $metallica_checked='checked="checked"';
                        $nonmetallica_checked='';
                        $metallica_show ='';
                        $nonmetallica_show ='style="display:none;"';
                      if(isset($_POST['shade']) && $_POST['shade']=="Non- Metallica")
                      {
                        $metallica_checked="";
                        $nonmetallica_checked='checked="checked"';
                        $metallica_show ='style="display:none;"';
                        $nonmetallica_show ='';
                      }
                      ?>
                    <label>Illusion Shade:</label><span id="loading" style="display:none; color:#FFFFFF;"><img src="<?php echo base_url();?>content_home/images/loading.gif" height="20" title="Loading... Please wait!!" alt="Loading... Please wait!!" />Loading Patterns. . . Please wait!!</span>  
                    <div class="clear"></div>
                    <input class="textbox" required type="radio" name="shade" id="shade" value="Metallica" style="width: 5%; float: left;" <?php echo $metallica_checked;?>  onChange="showPatterns('metalica')" ><label>Metallica</label>
                    <div class="clear"></div>
                    <input class="textbox" required type="radio" name="shade" id="shade" value="Non- Metallica" style="width: 5%; float: left;" <?php echo $nonmetallica_checked;?> onChange="showPatterns('nonmetalica')"><label>Non- Metallica</label>
                    <div class="clear"></div>
                </div>                    
                <div class="form-group" id="metalica" <?php echo $metallica_show;?>>
                    <?php
                    $counter=1;
                    $dir = base_url()."content_home/images/metallica/";
                    foreach($metallica as $key=>$value){
                    $file = $value->pattern;
                    $color = str_replace(".jpg","",$file);
                    $colorname = str_replace(".jpg","",$file);
                    $colorname = str_replace("Metalica ","",$colorname);
                    $colorname = str_replace("Metallica ","",$colorname);
                    $colorname = str_replace("_"," ",$colorname);
                    
                    ?>
                    <input class="textbox pattern" type="radio" name="pattern" id="pattern" required value="<?php echo $file;?>" <?php if(isset($_POST['pattern']) && $_POST['pattern']==$file) echo 'checked="checked"';?> style="width: 5%; float:left;">
                    <a href="<?php echo $dir.'large/'.$file;?>" rel="prettyPhoto[pp_gal]" title="<?php echo $colorname;?>"><img src="<?php echo $dir.$file;?>" title="<?php echo $colorname;?>" alt="<?php echo $colorname;?>" style="width: 7%; float:left; padding-bottom:5px; padding-right:5px;"/></a>
                    <?php
                    if($counter%7==0)
                            echo '<div class="clear"></div>';
                    ++$counter;
                    }
                    ?>
                    <div class="clear"></div>
                </div>

                <div class="form-group" id="nonmetalica" <?php echo $nonmetallica_show;?> >
                    <?php
                    $counter=1;
                    $dir = base_url()."content_home/images/nonmetallica/";
                    foreach($nonmetallica as $key=>$value){
                    $file = $value->pattern;
                    $color = str_replace(".jpg","",$file);
                    $colorname = str_replace(".jpg","",$file);
                    $colorname = str_replace("Metalica ","",$colorname);
                    $colorname = str_replace("Metallica ","",$colorname);
                    $colorname = str_replace("_"," ",$colorname);
                    ?>
                    <input class="textbox pattern" type="radio" name="pattern" id="pattern" required value="<?php echo $file;?>" <?php if(isset($_POST['pattern']) && $_POST['pattern']==$file) echo 'checked="checked"';?> style="width: 5%; float:left;">
                    <a href="<?php echo $dir.'large/'.$file;?>" rel="prettyPhoto[pp_gal]" title="<?php echo $colorname;?>"><img src="<?php echo $dir.$file;?>" title="<?php echo $colorname;?>" alt="<?php echo $colorname;?>" style="width: 7%; float:left; padding-bottom:5px; padding-right:5px;"/></a>
                    <?php
                    if($counter%7==0)
                            echo '<div class="clear"></div>';
                    ++$counter;
                    }
                    ?>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label>Main Region :</label>
                    <input class="textbox" type="text" name="main_region" id="main_region" value="<?php if(isset($_POST['main_region'])) echo $_POST['main_region'];?>" readonly>                        
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label>Sub Region :</label>                        
                      <div id="div_address" style="float: left;">
                      <select name = "sub_region" id="sub_region" class="selectbox" style="width:311px;">
                        <option value="0">Select sub region</option>
                        <?php
                        if(isset($_POST['main_region']))
                        {
                          $subregion = $this->home_model->getSubregions_by_main_region($_POST['main_region']);
                          foreach($subregion as $key2=>$value2)
                          {
                          ?>
                            <option value="<?php echo $value2->region;?>" <?php if(isset($_POST['sub_region']) && $_POST['sub_region']==$value2->region) echo 'selected="selected"';?>><?php echo $value2->region;?></option>
                          <?php
                          }
                        }
                        ?>
                      </select>
                      </div>
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <label>Your home Photo :</label>
                    <input type="file" required class="file" name="houseimage" id="houseimage">
                    <div class="clear"></div>
                </div>
                <div class="form-group">
                    <span style="color:#FFF"><b>Note : </b>The image size must not exceed 6mb.</span>
                    <div class="clear"></div>
                </div>
                <div class="form-group submit">
                    <input type="submit" value="Register" name="btnsubmit" id="btnsubmit" style="cursor:pointer; float:left;">
                    <div class="clear"></div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>

    <script>
    $("#regno").on("blur", function () {
        regno = $(this).val();
        regno = regno.toUpperCase();
        //console.log(regno.indexOf('BRMG-K'));

        if (regno.indexOf('BRMG-K') > -1)
        {
            $("#main_region").val( "Kathmandu" );
            showSubregion('Kathmandu');
        }
        else if (regno.indexOf('BRMG-P') > -1)
        {
            $("#main_region").val("Pokhara");
            showSubregion('Pokhara');
        }
        else if (regno.indexOf('BRMG-E') > -1 )
        {
            $("#main_region").val("Eastern");
            showSubregion('Eastern');
        }     
        else if( regno.indexOf('BRMG-COM') > -1 )
        {
            $("#main_region").val("Commercial");
            showSubregion('Commercial');
        }
        else if (regno.indexOf('BRMG-C') > -1 )
        {
            $("#main_region").val("Central");  
            showSubregion('Central');
        }      
        else if( regno.indexOf('BRMG-W') > -1 )
        {
            $("#main_region").val("Western");
            showSubregion('Western');
        }
        else
        {
            $("#main_region").html("");
        }

    });
</script>       
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='prettyPhoto']").prettyPhoto({
      animation_speed: 'normal', /* fast/slow/normal */
      opacity: 0.80, /* Value between 0 and 1 */
      show_title: true, /* true/false */
      allow_resize: true, /* true/false */
      default_width: 500,
      default_height: 500,
      theme: 'facebook', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
      horizontal_padding: 20, /* The padding on each side of the picture */
      modal: false, /* If set to true, only the close button will close the window */
      deeplinking: false, /* Allow prettyPhoto to update the url to enable deeplinking. */
      ie6_fallback: true,
      social_tools:false
    });
  });
</script>  