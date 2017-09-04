<div class="ecoupon">
  <div class="row">
    <div class="col-md-12">
      <div class="gallery">
        <div class="form" style="height:25px;">Choose one e-coupon</div>
        <?php
        if(isset($ecoupon))
        {
        foreach($ecoupon as $key=>$value)
        {   
        $coupon_id = $value['id'];
        $coupon_code = $value['coupon_code'];
        $prize_details = $value['prize_details'];
        $imagesrc = base_url().'content_home/images/logo.png'; 
        ?>
        <div class="img-section"><a href="<?php echo base_url();?>ecoupon-process/<?php echo $coupon_code.'/'.$regno;?>"><img src="<?php echo $imagesrc;?>" ></a>
          <div class="desc"><?php echo $coupon_code;?></div>
        </div>
        <?php
        } // end foreach
        } // end if
        ?>
      </div>
    </div>
  </div>
</div>