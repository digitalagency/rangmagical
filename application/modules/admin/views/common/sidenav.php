<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="background-color: #fff;">
        <div class="pull-left">
          <img src="<?php echo base_url();?>/content_admin/images/logo.png" alt="S M Pharma" width="100%" class="img-responsive">
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class ="<?php if($nav == 'dashboard'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-home"></i><span>DASHBOARD</span></a></li>
        <li class ="<?php if($this->uri->segment(3) == 'registered'){ echo 'active'; } ?>"><a href="javascript:void(0);"><i class="fa fa-user"></i><span>REGISTERED USERS</span></a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(4) == 'all'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/User/registered/all"><i class="fa fa-circle-o"></i> All</a></li>
            <li class="<?php if($this->uri->segment(4) == 'BRMG-K'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/User/registered/BRMG-K"><i class="fa fa-circle-o"></i> Kathmandu</a></li>
            <li class="<?php if($this->uri->segment(4) == 'BRMG-P'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/User/registered/BRMG-P"><i class="fa fa-circle-o"></i> Pokhara</a></li>
            <li class="<?php if($this->uri->segment(4) == 'BRMG-E'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/User/registered/BRMG-E"><i class="fa fa-circle-o"></i> Eastern</a></li>
            <li class="<?php if($this->uri->segment(4) == 'BRMG-C'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/User/registered/BRMG-C"><i class="fa fa-circle-o"></i> Central</a></li>
            <li class="<?php if($this->uri->segment(4) == 'BRMG-W'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/User/registered/BRMG-W"><i class="fa fa-circle-o"></i> Western</a></li>
          </ul>
        </li>
        <li class ="<?php if($this->uri->segment(3) == 'registration_numbers'){ echo 'active'; } ?>"><a href="javascript:void(0);"><i class="fa fa-users "></i><span>REGISTRATION NUMBERS</span></a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(4) == 'all'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/User/registration_numbers/all"><i class="fa fa-circle-o"></i> All</a></li>
            <li class="<?php if($this->uri->segment(4) == 'BRMG-K'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/User/registration_numbers/BRMG-K"><i class="fa fa-circle-o"></i> Kathmandu</a></li>
            <li class="<?php if($this->uri->segment(4) == 'BRMG-P'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/User/registration_numbers/BRMG-P"><i class="fa fa-circle-o"></i> Pokhara</a></li>
            <li class="<?php if($this->uri->segment(4) == 'BRMG-E'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/User/registration_numbers/BRMG-E"><i class="fa fa-circle-o"></i> Eastern</a></li>
            <li class="<?php if($this->uri->segment(4) == 'BRMG-C'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/User/registration_numbers/BRMG-C"><i class="fa fa-circle-o"></i> Central</a></li>
            <li class="<?php if($this->uri->segment(4) == 'BRMG-W'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/User/registration_numbers/BRMG-W"><i class="fa fa-circle-o"></i> Western</a></li>
          </ul>
        </li>
        <li class ="<?php if($nav == 'Coupon'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Coupon"><i class="fa fa-gift "></i><span>COUPONS</span></a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(3) == ''){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Coupon"><i class="fa fa-circle-o"></i> All</a></li>
            <li class="<?php if($this->uri->segment(3) == 'taken'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/Coupon/taken"><i class="fa fa-circle-o"></i> Taken</a></li>
          </ul>
        </li> 
      </ul>
  </section>
    <!-- /.sidebar -->
</aside>
