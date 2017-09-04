<div class="gallery1">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <input type="text" class="inputBox" id="search_for_name" placeholder="Search for Name" style="width:90%; padding: 10px; margin: 20px 0;" value="<?php if(isset($_GET['addtolist'])){echo $mydb->getValue('medicine_name','tbl_medicine','id='.$_GET['addtolist']);} ?>">
    </div>
    <div style="clear:both"></div>
  </div>
  <?php
    //print_r($users);
    if($users)
    {
    foreach($users as $key=>$value)
    {
    $imagepath = $value->imagepath;
    $imagename = $value->imagename;
    $imagesrc = base_url().$imagepath.'thumb/'.$imagename;
    ?>
  <?php
    $share_url = base_url() . 'photo-gallery-single.php?photo_id=11';
    $encodedurl = urlencode($share_url);                
    ?>
  <div class="img-section">
    <?php
    $name = $value->full_name;
    if(!empty($imagepath) && !empty($imagename) && file_exists(FCPATH.$imagepath.$imagename))
    {
    //show your image from db
    ?>
    <div style="display:block; height:125px; width:165px;"> <a href="<?php echo SITEROOTFB.'/gallery_single.php';?>?photo_id=<?php echo $rasActImg['id'];?>" title="<?php echo $name;?>"><img src="<?php echo $imagesrc;?>" alt=""  style="max-width:163px; height:125px;"/> </a> </div>
    <?php
    echo '<br><span style="color: #000; font-size: small; padding-bottom:5px; display: block;" title="'.ucwords(strtolower($name)).'">'.ucwords(strtolower(substr($name,0,20))).'</span>';
    $photo_id = $rasActImg["id"];              
    ?>
    <div class="fb-like" data-href="<?php echo $share_url;?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false" style="overflow:hidden;"></div>
    <div class="countNum"><span id="img-<?php echo $rasActImg['id']; ?>"><?php echo $rasActImg['likes'];?></span> </div>
    <div class="fb-share-button" data-href="<?php echo $share_url;?>" data-layout="button" style="overflow:hidden;"></div>
    <div id="fb-root" style="display:none;"></div>
    <script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <?php
    }
    else
    {
      echo $imagesrc;  //show your default image
    ?>
    <img src="<?php echo base_url()."content_home/images/default-image.png";?>" alt="" width="163" height="130"/>
    <?php
    }
    ?>
  </div>
  <?php
    } // end foreach
    } // end if
    if(isset($nor) && $nor>20)
    {
    ?>
  <div class='paginaion99' style="margin-top:20px;"><a href='gallery.php?pg=<?php echo $code;?>'>View All</a></div>
  <div style="clear:both"></div>
  <?php
    }
    ?>
</div>
