<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $title;  ?></title>
<base href="<?php echo $base; ?>" />
<?php if ($description) { ?>
<meta name="description" content="<?php echo $description; ?>" />
<?php } ?>
<?php if ($keywords) { ?>
<meta name="keywords" content= "<?php echo $keywords; ?>" />
<?php } ?>
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo $og_url; ?>" />
<?php if ($og_image) { ?>
<meta property="og:image" content="<?php echo $og_image; ?>" />
<?php } else { ?>
<meta property="og:image" content="<?php echo $logo; ?>" />
<?php } ?>
<meta property="og:site_name" content="<?php echo $name; ?>" />
<script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="catalog/view/javascript/jquery/jquery.scrollTo-1.4.3.1.js"></script>

<link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<link href="catalog/view/javascript/bootstrap/css/bootstrap-select.min.css" rel="stylesheet" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="catalog/view/javascript/bootstrap/js/bootstrap-select.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />

<link href="catalog/view/theme/default/stylesheet/iziModal.min.css" rel="stylesheet">
<link href="catalog/view/theme/default/stylesheet/animate.css" rel="stylesheet">

<link href="catalog/view/theme/default/stylesheet/style.css?v=1" rel="stylesheet">
<?php foreach ($styles as $style) { ?>
<link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
<?php } ?>
	<script src="catalog/view/javascript/iziModal.min.js" type="text/javascript"></script>
<link href="catalog/view/javascript/jquery/owl-carousel/owl.carousel.css" type="text/css" rel="stylesheet" media="screen" />
<script src="catalog/view/javascript/common.js?_=123911" type="text/javascript"></script>
<script src="catalog/view/javascript/jquery/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<?php foreach ($links as $link) { ?>
<link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
<?php } ?>
<?php foreach ($scripts as $script) { ?>
<script src="<?php echo $script; ?>" type="text/javascript"></script>
<?php } ?>
<?php foreach ($analytics as $analytic) { ?>
<?php echo $analytic; ?>
<?php } ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TDPWCCJ');</script>
<!-- End Google Tag Manager -->
</head>
<body class="home page-template-default page page-id-702">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TDPWCCJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header>
	<div class="my-iziModal" style="display: none">
		<div class="row">
			<div class="col-md-6">
				<div class="btn btn-block btn-country btn-country_ua animated"><img src="/catalog/view/theme/default/image/urk.png" alt="флаг украины">Украина </div>
			</div>
			<div class="col-md-6">
				<a href="https://yes-tm.ru/" rel="nofollow" class="btn btn-block btn-country btn-country_rus animated"><img src="/catalog/view/theme/default/image/rus.png" alt="флаг росиии">Россия</a>
			</div>
		</div>
	</div>
</header>
<div class="warap_main_page" >

<aside class="main-sidebar">
        <div class="logo-wrap" id="logo">
          <?php if ($logo) { ?>
            <?php if ($home == $og_url) { ?>
              <img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" />
            <?php } else { ?>
              <a  class="logo" href="<?php echo $home; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" /></a>
            <?php } ?>
          <?php } else { ?>
            <h1><a href="<?php echo $home; ?>"><?php echo $name; ?></a></h1>
          <?php } ?>
        </div>
		<nav id="top">
    <?php echo $language; ?>
</nav>
  <nav id="menu" class="main-nav">
    <div class="navigation">
    	<ul class="menu">
	    	<li class="dropdown"><a href="#slideshow" class="dropdown-toggle" data-toggle="dropdown">Главная</a></li>
			<li class="dropdown"><a href="#yak4" class="dropdown-toggle" data-toggle="dropdown">Почему Yes?</a></li>
			<li class="dropdown has_sub_menu"><a href="#yak6" class="dropdown-toggle">ТОВАРЫ</a></li>
			<li class="dropdown"><a href="#yak3" class="dropdown-toggle" data-toggle="dropdown">ГДЕ КУПИТЬ?</a></li>
			<li class="dropdown"><a href="#yak5" class="dropdown-toggle" data-toggle="dropdown">КОНТАКТЫ</a></li>
		</ul>
    </div>
  </nav>
  <div class="navigation no_main">
    	<ul class="menu">
	    	<li class="main_page_url"><a href="/index.php?route=common/home" class="dropdown-toggle">Главная</a></li>
			<li class="yes_page_url"><a href="/yes-dance" class="dropdown-toggle">Почему Yes?</a></li>
			<li class="has_sub_menu"><a href="/index.php?route=product/allproduct" class="dropdown-toggle">ТОВАРЫ</a></li>
			<li class="dropdown map_page_url"><a href="/index.php?route=information/information&information_id=11" class="dropdown-toggle">ГДЕ КУПИТЬ?</a></li>
			<li class="dropdown bottom_menu"><a href="#yak5" class="dropdown-toggle">КОНТАКТЫ</a></li>
		</ul>
    </div>
    <?php echo $search; ?>
  
  <script type="text/javascript">

 $(document).ready(function(){
    $("#menu").on("click",".dropdown-toggle", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
    });
});
</script>

  <div class="social">
		<ul class="social-list">
			<li>
				<a href="https://www.instagram.com/yesmusthave/" class="ig" target="_blank"></a>
			</li>

			<li>
				<a href="https://www.youtube.com/channel/UC-qjj2A9H-VC9fEWoHi1IRw" class="yt" target="_blank"></a>
			</li>

			<li>
				<a href="https://www.facebook.com/YESmustHave/?fref=ts" class="fb" target="_blank"></a>
			</li>

			<li style="display:none;">
				<a href="#" class="tw"></a>
			</li>

			<li style="display:none;">
				<a href="#" class="gp"></a>
			</li>
		</ul>

		<p class="descr">
			Liverpool, L39QJ, England,<br>
			Great Britain
		</p>
	</div>
</aside>

