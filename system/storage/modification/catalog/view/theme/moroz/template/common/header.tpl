<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<![endif]-->
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#fff">
<meta name="format-detection" content="telephone=no">
    <meta name="facebook-domain-verification" content="v326wcbaroi7kdri27yd1moyenq6ur" />

    <link rel="preload" href="https://yes-tm.com/catalog/view/theme/moroz/stylesheet/fonts/ProximaNova-Semibold.woff" as="font">
    <link rel="preload" href="https://yes-tm.com/catalog/view/theme/moroz/stylesheet/fonts/GothamPro-Medium.woff" as="font">
    <link rel="preload" href="https://yes-tm.com/catalog/view/theme/moroz/stylesheet/fonts/GothamPro.woff" as="font">
    <link rel="preload" href="https://yes-tm.com/catalog/view/theme/moroz/stylesheet/fonts/ProximaNova-Regular.woff" as="font">
    <link rel="preload" href="https://yes-tm.com/catalog/view/theme/moroz/stylesheet/fonts/Terminator-Genisys.ttf.woff" as="font">
    <link rel="preload" href="https://yes-tm.com/catalog/view/theme/moroz/stylesheet/fonts/GothamPro-Black.woff" as="font">
    <link rel="preload" href="https://yes-tm.com/catalog/view/theme/moroz/stylesheet/fonts/Staccato555-BT.woff2" as="font">
    <link rel="preload" href="https://yes-tm.com/catalog/view/theme/moroz/stylesheet/fonts/GothamPro-Bold.woff" as="font">

<title><?php echo $title; ?></title>

<?php if ($noindex) { ?>
<!-- OCFilter Start -->
<!-- <meta name="robots" content="noindex,nofollow" /> -->
<!-- OCFilter End -->
<?php } ?>
      
<base href="<?php echo $base; ?>" />
<?php
$actual_link = rtrim( $base, '/' ) . $_SERVER[REQUEST_URI];
$actual_link_base = str_replace( array( $base . 'ru/', $base . 'en/' ), '', $actual_link );
$actual_link_uk = $base . $actual_link_base;
$actual_link_ru = $base . 'ru/' . $actual_link_base;
$actual_link_en = $base . 'en/' . $actual_link_base;
?>
    <link rel="alternate" hreflang="uk" href="<?php echo $actual_link_uk ?>" />
    <link rel="alternate" hreflang="ru-UA" href="<?php echo $actual_link_ru ?>" />
    <link rel="alternate" hreflang="en-UA" href="<?php echo $actual_link_en ?>" />

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

<?php } ?>
<meta property="og:site_name" content="<?php echo $name; ?>" />

    <style>
    <?php
        echo file_get_contents( 'https://yes-tm.com/catalog/view/theme/moroz/stylesheet/critical.min.css' );
    ?>
    </style>
    <link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/fancynew/jquery.fancynew.css">
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/moroz/stylesheet/app.min.css?v7.2.14">
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/moroz/stylesheet/add_style.min.css?v1.2.4">
    <link rel="stylesheet" type="text/css" href="catalog/view/javascript/font-awesome/css/font-awesome.min.css">
    <link rel="icon" href="catalog/view/theme/moroz/stylesheet/img/logo/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="catalog/view/theme/moroz/stylesheet/img/logo/logo.png" type="image/x-icon">
    <!-- Links -->
    <?php if(isset($links) && $links) { ?>
    <?php foreach ($links as $link) { ?>
    <link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
    <?php } ?>
    <?php } ?>
    <!-- Links End -->
    <?php if(isset($styles) && $styles) { ?>
    <?php foreach ($styles as $style) { ?>
    <link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
    <?php } ?>
    <?php } ?>
    <script>
        let viewportmeta = document.querySelector('meta[name="viewport"]');
        if (viewportmeta) {
            if (screen.width < 375) {
                let newScale = screen.width / 375;
                viewportmeta.content = 'width=375, minimum-scale=' + newScale + ', maximum-scale=1.0, user-scalable=no, initial-scale=' + newScale + '';
            }
            else {
                viewportmeta.content = 'width=device-width, maximum-scale=1.0, initial-scale=1.0';
            }
        }
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-WZ37GDX');</script>
    <!-- End Google Tag Manager -->

    <script src="catalog/view/javascript/jquery/jquery-3.4.1.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102515382-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-102515382-1');

        function pushEvent(event, category) {
            if(typeof category == 'undefined') category = 'click';
            gtag('event', event, {
                'event_category': category
            });
        }
    </script>

    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "a96llmvcv8");
    </script>
</head>
<body lang="<?=$lang?>">
<div class="out">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZ37GDX" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="header header_main">
    <div class="header__wrapper">
        <div class="header__center center">
            <a class="header__logo js-header-logo" href="/">
                <img class="header__pic" src="catalog/view/theme/moroz/stylesheet/img/logo/logo.svg" alt="<?=$siteTitle?>">
                <!--<img class="header__pic" src="catalog/view/theme/-->moroz/image/logo-ny.png" alt="<?=$siteTitle?>">
            </a>
            <div class="header__directory directory js-directory">
                <a class="directory__head js-directuory-head" href="<?php echo $href_all; ?>"><?php echo $text_catalog1; ?> <span class="directory__hide"><?php echo $text_catalog2; ?></span>
                    <span class="directory__line"></span>
                </a>
            </div>
            <div class="header__wrap js-header-wrap">
                <nav class="header__nav">
                    <div class="menu-item">
                        <a class="header__link header__link_hide" id="mobile-menu-toggler" href="<?php echo $href_all; ?>"><?php echo $text_catalog; ?></a>
                    </div>
                    <div class="menu-item">
                        <a class="header__link" href="<?php echo $infolinks['andrelanding']['href']; ?>" style="text-transform: none;"><?php echo $infolinks['andrelanding']['name']; ?></a>
                    </div>
                    <div class="menu-item">
                        <a class="header__link" href="<?php echo $infolinks['aboutus']['href']; ?>"><?php echo $infolinks['aboutus']['name']; ?></a>
                    </div>
                    <!--<div class="menu-item">
                        <a class="header__link" href="<?php echo $infolinks['warranty']['href']; ?>"><?php echo $infolinks['warranty']['name']; ?></a>
                    </div>
                    a class="header__link" href="collections.html"><?php echo $text_collections; ?></a-->
                    <div class="menu-item">
                        <a class="header__link" href="<?php echo $infolinks['blog']['href']; ?>"><?php echo $infolinks['blog']['name']; ?>
                        </a>
                        <?php /* <div class="submenu">
                            <a class="header__link__sub" href="<?php echo $infolinks['tips']['href']; ?>"><?php echo $infolinks['tips']['name']; ?></a>
                            <a class="header__link__sub" href="<?php echo $infolinks['teenagers']['href']; ?>"><?php echo $infolinks['teenagers']['name']; ?></a>
                            <a class="header__link__sub" href="<?php echo $infolinks['presentation']['href']; ?>"><?php echo $infolinks['presentation']['name']; ?></a>
                        </div> */ ?>
                    </div>
                    <div class="menu-item">
                        <a class="header__link" href="<?php echo $infolinks['information']['href']; ?>"><?php echo $infolinks['information']['name']; ?></a>
                        <div class="submenu">
                            <a class="header__link__sub" href="<?php echo $infolinks['sertif']['href']; ?>"><?php echo $infolinks['sertif']['name']; ?></a>
                            <a class="header__link__sub" href="<?php echo $infolinks['warranty']['href']; ?>"><?php echo $infolinks['warranty']['name']; ?></a>
                            <a class="header__link__sub" href="<?php echo $infolinks['ortoped']['href']; ?>"><?php echo $infolinks['ortoped']['name']; ?></a>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="header__link" href="<?php echo $infolinks['news']['href']; ?>"><?php echo $infolinks['news']['name']; ?></a>
                    </div>
                    <div class="menu-item">
                        <a class="header__link" href="<?php echo $infolinks['wheretobuy']['href']; ?>"><?php echo $infolinks['wheretobuy']['name']; ?></a>
                        <div class="submenu">
                            <a class="header__link__sub" href="<?php echo $infolinks['shops_online']['href']; ?>"><?php echo $infolinks['shops_online']['name']; ?></a>
                            <a class="header__link__sub" href="<?php echo $infolinks['shops_offline']['href']; ?>"><?php echo $infolinks['shops_offline']['name']; ?></a>
                            <a class="header__link__sub" href="<?php echo $infolinks['shops_andre']['href']; ?>"><?php echo $infolinks['shops_andre']['name']; ?></a>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="header__link" href="<?php echo $infolinks['kontakty']['href']; ?>"><?php echo $infolinks['kontakty']['name']; ?></a>
                    </div>
                </nav>
                <!--div class="header__location">
                    <svg class="icon icon-marker"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-marker"></use></svg>
                    Киев
                </div-->
                <?php if($_SERVER['REMOTE_ADDR'] == '46.98.122.142') {
                ?><div class="header__cart"><?php
                echo $cart;
                ?></div><?php
                } ?>
                <?php echo $search; ?>
                <?php echo $language['d']; ?>
                <div class="header__write">
                    <div class="header__text">По вопросам сотрудничества пишите на почту:</div>
                    <a class="header__email" href="mailto:info@yes-tm.com">info@yes-tm.com</a>
                </div>
                <div class="header__social social social_color">
                    <a class="social__link fbok" href="https://www.facebook.com/yes.official.ua/" title="<?php echo $text_social_1; ?>" target="_blank" rel="nofollow">
                        <svg class="icon icon-facebook"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-facebook"></use></svg>
                    </a>
                    <a class="social__link ytbe" href="https://www.youtube.com/channel/UC-qjj2A9H-VC9fEWoHi1IRw/" title="<?php echo $text_social_2; ?>" target="_blank" rel="nofollow">
                        <svg class="icon icon-youtube"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-youtube"></use></svg>
                    </a>
                    <a class="social__link inst" href="https://www.instagram.com/yes.official.ua" title="<?php echo $text_social_3; ?>" target="_blank" rel="nofollow">
                        <svg class="icon icon-instagram"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-instagram"></use></svg>
                    </a>
                    <?php /*
                    <a class="social__link tlgr" href="https://t.me/yes_zamess" title="<?php echo $text_social_4; ?>" target="_blank" rel="nofollow">
                        <svg class="icon icon-telegram"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-telegram"></use></svg>
                    </a>
                     * 
                     */ ?>
                </div>
            </div>

            <button class="header__burger burger js-header-burger">
                <span></span>
            </button>
        </div>
    </div>
    <div class="directory dropmenu js-directory">
        <div class="directory__body js-directuory-body">
            <div class="directory__top">
                <div class="directory__center center">
                    <?php echo $new_menu; ?>
                    <?php /*else : ?>
                    <div class="directory__list">
                        <?php if ($categories) {  ?>
                        <?php foreach($categories as $category) {  ?>
                        <a class="directory__item" href="<?php echo $category['href']; ?>">
                            <img class="directory__pic" src="<?php echo $category['image']; ?>" alt="<?php echo $category['name']; ?>">
                            <div class="directory__category"><?php echo $category['name']; ?></div>
                        </a>
                        <?php } ?>
                        <?php } ?>
                    </div>
                    <?php endif;*/ ?>
                </div>
            </div>
            <a class="directory__all" href="<?php echo $href_all; ?>"><?php echo $text_all; ?></a>
        </div>
    </div>
    <div class="header__bg js-header-bg"></div>
</header>
