<?php echo $header; ?>
<div itemscope itemtype="http://schema.org/Product">
    <div class="card">
        <div class="card__center center">
            <div class="card__top">
                <?php include 'breadcrumbs.tpl'; ?>
            </div>
            <div id="product" class="card__row">
                <div class="card__view view">
                    <div class="view__row">
                        <?php if ($thumb || $images) { ?>
                        <div class="view__col">
    <?php if ($actnew_label) {
      echo '<div class="box-label"><div class="label-product label_actnew">';
      if ($actnew_link && $actnew_sticker) {
        echo '<a href="' . $actnew_link . '">';
          echo '<img src="' . $actnew_sticker . '" title="' . $actnew_label . '" />';
        echo '</a>';
      } elseif ($actnew_sticker) {
        echo '<img src="' . $actnew_sticker . '" title="' . $actnew_label . '" />';
      } else {
        echo '<span>' . $actnew_label . '</span>';
      }
      echo '</div></div>';
    } ?>
                        <?php if ( $isBackpack ) : ?>
                            <div class="box-label">
                                <div class="label-product label_backpack_discount">
                                    <img src="/catalog/view/theme/moroz/image/warranty.png" title="" />
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($current_status_id == 23 && !$byAndre) { ?>
                        <div class="andretan">
                            <img src="catalog/view/theme/moroz/stylesheet/img/andretan.png" alt="">
                        </div>
                        <?php } ?>

                        <?php if ($byAndre) { ?>
                        <div class="andretan -by">
                            <img src="catalog/view/theme/moroz/stylesheet/img/tan.svg" alt="">
                        </div>
                        <?php } ?>

                        <?php if ($video) { ?>
                        <div class="video" id="video_btn">
                            <svg class="icon icon-youtube"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-youtube"></use></svg>
                        </div>
                        <?php } ?>
                            <div class="view__for js-view-for">
                                <?php if ($thumb) { ?>
                                <div class="view__slide" itemscope itemtype="http://schema.org/ImageObject">
                                    <p itemprop="name" style="display:none;"><?php echo $heading_title; ?> - ???????? 1 <?= $text_from ?> <?= (count($images) + 1) ?></p>
                                    <span itemprop="description" style="display:none;"><?php echo $heading_title; ?> - ???????? 1 <?= $text_from ?> <?= (count($images) + 1) ?></span>
                                    <meta itemprop="height" content="547px">
                                    <meta itemprop="width" content="477px">
                                    <a class="view__preview" href="<?php echo $popupf; ?>" data-fancybox="gallery">
                                        <img class="view__pic" src="<?php echo $popup; ?>" alt="<?php echo $heading_title; ?> - ???????? 1 <?= $text_from ?> <?= (count($images) + 1) ?>"  itemprop="contentUrl">
                                    </a>
                                </div>
                                <?php } ?>
                                <?php if ($images) { ?>
                                    <?php foreach ($images as $index => $image) { ?>
                                        <div class="view__slide" itemscope itemtype="http://schema.org/ImageObject">
                                            <p itemprop="name" style="display:none;"><?php echo $heading_title; ?> - ???????? <?= ($index + 2) ?> <?= $text_from ?> <?= (count($images) + 1) ?></p>
                                            <span itemprop="description" style="display:none;"><?php echo $heading_title; ?> - ???????? <?= ($index + 2) ?> <?= $text_from ?> <?= (count($images) + 1) ?></span>
                                            <meta itemprop="height" content="547px">
                                            <meta itemprop="width" content="477px">
                                            <a class="view__preview" href="<?php echo $image['popupf']; ?>" data-fancybox="gallery">
                                                <img class="view__pic" itemprop="contentUrl" src="<?php echo $image['popup']; ?>" alt="<?php echo $heading_title; ?> - ???????? <?= ($index + 2) ?> <?= $text_from ?> <?= (count($images) + 1) ?>">
                                            </a>
                                        </div>
                                     <?php } ?>
                                 <?php } ?>
                                <?php if ($video) { ?>
                                    <div class="view__slide">
                                        <a class="view__preview" href="<?php echo $video; ?>" data-fancybox="gallery">
                                            <img class="view__pic" src="https://img.youtube.com/vi/<?php echo end(explode('/', $video)); ?>/hqdefault.jpg" alt="<?php echo $heading_title; ?>">
                                            <svg class="icon icon-youtube" style="
                                                position: absolute;
                                                width: 100px;
                                                height: 100px;
                                                fill: #fa8428;
                                                border: 2px solid #fa8428;
                                                border-radius: 80px;
                                                background: rgba(0,0,0,0.6);
                                                padding: 10px;
                                            ">
                                                <use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-youtube"></use>
                                            </svg>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="view__col">
                            <div class="view__container">
                                <div class="view__nav js-view-nav">
                                    <?php if ($thumb) { ?>
                                    <div class="view__slide">
                                        <div class="view__preview" itemscope itemtype="http://schema.org/ImageObject" itemprop="thumbnail"><img class="view__pic" src="<?php echo $popup; ?>" itemprop="contentUrl" alt="<?php echo $heading_title; ?>"></div>
                                    </div>
                                    <?php } ?>
                                    <?php if ($images) { ?>
                                        <?php foreach ($images as $image) { ?>
                                            <div class="view__slide">
                                                <div class="view__preview" itemscope itemtype="http://schema.org/ImageObject" itemprop="thumbnail"><img class="view__pic" src="<?php echo $image['thumb']; ?>" itemprop="contentUrl" alt="<?php echo $heading_title; ?>"></div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($video) { ?>
                                    <div class="view__slide">
                                        <div class="view__preview"><img class="view__pic" src="https://img.youtube.com/vi/<?php echo end(explode('/', $video)); ?>/hqdefault.jpg" alt="<?php echo $heading_title; ?>"></div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card__desc">
                    <div class="card__head">
                        <div class="card__articul"><?php echo $text_article; ?>&nbsp;<span class="card__code"><?php echo $sku; ?></span></div>
                        <meta itemprop="brand" content="YES">
                        <meta itemprop="sku" content="<?php echo $sku; ?>">
                        <div class="card__rating rating">
                            <?php if ($review_status) { ?>
                            <div class="rating__list" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                  <?php if ($rating < $i) { ?>
                                    <div class="rating__item">
                                        <svg class="icon icon-star-empty"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-star-empty"></use></svg>
                                    </div>
                                  <?php } else { ?>
                                  <div class="rating__item">
                                      <svg class="icon icon-star"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-star"></use></svg>
                                  </div>
                                  <?php } ?>
                                <?php } ?>
                                <?php if ($rating) { ?>
                                    <meta itemprop="worstRating" content="1"/>
                                    <meta itemprop="ratingValue" content="<?php echo $rating; ?>"/>
                                    <meta itemprop="bestRating" content="5"/>
                                    <meta itemprop="ratingCount" content="<?php echo $reviews; ?>"/>
                                  <?php } else { ?>
                                    <meta itemprop="worstRating" content="1"/>
                                    <meta itemprop="ratingValue" content="5"/>
                                    <meta itemprop="bestRating" content="5"/>
                                    <meta itemprop="ratingCount" content="1"/>
                                  <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if ($review_status) { ?>
                            <div class="card__review"><?php echo $text_total_reviews; ?> <span class="card__number"><?php echo $reviews; ?></span></div>
                        <?php } ?>
                    </div>
                    <h1 class="card__product"><?php echo $heading_title; ?></h1>
                    <meta itemprop="name" content="<?php echo $heading_title; ?>">
                    <meta itemprop="url" content="<?php echo $product_url; ?>">

                    <!-- Buttons moved here 07.02.2022 -->
                    <div class="card__btns">
                        <div style="display:none">
                            <label class="control-label" for="input-quantity"><?php echo $entry_qty; ?></label>
                            <input type="text" name="quantity" value="<?php echo ($minimum) ? $minimum : 1; ?>" size="2" id="input-quantity" class="form-control hidden" />
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
                        </div>
                        <?php /* <button type="button" id="button-cart" data-loading-text="<?php echo $text_loading; ?>" class="card__btn btn btn_orange btn__text"><span class="btn__text"><?php echo $button_cart; ?></span></button> */ ?>
                        <a class="card__btn btn btn_orange" href="<?php echo $shops ? '#' : $infolinks['wheretobuy']['href']; ?>" data-shops="<?php echo $shops ? '1' : '0'; ?>" id="to_buy"><span class="btn__text">
                                <?php /*if ( $isBackpack ) : ?>
                                <?php echo $buy_discount_backpack; ?>
                                <?php else :*/ ?>
                                <?php echo $shops ? $text_buy : $text_to_buy; ?>
                                <?php //endif; ?>
                            </span></a>

                    </div>
                    <!-- END BUTTONS -->

                    <div class="card__text" itemprop="description"><?php echo $description; ?></div>
                    <?php
                    if ( $alternate ) :
                    ?>
                    <div class="alternate-collors">
                        <div class="label-block"><?=$another_color?></div>
                        <div class="color-links">
                            <?php foreach( $alternate as $item ) : ?>
                            <a href="<?=$item['link']?>" target="_blank" class="<?=$item['color']?>"><?=$item['color_entry']?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php
                    endif;
                    ?>
                    <?php
                    if( !empty( $current_status ) ) {
                        ?>
                        <div class="stock-status status-id-<?=$current_status_id?>">
                            <span class="text"><?=$text_availability?> </span>
                            <span class="status"><?=$current_status?></span>
                        </div>
                        <?php
                    }
                    ?>
                    <?php /*if ( $isBackpack ) : ?>
                    <div style="color: #970000;" class="old_price_label"><?= $old_price_backpack ?></div>
                    <?php endif;*/ ?>
                    <!--a class="card__more" href="#">???????????? ??????????????????</a-->
                    <meta itemprop="itemCondition" itemtype="http://schema.org/OfferItemCondition" content="http://schema.org/NewCondition" />
                    <div class="card__price" itemprop="offers" itemscope="itemscope" itemtype="http://schema.org/Offer">
                        <?php if($price_old>0) { ?>
                            <?php if (FALSE && $price_special > 0) { ?>
                            <p style="text-decoration: line-through; font-size:24px;font-weight: 400;color: #222;"><?php echo $price; ?></p>
                            <span style="color: red;"><?php echo $price_special; ?></span>
                            <?php } else { ?>
                                <?php echo $price; ?>
                            <?php } ?>
                        <?php } ?>
                        <meta itemprop="category" content="<?php echo $product_cat; ?>">
                        <meta itemprop="price" content="<?php echo ($price_special > 0)? $price_special: $price_old; ?>">
                        <meta itemprop="priceCurrency" content="UAH">
                        <meta itemprop="availability" content="<?php echo $price_old ? 'InStock' : 'OutOfStock'; ?>">
                        <meta itemprop="url" content="<?php echo $product_url; ?>">
                        <meta itemprop="priceValidUntil" content="<?php echo $priceValidUntil; ?>">
                    </div>
                    <?php /*if ( ! empty( $newPriceAction ) ) : ?>
                    <div class="new-price">
                        <?php echo $newPriceAction; ?> ??????
                    </div>
                    <?php endif;*/ ?>

                    <!-- <div class="card__btns">
                        <div style="display:none">
                            <label class="control-label" for="input-quantity"><?php echo $entry_qty; ?></label>
                            <input type="text" name="quantity" value="<?php echo ($minimum) ? $minimum : 1; ?>" size="2" id="input-quantity" class="form-control hidden" />
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
                        </div>
                        <?php /* <button type="button" id="button-cart" data-loading-text="<?php echo $text_loading; ?>" class="card__btn btn btn_orange btn__text"><span class="btn__text"><?php echo $button_cart; ?></span></button> */ ?>
                        <a class="card__btn btn btn_orange" href="<?php echo $shops ? '#' : $infolinks['wheretobuy']['href']; ?>" data-shops="<?php echo $shops ? '1' : '0'; ?>" id="to_buy"><span class="btn__text">
                                <?php /*if ( $isBackpack ) : ?>
                                    <?php echo $buy_discount_backpack; ?>
                                <?php else :*/ ?>
                                    <?php echo $shops ? $text_buy : $text_to_buy; ?>
                                <?php //endif; ?>
                            </span></a>
                        <a class="card__btn btn btn_white question" href="<?php echo $infolinks['kontakty']['href']; ?>"><span class="btn__text"><?php echo $text_ask; ?></span></a>
                    </div> -->
                    <div class="card__btns" style="display:block;">
                        <?php ///!!!2020-11-12
                            $zzz = array('169', '12', '4', '3');
                            foreach ($category_idz as $i) {
                                if (in_array($i, $zzz)) { ?>

                                        <a class="card__btn btn btn_white" href="image/setka_<?php echo $language_code; ?>.jpg" data-fancybox>
                                            <span class="btn__text"><?php echo $text_show_setka; ?></span>
                                        </a>

                        <?php break; } } ?>
                        <a class="card__btn btn btn_white question" href="<?php echo $infolinks['kontakty']['href']; ?>"><span class="btn__text"><?php echo $text_ask; ?></span></a>
                    </div>
                    <?php if($attribute_groups) { ?>
                    <div class="card__flex" >
                        <label for="comp" class="card__checkbox checkbox">
                            <input id="comp" class="checkbox__input" type="checkbox" <?php echo $in_compare ? 'checked':''; ?> onclick="compare.add('<?php echo $product_id; ?>');">
                            <span class="checkbox__in">
                                <span class="checkbox__check"></span>
                                <span class="checkbox__text"><?php echo $in_compare ? $button_compare_in : $button_compare; ?></span>
                            </span>
                        </label>
                        <a class="card__line <?php if($in_compare) echo 'active'; ?>" href="<?php echo $url_compare; ?>">
                            <div class="card__counter" id="compare-total"><?php echo $cnt_compare; ?></div>
                            <div class="card__next next"><?php echo $to_compare; ?><svg class="icon icon-arrow-right"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-right"></use></svg></div>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if($promoActive && 1 == 2) : ?>
                    <div class="promo-link">
                        <div class="text">
                            <a class="" href="http://promocode.yes-tm.com" target="_blank">
                                <?= $text_promo_link ?>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="card__share share">
                        <div class="share__note"><?php echo $text_share; ?></div>
                        <div class="share__btn js-share-btn">
                            <svg class="icon icon-share">
                                <use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-share"></use>
                            </svg>
                        </div>
                        <div class="share__social social social_black js-share-social">
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_pinterest"></a>
                                <a class="a2a_button_viber"></a>
                                <a class="a2a_button_telegram"></a>
                                <a class="a2a_button_whatsapp"></a>
                            </div>
                        </div>
                    </div>
                    <?php if ($video) { ?>
                    <div class="card__btns video_btn">
                        <button class="card__btn btn btn_orange " id="video_btn" href="<?=$video?>" data-fancybox >
                            <svg class="icon icon-youtube"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-youtube"></use></svg>
                            <span class="btn__text"><?php echo $tab_video_review; ?></span>
                        </button>
                    </div>
                    <?php } ?>
                    <div class="card__bg"><img class="card__pic" src="catalog/view/theme/moroz/stylesheet/img/yes.svg" alt="yes-tm background"></div>
                </div>
            </div>
        </div>
    <div class="options">
        <div class="options js-tabs">
            <div class="options__top">
                <div class="options__center center options__nav__wrap">
                    <div class="options__nav">
                        <?php if($attribute_groups) { ?>
                        <button class="options__link js-tabs-link active" id="attr"><?php echo $tab_attribute; ?></button>
                        <?php } ?>
                        <?php if ($infografika_big && $infografika_thumb) { ?>
                        <button class="options__link js-tabs-link infografika" id="infografika"><?php echo $tab_infografika; ?></button>
                        <?php } ?>
                        <?php if($shops) { ?>
                        <button class="options__link js-tabs-link online<?php echo !$attribute_groups ? ' active' : ''; ?>" id="online"><?php echo $tab_online; ?></button>
                        <?php } ?>
                        <?php if($events) { ?>
                        <button class="options__link js-tabs-link offline<?php echo !$attribute_groups && !$shops ? ' active' : ''; ?>" id="offline"><?php echo $tab_offline; ?></button>
                        <?php } ?>
                        <?php if ($review_status) { ?>
                        <button class="options__link js-tabs-link rew" id="rew"><?php echo $tab_review; ?></button>
                        <?php } ?>
                        <?php if ($video) { ?>
                        <button class="options__link js-tabs-link vidos" id="vidos"><?php echo $tab_video_review; ?></button>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="options__body">
                <div class="options__center center">
                    <div class="options__container">
                        <?php if($attribute_groups) { ?>
                        <div class="options__item js-tabs-item" style="display: block;">
                            <ul class="options__stat">
                                <?php foreach ($attribute_groups as $attribute_group) { ?>
                                <?php foreach ($attribute_group['attribute'] as $attribute) { ?>
                                <?php if($attribute['attribute_id'] == 144) continue; ?>
                                <li><span class="options__category"><?php echo $attribute['name']; ?></span><span class="options__value">
                                        <?php if ($attribute['href']) : ?>
                                            <a href="<?=$attribute['href']?>" target="_blank"><?php echo $attribute['text']; ?></a>
                                        <?php else : ?>
                                            <?php echo $attribute['text']; ?>
                                        <?php endif; ?>
                                    </span></li>
                                <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>
                        <?php if ($infografika_big && $infografika_thumb) { ?>
                        <div class="options__item js-tabs-item">
                            <div class="view__slide">
                                <a class="view__preview" data-src="<?php echo $infografika_big; ?>" href="#" data-fancybox="infografika">
                                    <img class="view__pic" src="<?php echo $infografika_thumb; ?>" alt="<?php echo $tab_infografika; ?>" >
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($shops) { ?>
                        <div class="options__item js-tabs-item"<?php echo !$attribute_groups ? ' style="display: block;"' : ''; ?>>
                            <div class="shops">
                                <div class="shops__list">
                                    <div class="shops__row shops__row_head">
                                        <div class="shops__col"><?php echo $text_stores; ?></div>
                                        <div class="shops__col"><?php echo $text_info; ?></div>
                                        <div class="shops__col"><?php echo $text_conditions; ?></div>
                                    </div>
                                    <?php echo $shops; ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php if($events) { ?>
                        <div class="options__item js-tabs-item"<?php echo !$attribute_groups && !$shops ? ' style="display: block;"' : ''; ?>>
                            <?php echo $events; ?>
                        </div>
                        <?php } ?>
                        <?php if ($review_status) { ?>
                        <div class="options__item js-tabs-item">
                            <?php include 'comments.tpl'; ?>
                        </div>
                        <?php } ?>
                        <?php if ($video) { ?>
                        <div class="options__item js-tabs-item">
                            <div class="video__block">
                                <iframe class="video_frame" src="<?php echo $video; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($related){ ?>
<?php include 'related.tpl'; ?>
<?php } ?>
<?php if($content_bottom){ ?>
<?php echo $content_bottom; ?>
<?php } ?>
<?php if($popular){ ?>
<?php include 'popular.tpl'; ?>
<?php } ?>

<script>
    let product_id = '<?php echo $product_id; ?>';
</script>
<script type="text/javascript"><!--
    $('#button-cart').on('click', function() {
        $.ajax({
            url: 'index.php?route=checkout/cart/add',
            type: 'post',
            data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
            dataType: 'json',
            beforeSend: function() {
                $('#button-cart').button('loading');
            },
            complete: function() {
                $('#button-cart').button('reset');
            },
            success: function(json) {
                $('.alert, .text-danger').remove();
                $('.form-group').removeClass('has-error');

                if (json['error']) {
                    if (json['error']['option']) {
                        for (i in json['error']['option']) {
                            var element = $('#input-option' + i.replace('_', '-'));

                            if (element.parent().hasClass('input-group')) {
                                element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                            } else {
                                element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                            }
                        }
                    }

                    if (json['error']['recurring']) {
                        $('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
                    }

                    // Highlight any found errors
                    $('.text-danger').parent().addClass('has-error');
                }

                if (json['success']) {
                    $('.breadcrumb').after('<div class="alert alert-success">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

                    $('#cart > button').html('<span id="cart-total"><i class="fa fa-shopping-cart"></i> ' + json['total'] + '</span>');

                    $('html, body').animate({ scrollTop: 0 }, 'slow');

                    $('#cart > ul').load('index.php?route=common/cart/info ul li');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
    //--></script>

<?php echo $footer; ?>