<div class="row">
  <div class="col-md-12">
    <h1>Welcome To <?php echo $title;?>.</h1>
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $total_registered_users; ?></h3>
        <p>Registered Users</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-stalker"></i>
      </div>
      <a href="<?php echo base_url(); ?>admin/User/registered/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $total_registration_numbers; ?></h3>
        <p>Total Registration Numbers</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-people"></i>
      </div>
      <a href="<?php echo base_url(); ?>admin/User/registration_numbers/all" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $total_gift_coupons; ?></h3>
        <p>Total Gift Coupons</p>
      </div>
      <div class="icon">
        <i class="ion ion-xbox"></i>
      </div>
      <a href="<?php echo base_url(); ?>admin/Coupon" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $gift_coupons_taken; //$total_giftcoupons_taken; ?></h3>
        <p>Gift Coupons Taken</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-chatbubble"></i>
      </div>
      <a href="<?php echo base_url(); ?>admin/Coupon/taken" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
