<footer class="footer">
    <div class="footer__banner">
        <!--div class="footer__wrap between">
            <div class="banner__title"><?php echo $text_where_to_buy_button; ?></div>
            <div class="banner__desc">
                <i class="splash"></i>
                <span class="banner__text">
                    <?php echo $text_can_buy; ?>
                </span>
                <i class="splash"></i>
            </div>
            <a href="<?php echo $infolinks['wheretobuy']['href']; ?>" class="banner__button"><?php echo $text_show_shops; ?></a>
        </div-->
    </div>
    <div class="footer__wrap">
        <div class="footer__top">
            <div class="footer__copyright">
                <a href="#"><img src="catalog/view/theme/new/stylesheet/img/logo/logo.svg" alt=""></a>
                <span><?php echo $text_powered; ?></span>
            </div>
            <div class="footer__info">
                <span><?php echo $text_sotrudnichestvo; ?> <a href="mailto:<?php echo $text_subscribe_email; ?>"><?php echo $text_subscribe_email; ?></a></span>
            </div>
            <div class="footer__soc">
                <a href="https://www.facebook.com/YESmustHave/" class="footer__soc-button fbok" title="<?php echo $text_social_1; ?>" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.youtube.com/channel/UC-qjj2A9H-VC9fEWoHi1IRw/" class="footer__soc-button ytbe" title="<?php echo $text_social_2; ?>" target="_blank" rel="nofollow"><i class="fab fa-youtube"></i></a>
                <a href="https://www.instagram.com/yesmusthave/" class="footer__soc-button inst" title="<?php echo $text_social_3; ?>" target="_blank" rel="nofollow"><i class="fab fa-instagram"></i></a>
                <a href="https://t.me/yes_zamess" class="footer__soc-button tlgr" title="<?php echo $text_social_4; ?>" target="_blank" rel="nofollow"><i class="fab fa-telegram-plane"></i></a>
            </div>
        </div>
        <div class="footer__hr"></div>
        <div class="footer__bot">
            <div class="footer__nav">
                <a href="<?php echo $infolinks['catalog']['href']; ?>" class="footer__point"><?php echo $infolinks['catalog']['name']; ?></a>
                <a href="<?php echo $infolinks['aboutus']['href']; ?>" class="footer__point"><?php echo $infolinks['aboutus']['name']; ?></a>
                <!--a href="collections.html" class="footer__point"><?php echo $text_collections; ?></a-->
                <a href="<?php echo $infolinks['blog']['href']; ?>" class="footer__point"><?php echo $infolinks['blog']['name']; ?></a>
                <a href="<?php echo $infolinks['wheretobuy']['href']; ?>" class="footer__point"><?php echo $infolinks['wheretobuy']['name']; ?></a>
                <a href="<?php echo $infolinks['kontakty']['href']; ?>" class="footer__point"><?php echo $infolinks['kontakty']['name']; ?></a>
                <a href="<?php echo $infolinks['sitemap']['href']; ?>" class="footer__point"><?php echo $infolinks['sitemap']['name']; ?></a>
            </div>
            <form action="#" class="footer__subscribe">
                <label class="footer__label" for="footer__input"><?php echo $text_v_kurse; ?></label>
                <input type="text" id="footer__input" class="footer__input" placeholder="<?php echo $text_subscribe_ph; ?>">
                <button type="submit" class="footer__button"><?php echo $text_subscribe; ?></button>
            </form>
        </div>
    </div>
    <?php if($changing_contacts){echo $changing_contacts;} ?>
</footer>
<script src="catalog/view/javascript/jquery/jquery-3.4.1.min.js"></script>
<script src="catalog/view/javascript/jquery/slick/slick.min.js"></script>
<script src="catalog/view/javascript/scripts.js?v2"></script>
<script src="catalog/view/javascript/sliders.js?v2"></script>
<script type="text/javascript">
$(function(){
  var bm = $('.mobile__menu-wrap');
  var btn = $('.mobile__catalog-button');
  var bc = $('.mobile__menu-close');
  btn.on('click', function(){
	$('.header__logo').addClass('dnone');
  });
  
  bc.on('click', function(){	
	$('.header__logo').removeClass('dnone');	
  });
})
</script>

<?php if(isset($scripts) && $scripts) { ?>
<?php foreach ($scripts as $script) { ?>
<script src="<?php echo $script; ?>"></script>
<?php }} ?>

<?php if($ocfilter_script) { ?>
<?php echo $ocfilter_script; ?>
<?php } ?>
</body>
</html>