<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>Home Page / Rangmagical /Berger Nepal</title>

    <link href="content_home/css/bootstrap.min.css" rel="stylesheet">
    <link href="content_home/css/wstyle.css" rel="stylesheet">
    <link href="content_home/css/others.css" rel="stylesheet">
    <link href="content_home/css/responsive.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="images/fav-icon.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body>

<!--header start-->

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
                        <ul class="nav navbar-nav">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li <?php if(@$menuSelected == 'home') echo 'class="active"'; ?>><a href="index.php">Home</a></li>
                            <li <?php if(@$menuSelected == 'term') echo 'class="active"'; ?>><a href="terms-and-condition.php">Terms & Conditions</a></li>
                            <li <?php if(@$menuSelected == 'procedure') echo 'class="active"'; ?>><a href="upload-procedure.php">Upload Procedure</a></li>
                            <li <?php if(@$menuSelected == 'register') echo 'class="active"'; ?>><a href="photo-upload.php">Photo Upload</a></li>
                            <li <?php if(@$menuSelected == 'album') echo 'class="active"'; ?>><a href="photo-album.php">Photo Album</a></li>
                        </ul>
                    </div>
                
                    <!-- /.navbar-collapse -->
<!-- /.container -->
    </nav>
    <header class="header">
        
        <figure class="main">
            <img class="img-responsive" src="content_home/images/home.jpg" alt="Brand Logo">
        </figure>
        <!-- <figure class="berger-box">
            <img class="img-responsive" src="images/berger-box.png" alt="berger-box">
        </figure>
        <p class="caption">बर्जरको <span>Weathercoat All Guard, Silk</span> वा <span>Easy Clean</span> ले घर रंगाउँदा पाउनुहोस्ः</p> -->
    </header>
    <!-- <div class="offers clearfix">
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="offer-item bumper">
                        <figure>
                            <img src="images/offer/1.png" alt="1">
                        </figure>
                        <figcaption>
                            <p>नगद रु. १० लाख</p>
                        </figcaption>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="offer-item super">
                        <figure>
                            <img src="images/offer/2.png" alt="1">
                        </figure>
                        <figcaption>
                            <p><span>100 Sq/ft Silk Illusion designers finish</span></p>
                        </figcaption>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="offer-item cash">
                <figure>
                    <img src="images/offer/3.png" alt="1">
                </figure>
                <figcaption>
                    <p><em>सबैभन्दा धेरै <span>LIKE</span> पाउने</em> १ घरधनीलाई <br> रु. १० हजार</p>
                </figcaption>
            </div>
        </div>
    </div>
    <div class="footer clearfix">
        <div class="col-md-10 col-sm-9 col-xs-9">
                <div class="footer-left">
                    <p>टोल फ्री नं. १६६०–०१–२३४३४ <span>(NTC) /</span> मा कल वा <span> &lt;berger&gt; </span> ९८०–१५७–१००१ <span>(Ncell)</span> टाइप गरी ३३७७ मा एस्.एम्.एस्. गरी योजनामा सहभागी हुनुहोस् । थप जानकारी तपाईं नजिकैको डिलर, <span>www.nagadpati.bergernepal.com</span> वा <span>Facebook.com/BergerPaintsNepal</span> मा उपलब्ध छ ।</p>
                    <p class="small">योजनामा सहभागिताको लागि ४ फाल्गुण २०७३ देखि ३१ जेष्ठ २०७४ सम्म दर्ता गरिसक्नुपर्नेछ भने ३१ आषाढ २०७४ सम्म रंगरोगन कार्य समापन गरिसक्नुपर्नेछ ।</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-3">
                <div class="footer-right">
                    <p>शहरोन्मुख</p>
                    <h2><span>३० शहर</span> ३० घर</h2>
                    <span class="border">सबैलाई</span>
                    <p>रु. १५–१५ हजार</p>
                </div>
            </div>
    </div> -->
</section>




<a href="#" class="scrollToTop" title="Scroll Back To Top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery -->
    <script src="content_home/js/jquery-1.10.1.min.js"></script>
    <script src="content_home/js/bootstrap.min.js"></script>
    <script src="content_home/js/main.js"></script>    

</body>
</html>
