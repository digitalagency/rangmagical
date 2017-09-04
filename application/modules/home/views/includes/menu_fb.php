
    <div class="menu">
        <ul>
            <li class="homeNav"><a href="<?php echo base_url();?>facebook/home" <?php if(@$menu == 'home') echo 'class="active"';?>>Home</a></li>
            <li class="ternsNav"><a href="<?php echo base_url();?>facebook/terms_and_condition" <?php if(@$menu == 'terms') echo 'class="active"';?>>Terms &amp; Conditions</a></li>
            <li class="uploadNav"><a href="<?php echo base_url();?>facebook/upload_procedure" <?php if(@$menu == 'procedure') echo 'class="active"';?>>Upload Procedure</a></li>
            <li class="regNav"><a href="<?php echo base_url();?>facebook/photo_upload" <?php if(@$menu == 'register') echo 'class="active"';?>>Photo Upload</a></li>
            <li class="photoNav"><a href="<?php echo base_url();?>facebook/photo_album" <?php if(@$menu == 'album') echo 'class="active"';?>>Photo Album</a></li>
        </ul>
    </div>

<?php /*<ul class="nav navbar-nav">
	<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
	<li <?php if(@$menu == 'home') echo 'class="active"'; ?>><?php echo $menu;?><a href="<?php echo base_url();?>">Homes</a></li>
	<li <?php if(@$menu == 'terms') echo 'class="active"'; ?>><a href="<?php echo base_url();?>terms-and-condition">Terms & Conditions</a></li>
	<li <?php if(@$menu == 'procedure') echo 'class="active"'; ?>><a href="<?php echo base_url();?>upload-procedure">Upload Procedure</a></li>
	<li <?php if(@$menu == 'register') echo 'class="active"'; ?>><a href="<?php echo base_url();?>photo-upload">Photo Upload</a></li>
	<li <?php if(@$menu == 'album') echo 'class="active"'; ?>><a href="<?php echo base_url();?>photo-album">Photo Album</a></li>
</ul> */?>