
<?php $this->load->view('includes/header');?>
<?php $this->load->helper("view_helper"); ?>

<!-- body start -->
<div class="container">
        <div class="row">
            <div id="login-detail">
            <?php $this->load->view('admin/common/flash_message'); ?>
            <?php
            ?>
            <?php $this->load->view($main);?>
        </div>
    </div>
</div>
<!-- body end -->

<?php $this->load->view('includes/footer');?>
