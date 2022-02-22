<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $title; ?></title>
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

<?php } ?>
<meta property="og:site_name" content="<?php echo $name; ?>" />
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/new/stylesheet/normalize.css">
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/new/stylesheet/fonts.css">
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/new/stylesheet/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/new/stylesheet/style.css?v2">
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/new/stylesheet/media.css?v2">
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/new/stylesheet/sup_style.css?v2">
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/new/stylesheet/add.css?v2">
    <link rel="stylesheet" type="text/css" href="catalog/view/theme/new/stylesheet/fix.css?v2">
    <link rel="icon" href="catalog/view/theme/new/stylesheet/img/logo/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="catalog/view/theme/new/stylesheet/img/logo/logo.png" type="image/x-icon">
    <?php if(isset($links) && $links) { ?>
    <?php foreach ($links as $link) { ?>
    <link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
    <?php } ?>
    <?php } ?>
    <?php if(isset($styles) && $styles) { ?>
    <?php foreach ($styles as $style) { ?>
    <link href="<?php echo $style['href']; ?>" type="text/css" rel="<?php echo $style['rel']; ?>" media="<?php echo $style['media']; ?>" />
    <?php } ?>
    <?php } ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-WZ37GDX');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZ37GDX"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="header">
    <div class="header__wrap">
        <nav class="header__navigation">
            <div class="header__logo">
                <a href="/"><img src="catalog/view/theme/new/stylesheet/img/logo/logo.svg" alt=""></a>
            </div>
            <div class="header__catalog">
                <button class="catalog__button"></button>
                <span><a href="<?php echo $href_all; ?>"><?php echo $text_catalog; ?></a></span>
                <div class="catalog__wrap">
                    <div class="catalog__box">
                        <?php if ($categories) {  ?>
                        <?php foreach($categories as $category) {  ?>
                        <div class="catalog__category">
                            <img src="<?php echo $category['image']; ?>" alt="<?php echo $category['name']; ?>">
                            <a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="catalog__all">
                        <a href="<?php echo $href_all; ?>"><?php echo $text_all; ?></a>
                    </div>
                </div>
            </div>
            <div class="header__menu">
                <a href="<?php echo $infolinks['aboutus']['href']; ?>"><?php echo $infolinks['aboutus']['name']; ?></a>
                <!--a href="collections.html"><?php echo $text_collections; ?></a-->
                <a href="<?php echo $infolinks['blog']['href']; ?>"><?php echo $infolinks['blog']['name']; ?></a>
                <a href="<?php echo $infolinks['wheretobuy']['href']; ?>"><?php echo $infolinks['wheretobuy']['name']; ?></a>
                <a href="<?php echo $infolinks['kontakty']['href']; ?>"><?php echo $infolinks['kontakty']['name']; ?></a>
            </div>
            <div class="header__inputs">
                <?php if($popup_city) { ?>
                <button class="header__city"><i class="fas fa-map-marker-alt"></i><?php echo $popup_city; ?></button>
                <?php } ?>
                <?php echo $search; ?>
                <div class="splash"></div>
                <?php echo $language['d']; ?>
            </div>
            <?php if($mobtab->m || $mobtab->t) { ?>
            <div class="mobile__menu">
                <i class="fas fa-search mobile__search"></i>
                <button class="mobile__catalog-button"></button>
                <div class="mobile__menu-wrap">
                    <div class="mobile__menu-head">
                        <div class="mobile__menu-logo">
                            <img class="mobile__menu-exit" src="catalog/view/theme/new/stylesheet/img/logo/YES_full_white.png" alt="">
                        </div>
                        <div class="mobile__menu-nav">
                            <div class="mobile__menu-search-button">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="mobile__menu-close">
                                <button></button>
                            </div>
                            <div class="mobile__menu-button">
                                <button></button>
                            </div>
                        </div>
                    </div>
                    <div class="mobile__menu-main">
                        <button class="mobile__menu-catalog-button"><?php echo $text_catalog; ?></button>
                        <a href="<?php echo $infolinks['aboutus']['href']; ?>"><?php echo $infolinks['aboutus']['name']; ?></a>
                        <!--a href="collections.html"><?php echo $text_collections; ?></a-->
                        <a href="<?php echo $infolinks['blog']['href']; ?>"><?php echo $infolinks['blog']['name']; ?></a>
                        <a href="<?php echo $infolinks['wheretobuy']['href']; ?>"><?php echo $infolinks['wheretobuy']['name']; ?></a>
                        <a href="<?php echo $infolinks['kontakty']['href']; ?>"><?php echo $infolinks['kontakty']['name']; ?></a>
                    </div>
                    <div class="mobile__menu-catalog">
                        <?php if ($categories) {  ?>
                        <?php foreach($categories as $category) {  ?>
                        <button class="mobile__menu-catalog-category"><?php echo $category['name']; ?></button>
                            <?php if ($category['children']) {  ?>
                            <div class="mobile__menu-catalog-list">
                            <?php foreach($category['children'] as $catchild) {  ?>
                                <a href="<?php echo $catchild['href']; ?>" class="mobile__menu-catalog-link"><?php echo $catchild['name']; ?></a>
                            <?php } ?>
                            </div>
                            <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="mobile__menu-search">
                        <form action="<?php echo $url_search; ?>">
                            <input type="text" name="search" value="<?php echo $mobsearch; ?>" placeholder="<?php echo $text_search; ?>">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="mobile__menu-footer">
                        <?php if($popup_city) { ?>
                        <div class="mobile__menu-address">
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?php echo $popup_city; ?></span>
                        </div>
                        <?php } ?>
                        <?php echo $language['m']; ?>
                        <div class="mobile__menu-contacts">
                            <span>По вопросам сотрудничества пишите на почту:</span>
                            <a href="mailto:@">info@yes-tm.com</a>
                        </div>
                        <div class="mobile__menu-social">
                            <a class="mobile__menu-social-link" href="https://www.facebook.com/YESmustHave/" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a>
                            <a class="mobile__menu-social-link" href="https://www.youtube.com/channel/UC-qjj2A9H-VC9fEWoHi1IRw/" target="_blank" rel="nofollow"><i class="fab fa-youtube"></i></a>
                            <a class="mobile__menu-social-link" href="https://www.instagram.com/yesmusthave/" target="_blank" rel="nofollow"><i class="fab fa-instagram"></i></a>
                            <a class="mobile__menu-social-link" href="https://t.me/yes_zamess" target="_blank" rel="nofollow"><i class="fab fa-telegram-plane"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </nav>
    </div>
    <div class="catalog__background"></div>
</header>
