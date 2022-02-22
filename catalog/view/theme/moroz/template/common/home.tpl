<?php echo $header; ?>
<h1 style="display: none"><?=$h1?></h1>
<div class="main js-main">
    <?php if($banners) { ?>
    <div class="main__row">
        <div class="main__col">
            <div class="main__desc">
                <div class="main__nav js-main-nav">
                    <?php foreach ($banners as $banner) { ?>
                    <div class="main__slide">
                        <div class="main__head">
                            <div class="main__title title"><?php echo $banner['title']; ?></div>
                            <div class="main__stage stage">YES</div>
                        </div>
                        <div class="main__text">
                            <?php echo $banner['subtitle'];?>
                        </div>
                        <a href="<?php echo $banner['link']; ?>" class="main__btn btn btn_orange" onclick='_mgq.push(["MgSensorInvoke", "access646237"])'>
                            <span class="btn__text">
                                <?php echo $text_all; ?>
                            </span>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <div class="main__status js-main-status"></div>
            </div>
        </div>
        <div class="main__col">
            <div class="main__gallery">
                <div class="main__for js-main-for">
                    <?php foreach ($banners as $banner) { ?>
                    <div class="main__preview">
                        <a href="<?php echo $banner['link']; ?>">
                        <img class="main__pic" src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>">
                        </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="main__foot">
        <div class="main__center center">
            <div class="main__social social social_black">
                <?php /*
                <a class="social__link" href="https://t.me/yes_zamess" title="<?php echo $text_social_4; ?>" target="_blank" rel="nofollow">
                    <svg class="icon icon-telegram"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-telegram"></use></svg>
                    <div class="social__text"><?php echo $text_social_4; ?></div>
                </a>
                */ ?>
                <a class="social__link" href="https://www.facebook.com/yes.official.ua/" title="<?php echo $text_social_1; ?>" target="_blank" rel="nofollow">
                    <svg class="icon icon-facebook"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-facebook"></use></svg>
                    <div class="social__text"><?php echo $text_social_1; ?></div>
                </a>
                <a class="social__link" href="https://www.youtube.com/channel/UC-qjj2A9H-VC9fEWoHi1IRw/" title="<?php echo $text_social_2; ?>" target="_blank" rel="nofollow">
                    <svg class="icon icon-youtube"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-youtube"></use></svg>
                    <div class="social__text"><?php echo $text_social_2; ?></div>
                </a>
                <a class="social__link" href="https://www.instagram.com/yes.official.ua" title="<?php echo $text_social_3; ?>" target="_blank" rel="nofollow">
                    <svg class="icon icon-instagram"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-instagram"></use></svg>
                    <div class="social__text"><?php echo $text_social_3; ?></div>
                </a>
                <a class="social__link" href="https://www.tiktok.com/@yes.official.ua?lang=ru" title="<?php echo $text_social_4; ?>" target="_blank" rel="nofollow">
                    <svg class="icon icon-tiktok" style="width: 28px;height: 28px;"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-tiktok"></use></svg>
                    <div class="social__text"><?php echo $text_social_4; ?></div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="advantages">
    <div class="inner center">
        <h2 class="fashion__title title"><?=$adv_title?></h2>
        <div class="items">
            <div class="item">
                <div class="icon"><img src="/catalog/view/theme/moroz/stylesheet/img/adv-1-min.png" alt=""></div>
                <div class="descr"><?=$icon_1_descr?></div>
            </div>
            <div class="item">
                <div class="icon"><img src="/catalog/view/theme/moroz/stylesheet/img/adv-2-min.png" alt=""></div>
                <div class="descr"><?=$icon_2_descr?></div>
            </div>
            <div class="item">
                <div class="icon"><img src="/catalog/view/theme/moroz/stylesheet/img/adv-3-min.png" alt=""></div>
                <div class="descr"><?=$icon_3_descr?></div>
            </div>
            <div class="item">
                <div class="icon"><img src="/catalog/view/theme/moroz/stylesheet/img/adv-4-min.png" alt=""></div>
                <div class="descr"><?=$icon_4_descr?></div>
            </div>
            <div class="item">
                <div class="icon"><img src="/catalog/view/theme/moroz/stylesheet/img/adv-5-min.png" alt=""></div>
                <div class="descr"><?=$icon_5_descr?></div>
            </div>
        </div>
        <div class="but-place">
            <a href="<?=$infolinks['aboutus']['href']?>" class="details">
                <?=$adv_but_title?>
            </a>
        </div>
    </div>
</div>
<div class="fashion">
    <div class="fashion__center center">
        <div class="fashion__head">
            <h2 class="fashion__title title"><?php echo $text_home_1; ?></h2>
            <div class="fashion__stage stage">catalogue</div>
        </div>
        <div class="fashion__wrap">
            <div class="fashion__top">
                <a class="fashion__item" href="<?=$link_home_1?>">
                    <? /*<img class="fashion__pic" src="catalog/view/theme/moroz/stylesheet/img/fashion-pic-1.jpg<?='?v=' . time()?>" alt="<?php echo $text_home_2; ?>"> */ ?>

                    <picture>
                        <source srcset="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-1.webp" type="image/webp">
                        <source srcset="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-1.jpg" type="image/jpeg">
                        <img src="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-1.jpg" alt="<?php echo $text_home_2; ?>" />
                    </picture>
                    <div class="fashion__desc__new">
                        <div class="fashion__category__new"><?php echo $text_home_2; ?></div>
                    </div>
                </a>
                <!--<span class="fashion__item" style="margin-top:0;">-->
                <a class="fashion__item" href="<?=$link_home_2?>">
                    <? /*<img class="fashion__pic" src="catalog/view/theme/moroz/stylesheet/img/fashion-pic-23.jpg" alt="<?php echo $text_home_4; ?>"> */ ?>

                    <picture>
                        <source srcset="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-2.webp" type="image/webp">
                        <source srcset="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-2.jpg" type="image/jpeg">
                        <img src="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-2.jpg" alt="<?php echo $text_home_4; ?>" />
                    </picture>
                    <!--div class="fashion__year">2019</div-->
                    <div class="fashion__desc__new">
                        <div class="fashion__category__new"><?php echo $text_home_4; ?></div>
                        <!-- div class="fashion__next next">СМОТРЕТЬ ТОВАРЫ<svg class="icon icon-arrow-right"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-right"></use></svg></div> -->
                    </div>
                </a>
                <a class="fashion__item" href="<?=$link_home_3?>">
                    <? /* <img class="fashion__pic" src="catalog/view/theme/moroz/stylesheet/img/fashion-pic-3.jpg<?='?v=' . time()?>" alt="<?php echo $text_home_5; ?>"> */ ?>

                    <picture>
                        <source srcset="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-3.webp" type="image/webp">
                        <source srcset="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-3.jpg" type="image/jpeg">
                        <img src="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-3.jpg" alt="<?php echo $text_home_5; ?>" />
                    </picture>

                    <div class="fashion__desc__new">
                        <div class="fashion__category__new"><?php echo $text_home_5; ?></div>
                    </div>
                </a>
            </div>
            <div class="fashion__bottom">
                <a class="fashion__item" href="<?=$link_home_4?>">
                    <? /* <img class="fashion__pic" src="catalog/view/theme/moroz/stylesheet/img/main_fashion_4.png" alt="<?php echo $text_home_7; ?>"> */ ?>

                    <picture>
                        <source srcset="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-4.webp" type="image/webp">
                        <source srcset="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-4.png" type="image/png">
                        <img src="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-4.png" alt="<?php echo $text_home_7; ?>" />
                    </picture>

                    <div class="fashion__desc__new">
                        <div class="fashion__category__new"><?php echo $text_home_7; ?></div>
                    </div>
                </a>
                <a class="fashion__item" href="<?=$link_home_5?>">
                    <? /*<img class="fashion__pic" src="catalog/view/theme/moroz/stylesheet/img/main_fashion_5.png" alt="<?php echo $text_home_9; ?>">*/ ?>

                    <picture>
                        <source srcset="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-5.webp" type="image/webp">
                        <source srcset="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-5.png" type="image/png">
                        <img src="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-5.png" alt="<?php echo $text_home_9; ?>" />
                    </picture>

                    <div class="fashion__desc__new">
                        <div class="fashion__category__new"><?php echo $text_home_9; ?></div>
                    </div>
                </a>
                <a class="fashion__item" href="<?=$link_home_6?>">
                    <? /*<img class="fashion__pic" src="catalog/view/theme/moroz/stylesheet/img/main_fashion_6.png" alt="<?php echo $text_home_11; ?>">*/ ?>

                    <picture>
                        <source srcset="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-6.webp" type="image/webp">
                        <source srcset="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-6.png" type="image/png">
                        <img src="/catalog/view/theme/moroz/stylesheet/img/new-main-catalog-6.png" alt="<?php echo $text_home_11; ?>" />
                    </picture>

                    <div class="fashion__desc__new">
                        <div class="fashion__category__new"><?php echo $text_home_11; ?></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php echo $content_top; ?>

<div class="subs">
    <div class="subs__center center">
        <div class="subs__wrap">
            <div class="subs__title title title_sm"><?php echo $text_home_13; ?></div>
            <div class="subs__info"><div class="line"></div><span><?php echo $text_home_14; ?></span></div>
            <div class="subs__social social social_color">
                <div class="inner">
                    <a class="social__link fbok" href="https://www.facebook.com/yes.official.ua/" title="<?php echo $text_social_1; ?>" target="_blank" rel="nofollow">
                        <svg class="icon icon-facebook"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-facebook"></use></svg>
                    </a>
                    <a class="social__link ytbe" href="https://www.youtube.com/channel/UC-qjj2A9H-VC9fEWoHi1IRw/" title="<?php echo $text_social_2; ?>" target="_blank" rel="nofollow">
                        <svg class="icon icon-youtube"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-youtube"></use></svg>
                    </a>
                    <a class="social__link inst" href="https://www.instagram.com/yes.official.ua" title="<?php echo $text_social_3; ?>" target="_blank" rel="nofollow">
                        <svg class="icon icon-instagram"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-instagram"></use></svg>
                    </a>
                    <a class="social__link tiktok" href="https://www.tiktok.com/@yes.official.ua?lang=ru" title="<?php echo $text_social_4; ?>" target="_blank" rel="nofollow">
                        <svg class="icon icon-tiktok" style="height: 38px;"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-tiktok"></use></svg>
                    </a>
                    <?php /*<a class="social__link tlgr" href="https://t.me/yes_zamess" title="<?php echo $text_social_4; ?>" target="_blank" rel="nofollow">
                        <svg class="icon icon-telegram"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-telegram"></use></svg>
                    </a> */ ?>
                    <div class="icon-bg"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="subs__preview">
        <? /*<img class="subs__pic" src="catalog/view/theme/moroz/stylesheet/img/socials_banner_main_gb.png" alt=""> */ ?>
        <picture>
            <source srcset="/image/socials-hero-min.webp" type="image/webp">
            <source srcset="/image/socials-hero-min.png" type="image/png">
            <img src="/image/socials-hero-min.png" />
        </picture>
    </div>
</div>
<div class="about">
    <div class="about__row">
        <div class="about__col">
            <div class="about__preview">
                <div class="about__wrap" id="counter">
                    <div class="about__item">
                        <div class="about__number"><span class="counter-value" data-count="1000">1</span>+</div>
                        <div class="about__text"><?php echo $text_home_15; ?></div>
                    </div>
                    <div class="about__item">
                        <div class="about__number"><span class="counter-value" data-count="20">1</span>+</div>
                        <div class="about__text"><?php echo $text_home_16; ?></div>
                    </div>
                    <div class="about__item">
                        <div class="about__number"><span class="counter-value" data-count="15000">1</span></div>
                        <div class="about__text"><?php echo $text_home_17; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about__col">
            <div class="about__desc">
                <h2 class="about__title title"><?php echo $text_home_18; ?></h2>
                <div class="about__info">
                    <?php echo $text_home_19; ?>
                </div>
                <a class="about__next next" href="<?php echo $infolinks['aboutus']['href']; ?>">
                    <?php echo $infolinks['aboutus']['name']; ?>
                    <svg class="icon icon-arrow-right"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-right"></use></svg>
                </a>
            </div>
        </div>
    </div>
    <div class="about__icon"><img class="about__pic" src="catalog/view/theme/moroz/stylesheet/img/plain.svg" alt=""></div>
</div>
<?php echo $content_bottom; ?>
<div class="buy">
    <div class="buy__center center">
        <h2 class="buy__title title title_sm"><?php echo $text_where_to_buy_button; ?></h2>
        <div class="buy__info"><?php echo $text_can_buy; ?></div>
        <div class="buy__btns">
            <a class="buy__btn btn btn_white" href="<?php echo $infolinks['wheretobuy']['href']; ?>" onclick='_mgq.push(["MgSensorInvoke", "shops646237"])'>
                <span class="btn__text"><?php echo $text_show_shops; ?></span>
            </a>
            <div class="buy__circle circle"></div>
            <div class="buy__circle circle"></div>
            <div class="buy__circle circle"></div>
        </div>
    </div>
</div>

<?php echo $footer; ?>