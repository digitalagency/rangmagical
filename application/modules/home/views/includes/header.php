
<?php
$menuSelected = 'home';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>Home Page / Rang Magical /Berger Nepal</title>

    <link href="<?php echo base_url();?>content_home/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>content_home/css/wstyle.css" rel="stylesheet">
    <link href="<?php echo base_url();?>content_home/css/others.css" rel="stylesheet">
    <link href="<?php echo base_url();?>content_home/css/responsive.css" rel="stylesheet" media="screen">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="<?php echo base_url();?>content_home/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url();?>content_home/images/favicon.ico" type="image/x-icon">

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body>

<section class="container">
	<nav class="navbar navbar-default navbar">
		<div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php $this->load->view('includes/menu');?>
        </div>
		<!-- /.navbar-collapse -->
<!-- /.container -->
    </nav>