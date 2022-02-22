<footer class="footer">
    <div class="footer__center center">
        <div class="footer__body">
            <a class="footer__logo" href="/">
                <img class="footer__pic" src="catalog/view/theme/moroz/stylesheet/img/logo/logo.svg" alt="">
            </a>
            <div class="footer__copyright"><?php echo $text_powered; ?></div>
            <div class="footer__line">
                <div class="footer__cooperation"><?php echo $text_sotrudnichestvo; ?></div>
                <a class="footer__email" href="mailto:<?php echo $text_subscribe_email; ?>"><?php echo $text_subscribe_email; ?></a>
            </div>
            <div class="footer__social social social_color">
                <?php /* <a class="social__link" href="https://t.me/yes_zamess" title="<?php echo $text_social_4; ?>" target="_blank" rel="nofollow">
                    <svg class="icon icon-telegram"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-telegram"></use></svg>
                </a>*/ ?>
                <a class="social__link" href="https://www.facebook.com/yes.official.ua/" title="<?php echo $text_social_1; ?>" target="_blank" rel="nofollow">
                    <svg class="icon icon-facebook"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-facebook"></use></svg>
                </a>
                <a class="social__link" href="https://www.youtube.com/channel/UC-qjj2A9H-VC9fEWoHi1IRw/" title="<?php echo $text_social_2; ?>" target="_blank" rel="nofollow">
                    <svg class="icon icon-youtube"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-youtube"></use></svg>
                </a>
                <a class="social__link" href="https://www.instagram.com/yes.official.ua" title="<?php echo $text_social_3; ?>" target="_blank" rel="nofollow">
                    <svg class="icon icon-instagram"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-instagram"></use></svg>
                </a>
                <a class="social__link" href="https://www.tiktok.com/@yes.official.ua?lang=ru" title="<?php echo $text_social_4; ?>" target="_blank" rel="nofollow">
                    <svg class="icon icon-tiktok"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-tiktok"></use></svg>
                </a>
            </div>
        </div>
        <div class="footer__bottom">
            <ul class="footer__menu">
                <li><a class="footer__link" href="<?php echo $infolinks['catalog']['href']; ?>" class="footer__point"><?php echo $infolinks['catalog']['name']; ?></a></li>
                <li><a class="footer__link" href="<?php echo $infolinks['aboutus']['href']; ?>" class="footer__point"><?php echo $infolinks['aboutus']['name']; ?></a></li>
                <!--li><a href="collections.html" class="footer__point"><?php echo $text_collections; ?></a></li-->
                <li><a class="footer__link" href="<?php echo $infolinks['blog']['href']; ?>" class="footer__point"><?php echo $infolinks['blog']['name']; ?></a></li>
                <li><a class="footer__link" href="<?php echo $infolinks['wheretobuy']['href']; ?>" class="footer__point"><?php echo $infolinks['wheretobuy']['name']; ?></a></li>
                <li><a class="footer__link" href="<?php echo $infolinks['kontakty']['href']; ?>" class="footer__point"><?php echo $infolinks['kontakty']['name']; ?></a></li>
                <li><a class="footer__link" href="<?php echo $infolinks['sitemap']['href']; ?>" class="footer__point"><?php echo $infolinks['sitemap']['name']; ?></a></li>
            </ul>
            <?php /*<div class="footer__subscription">
                <div class="footer__text"><?php echo $text_v_kurse; ?></div>
                <form class="footer__form">
                    <div class="footer__field">
                        <input class="footer__input" type="text" placeholder="<?php echo $text_subscribe_ph; ?>">
                    </div>
                    <div class="footer__btns">
                        <button class="footer__btn btn btn_orange">
                            <span class="btn__text"><?php echo $text_subscribe; ?></span>
                        </button>
                    </div>
                </form>
            </div> */ ?>
        </div>
    </div>
</footer>
</div>
<div id="promo-popup">
    <div class="inner">
        <div class="close">&times;</div>
        <div class="text"><?=$text_promo_popup?></div>
        <div class="link">
            <a href="http://promocode.yes-tm.com" class="btn btn_orange" target="_blank">
                <span class="btn__text">
                    <?=$text_promo_popup_but?>
                </span>
            </a>
        </div>
    </div>
</div>
<!-- Global site tag (gtag.js) - Google Analytics
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
</script>-->

<script>
    $('#promo-popup .close').on('click', function () {
        $('#promo-popup').fadeOut();
        if(typeof Cookies.get('promo_showed') == undefined || (Cookies.get('promo_showed') != 1 && Cookies.get('promo_showed') != 2)) {
            Cookies.set('promo_showed', '1', { expires: 1 });
        }else if(typeof Cookies.get('promo_showed') != undefined && Cookies.get('promo_showed') == 1) {
            Cookies.set('promo_showed', '2', { expires: 1 });
        }
    })
    $('#promo-popup a').on('click', function () {
        pushEvent('promoPopup');
        $('#promo-popup').fadeOut();
        Cookies.set('promo_showed', '2', { expires: 1 });
    })
    <?php if((empty($_COOKIE['promo_showed']) && 1 == 2) || ($_COOKIE['promo_showed'] != '1' && $_COOKIE['promo_showed'] != '2' && 1 == 2)) : ?>
    setTimeout(function () {
        $('#promo-popup').fadeIn(400, function () {
            setTimeout(function () {
                $('#promo-popup').fadeIn();
            }, 60000);
        });
    }, 20000)
    <?php elseif(!empty($_COOKIE['promo_showed']) && $_COOKIE['promo_showed'] == '1') :?>
    setTimeout(function () {
        $('#promo-popup').fadeIn();
    }, 60000)
    <?php endif; ?>

    $('.promo-link a').on('click', function () {
        pushEvent('promoCard');
    })

    $('.main__slide a, .main__preview a').on('click', function(){
        link = $(this).attr('href');
        if(link.indexOf('promocode') >= 0){
            pushEvent('promoMain');
        }
    })

    $('#contacts-form #send-contact').on('click', function () {
        pushEvent('contactForm', 'form');
    })

    $('.card__btn.btn_white.question').on('click', function (e) {
        e.preventDefault();
        Tawk_API.maximize();
    })
</script>
<!-- <link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all" /> -->
<script src="catalog/view/javascript/app.min.js"></script>
<?php if(isset($scripts) && $scripts) { ?>
<?php foreach ($scripts as $script) { ?>
<script src="<?php echo $script; ?>"></script>
<?php }} ?>
<script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js"></script>
<!--<sc ript src="catalog/view/javascript/common_new.min.js?v5"></sc ript>-->
<script src="catalog/view/javascript/common_new.js?v5.1.1"></script>
<?php if($ocfilter_script) { ?>
<?php echo $ocfilter_script; ?>
<?php } ?>
<div id="goToTop">&lsaquo;</div>
<!-- Mgid Sensor -->
<script type="text/javascript">
    (function() {
        var d = document, w = window;
        w.MgSensorData = w.MgSensorData || [];
        w.MgSensorData.push({
            cid:646277,
            lng:"us",
            project: "a.mgid.com"
        });
        var l = "a.mgid.com";
        var n = d.getElementsByTagName("script")[0];
        var s = d.createElement("script");
        s.type = "text/javascript";
        s.async = true;
        var dt = !Date.now?new Date().valueOf():Date.now();
        s.src = "https://" + l + "/mgsensor.js?d=" + dt;
        n.parentNode.insertBefore(s, n);
    })();
</script>
<!-- /Mgid Sensor -->

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5f15795ca45e787d128bc500/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>