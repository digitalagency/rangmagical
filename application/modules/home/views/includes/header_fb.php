<!DOCTYPE html>
<html lang="en">
<head>
    <head>
    <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Berger Nepal / Register Page</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url();?>content_home/css/style.css" type="text/css" rel="stylesheet">
    <script type="text/javascript">
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1423829414589134',
            status     : true,
            xfbml      : true,
            version    : 'v2.0'
          });
          FB.Canvas.setAutoGrow();
        FB.Event.subscribe('edge.create',
           function(response) {
             $.fancybox.close();
           }
        );
        FB.Event.subscribe('edge.remove',
          function(response) {
             //alert('You UNliked the URL: ' + response);
          }
        );
    };
    </script>
    </head>
    
    <body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=293441034200219&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div id="wrapper"><!-- wrapper open -->
    <?php $this->load->view('includes/menu_fb');?>