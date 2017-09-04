<div class="terms-conditions photoalbum" style="height: 1170px; padding-top:20px;">
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <input type="text" class="inputBox" id="search_for_name" placeholder="Search for Name" style="width:100%; padding: 10px; margin-bottom: 20px;" value="<?php if(isset($_GET['addtolist'])){echo $mydb->getValue('medicine_name','tbl_medicine','id='.$_GET['addtolist']);} ?>">
  </div>
  <div style="clear:both"></div>
</div>
<div class="row">
  <?php      
      $nor = $mydb->getCount('id', 'tbl_photo', 'user_id LIKE "'.$code.'%" AND imagepath!="" AND imagename!=""');
      $ps = 16;
      $nop = ceil($nor/$ps);
      if(isset($_GET['page']))
        $page = $_GET['page'];
      else
        $page = 1;
      $from = $ps*($page-1);

      //$resGal = $mydb->getQuery('*', 'tbl_photo', 'user_id LIKE "'.$code.'%" AND imagepath!="" AND imagename!="" ORDER BY likes DESC, id ASC LIMIT 16');
      $resGal = $mydb->getQuery('tp.*', 'tbl_photo tp INNER JOIN tbl_user tu ON tp.user_id=tu.  registration_number ', 'tp.user_id LIKE "'.$code.'%" AND tp.imagepath!="" AND tp.imagename!="" ORDER BY tu.full_name ASC LIMIT '.$from.','.$ps);
      while($rasGal = $mydb->fetch_array($resGal))
      {
        $name = $mydb->getValue('full_name','tbl_user',"registration_number='".$rasGal['user_id']."'" );
        //facebook likes starts here
        $share_url = SITEROOT . 'photo-gallery-single.php?photo_id='.$rasGal['id'];
        $encodedurl = urlencode($share_url);
        $data = file('https://graph.facebook.com/v2.5/?id=' . $encodedurl . '&fields=og_object{engagement{count},likes.summary(true).limit(0)}&access_token=150106818774279|676a1cc018cdf5e5086000dd7c2ab64e');
        $tempLikeData = array();
        $tempLikeData = (array)json_decode($data[0], true);
        // echo "<pre>";

        $imagepath = SITEROOT.$rasGal['imagepath']."thumb/".$rasGal['imagename'];
        $imagepathdoc = SITEROOTDOC.$rasGal['imagepath']."thumb/".$rasGal['imagename'];

        if(file_exists($imagepathdoc))
          $imagepath = SITEROOT.$rasGal['imagepath']."thumb/".$rasGal['imagename'];
        else
          $imagepath = SITEROOT."images/default-image.jpg";
        $tc = 0;
        if (isset($tempLikeData['og_object'])) {
            $bj = $tempLikeData['og_object'];
            $lik = $bj['likes'];
            $summ = $lik['summary'];
            $tc = $summ['total_count'];

            //Update Database
            $data_likes = '';
            $data_likes['likes'] = $tc;
            $mydb->updateQuery('tbl_photo',$data_likes,'id='.$rasGal['id']);
        }
      ?>
  <div class="col-md-3 col-sm-4 col-xs-6">
    <figure class="defult-img"> <a href="<?php echo $share_url;?>"><img src="<?php echo $imagepath;?>" alt="#" style="max-height:150px; margin: auto;"></a> <br>
      <span style="color: #000; font-size: small; padding-bottom:5px; display: block;" title="<?php echo ucwords(strtolower($name));?>"><?php echo ucwords(strtolower(substr($name,0,20)));?></span>
      <?php if(isset($_GET['show'])){?>
      <div class="like_section">
        <div class="fb-like" data-href="<?php echo $share_url;?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true" style="overflow:hidden;"></div>
      </div>
      <div style="display:none;"><?php print_r($tempLikeData);?></div>
      <?php } ?>
      <div class="fb-like" data-href="<?php echo $share_url;?>" data-layout="button" data-action="like" data-show-faces="false" data-share="false" style="overflow:hidden;"></div>
      <div class="countNum"><span id="img-<?php echo $rasGal ['id']; ?>"><?php echo $rasGal ['likes'];?></span> </div>
      <div class="fb-share-button" data-href="<?php echo $share_url;?>" data-layout="button" style="overflow:hidden;"></div>
      <div id="fb-root" style="display:none;"></div>
    </figure>
  </div>
  <?php
      } //while close
      ?>
</div>
<nav class="text-center" aria-label="Page navigation example">
  <?php 
  if($page>1)
    $previous = SITEROOT.'photo-gallery.php?pg='.$_GET['pg'].'&page='.($page-1);
  else
    $previous = SITEROOT.'photo-gallery.php?pg='.$_GET['pg'].'&page=1';

  if($page<$nop)
    $next = SITEROOT.'photo-gallery.php?pg='.$_GET['pg'].'&page='.($page+1);
  else
    $next = SITEROOT.'photo-gallery.php?pg='.$_GET['pg'].'&page='.$nop;

  ?>
  <ul class="pagination">
    <li class="page-item"> <a class="page-link" href="<?php echo $previous;?>" aria-label="Previous"> <span aria-hidden="true"><i class="fa fa-angle-left"></i></span> <span class="sr-only">अघि</span> </a> </li>
    <?php
    for($i=1;$i<=$nop;$i++)
    {
    ?>
    <li class="page-item"><a class="page-link" href="<?php echo SITEROOT.'photo-gallery.php?pg='.$_GET['pg'].'&page='.$i;?>"><?php echo $i;?></a></li>
    <?php
    }
    ?>
    <li class="page-item"> <a class="page-link" href="<?php echo $next;?>" aria-label="Next"> <span class="sr-only">पछि</span> <span aria-hidden="true"><i class="fa fa-angle-right"></i></span> </a> </li>
  </ul>
</nav>
<div>