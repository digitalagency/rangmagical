<div class="terms-conditions upload-procedure">
  <div class="row">
    <div class="col-md-offset-1 col-md-10">
      <div class="procedure-wrap" style="background: none;">
        <div style="padding-left:75px; width:500px; text-align:center; color:#5C2D91;"> <span style="font-size:50px;">Congratulations</span><br>
          <br>
          <span style="font-size:20px;">
          <?php
            if(isset($regno) && !empty($regno)) 
            {
              echo "You have won<br>";
              $gift = $this->home_model->getGift($regno);
              $gift_arr = explode('___',$gift);
              ?>
            <div style="padding-left:50px;"><img src="<?php echo base_url();?>content_home/images/<?php echo $gift_arr['0'];?>"></div>
            <?php
            echo "e-coupon Number : ".$gift_arr['1'];
            echo "<br>";
            echo "<br>";
            }
            ?>
          Your photo has been <br>
          SUCCESSFULLY UPLOADED<br>
          <br>
          GET MAXIMUM LIKES IN YOUR <br>
          HOUSE PHOTO<br>
          <br>
          INCREASE YOUR CHANCES TO WIN <br>
          BUMPER PRIZE<br>
          </span> </div>
      </div>
    </div>
  </div>
</div>
