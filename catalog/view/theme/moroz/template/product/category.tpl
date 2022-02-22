<?php if (!$ajax) { ?>

<?php echo $header; ?>

<div class="section category_<?=$catID?>">
    <div class="section__center center">
        <div class="category-head-section">
            <div class="info">
                <?php include 'breadcrumbs.tpl'; ?>
                <h1 class="section__title title"><?php echo $cat_name; ?></h1>
            </div>

            <div class="banner">
                <?php if($is_backpackCategory) : ?>
                <img src="/image/banners/andretan-desktop-850x100.jpg" alt="" class="desktop">
                <img src="/image/banners/andretan-mobile-480x240.jpg" alt="" class="mobile">
                <?php endif; ?>
            </div>
        </div>
        <div class="catalog">
            <div class="catalog__row">
                <div class="catalog__aside">
                    <div class="filters js-filters">
                        <div class="filters__bg js-filters-bg"></div>
                        <div class="filters__wrapper js-filters-wrapper">
                            <div class="filters__title"><?php echo $text_filters; ?></div>
                            <div class="filters__back js-filters-back">
                                <svg class="icon icon-arrow-left"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-left"></use></svg>
                                <?php echo $text_back; ?>
                            </div>
                            <?php echo $column_left; ?>
                        </div>
                    </div>
                </div>
                <div class="catalog__container">
                    <?php if ($products) { ?>
                    <div class="catalog__head">
                        <div class="catalog__sort">
                            <div class="catalog__box">
                                <div class="catalog__text"><?php echo $text_sort; ?></div>
                                <select class="catalog__select" name="head-sort" id="head-sort" onchange="location = this.value;">
                                    <?php foreach ($sorts as $s) { ?>
                                    <?php if ($s['value'] == $sort . '-' . $order) { ?>
                                    <option value="<?php echo $s['href']; ?>" selected="selected"><?php echo $s['text']; ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $s['href']; ?>"><?php echo $s['text']; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="catalog__box">
                                <div class="catalog__text"><?php echo $text_limit; ?></div>
                                <select class="catalog__select" name="head-show" id="head-show" onchange="location = this.value;">
                                    <?php foreach ($limits as $limits) { ?>
                                    <?php if ($limits['value'] == $limit) { ?>
                                    <option value="<?php echo $limits['href']; ?>" selected="selected"><?php echo $limits['text']; ?></option>
                                    <?php } else { ?>
                                    <option value="<?php echo $limits['href']; ?>"><?php echo $limits['text']; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="catalog__btn-filters js-filters-btn">
                            <svg class="icon icon-filter"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-filter"></use></svg>
                            <?php echo $text_filters; ?>
                        </div>
                    </div>
                    <div class="catalog__list">
                        <?php foreach ($products as $product) { ?>
                        <div class="product<?php if (isset($product['actnew']) && !empty($product['actnew']['label'])) { 
                            echo ' actnew">';
  echo '<div class="box-label"><div class="label-product label_actnew">';
  if ($product['actnew']['link']) { 
    echo '<a href="' . $product['actnew']['link'] . '">';
    if ($product['actnew']['sticker']) {
      echo '<img src="' . $product['actnew']['sticker'] . '" title="' . $product['actnew']['label'] . '" />';
    } else {
      echo '<span>' . $product['actnew']['label'] . '</span>';
    }
    echo '</a>';
  } elseif ($product['actnew']['sticker']) {
      echo '<img src="' . $product['actnew']['sticker'] . '" title="' . $product['actnew']['label'] . '" />';
  } else {
    echo '<span>' . $product['actnew']['label'] . '</span>';
  }
  echo '</span></div></div>';
                        } else { 
                            echo '">'; 
                        } ?>
                            <?php if ($product['video']) { ?>
                                <div class="video">
                                    <a data-fancybox href="<?=$product['video']?>">
                                    <svg class="icon icon-youtube"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-youtube"></use></svg>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if ($product['stock_status_id'] == 23 && !$product['byAndre']) { ?>
                                <div class="andretan">
                                    <img src="catalog/view/theme/moroz/stylesheet/img/andretan.png" alt="">
                                </div>
                            <?php } ?>
                            <?php if ($product['byAndre']) { ?>
                            <div class="andretan -by">
                                <img src="catalog/view/theme/moroz/stylesheet/img/tan.svg" alt="">
                            </div>
                            <?php } ?>
                            <?php /*if ( $product['isBackpack'] ) : ?>
                                <div class="box-label">
                                    <div class="label-product label_backpack_discount">
                                        <img src="/catalog/view/theme/moroz/image/backpack_discount_category.png" title="Лови скидки в магазинах партнеров Yes" />
                                    </div>
                                </div>
                            <?php endif;*/ ?>
                            <div class="product__inner">
                                <a class="product__preview" href="<?php echo $product['href']; ?>" title="<?php echo $product['name']; ?>">
                                    <img class="product__pic" src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" data-overlay="<?php echo $product['thumb_hover']; ?>" />
                                </a>
                                <div class="product__body">
                                    <div class="product__code">
                                        <?php if ($product['sku']) { ?>
                                        <span class="category__item-article"><?php  echo $text_model.' '. $product['sku']; ?></span>
                                        <?php } else { ?>
                                        <span class="category__item-article">—</span>
                                        <?php } ?>
                                    </div>
                                    <a class="product__name" href="<?php echo $product['href']; ?>" title="<?php echo $product['name']; ?>">
                                        <?php echo $product['name']; ?>
                                    </a>
                                    <?php if (FALSE && $product['special']) { ?>
                                    <div class="product__price">
                                        <span style="text-decoration: line-through; font-weight: 700;/*color: red;*/ font-size:80%;"><?php echo $product['price']; ?></span> &nbsp;<span style="color:red; font-weight: 900;"><?php echo $product['special']; ?></span>
                                    </div>
                                    <?php } else { ?>
                                    <div class="product__price <?php if ( $product['isBackpack'] ) {  echo 'backback-price'; } ?>">
                                        <?php echo $product['price']; ?>
                                    </div>
                                    <?php } ?>
                                    <?php /*if(!empty($product['actionPrice'])) : ?>
                                    <div class="new-price-cat">
                                        <?php echo $product['actionPrice'] ?> грн
                                    </div>
                                    <?php endif;*/ ?>
                                </div>

                                <?php if($product['stock_status']) { ?>
                                <div class="product__status product__status_new">
                                    <div class="product__text"><?php echo $product['stock_status']; ?></div>
                                </div>
                                <?php } ?>
<?php /*
                                <?php if($product['actnew_label']) { ?>
                                <div class="product__status product__status_new">
                                    <div class="product__text"><?php echo $product['stock_status']; ?></div>
                                </div>
                                <?php } ?>
  */ ?>
                            </div>
                            <div class="product__btns">
                                <a class="product__btn btn btn_white" href="<?php echo $product['href'].'#online'; ?>">
                                    <span class="btn__text"><?php echo $infolinks['wheretobuy']['name']; ?></span>
                                </a>
                                <a class="product__btn btn btn_orange"  href="<?php echo $product['href']; ?>">
                                    <span class="btn__text"><?php echo $text_open_product; ?></span>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <?php echo $pagination; ?>
                    <!--div class="catalog__btns"><button class="catalog__btn btn btn_orange"><span class="btn__text">ПОКАЗАТЬ ЕЩЕ</span></button></div-->
                    <?php } else { ?>
                    <p><?php echo $text_empty; ?></p>
                    <?php } ?>
                </div>

            </div>
            <?php if($content_bottom){ ?>
            <?php echo $content_bottom; ?>
            <?php } ?>


            <?php if($category_reviews) : ?>
            <div class="category_reviews">
{*                <div class="butPlace">*}
{*                    <div class="toggleBut">&plus;</div>*}
{*                </div>*}
{*                <div class="descrInner">*}
{*                    <div class="text">*}
{*                        <?=$description?>*}
{*                    </div>*}
{*                </div>*}
            </div>
            <script>
                /*jQuery(document).on('click', '.toggleBut', function () {
                    var target = jQuery(this).parent().parent().find('.descrInner');
                    if(typeof target !== 'undefined' && !target.hasClass('toggled')) {
                        target.addClass('toggled').css('height', target.find('.text').height() + 60);
                        $(this).html('&minus;');
                    }else if(typeof target !== 'undefined' && target.hasClass('toggled')) {
                        target.removeClass('toggled').css('height', '200px');
                        $(this).html('&plus;');
                    }
                })*/
            </script>
            <?php endif; ?>


            <?php if($description) : ?>
            <div class="description">
                <div class="butPlace">
                    <div class="toggleBut">&plus;</div>
                </div>
                <div class="descrInner">
                    <div class="text">
                        <?=$description?>
                    </div>
                </div>
            </div>
            <script>
                jQuery(document).on('click', '.toggleBut', function () {
                    var target = jQuery(this).parent().parent().find('.descrInner');
                    if(typeof target !== 'undefined' && !target.hasClass('toggled')) {
                        target.addClass('toggled').css('height', target.find('.text').height() + 60);
                        $(this).html('&minus;');
                    }else if(typeof target !== 'undefined' && target.hasClass('toggled')) {
                        target.removeClass('toggled').css('height', '200px');
                        $(this).html('&plus;');
                    }
                })
            </script>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php echo $footer; ?>
<?php } else { //ajax ?>
<?php ob_start(); ?>
                        <?php foreach ($products as $product) { ?>
                        <div class="product<?php if (isset($product['actnew']) && !empty($product['actnew']['label'])) { $actnew = $product['actnew'];
                            echo ' actnew">';
  echo '<div class="box-label"><div class="label-product label_actnew"><span>';
  if ($actnew['link']) { 
    echo '<a href="' . $actnew['link'] . '">';
    if ($actnew['sticker']) {
      echo '<img src="' . $actnew['sticker'] . '" title="' . $actnew['label'] . '" />';
    } else {
      echo $actnew['label'];
    }
    echo '</a>';
  } else {
    echo $actnew['label'];
  }
  echo '</span></div></div>';
                        } else {
  echo '">'; 
                        } ?>
                            <?php if ($product['video']) { ?>
                            <div class="video">
                                <svg class="icon icon-youtube"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-youtube"></use></svg>
                            </div>
                            <?php } ?>
                            <?php if ($product['stock_status_id'] == 23) { ?>
                            <div class="andretan">
                                <img src="catalog/view/theme/moroz/stylesheet/img/andretan.png" alt="">
                            </div>
                            <?php } ?>
                            <div class="product__inner">
                                <a class="product__preview" href="<?php echo $product['href']; ?>" title="<?php echo $product['name']; ?>">
                                    <img class="product__pic" src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" data-overlay="<?php echo $product['thumb_hover']; ?>" />
                                </a>
                                <div class="product__body">
                                    <div class="product__code">
                                        <?php if ($product['sku']) { ?>
                                        <span class="category__item-article"><?php  echo $text_model.' '. $product['sku']; ?></span>
                                        <?php } else { ?>
                                        <span class="category__item-article">—</span>
                                        <?php } ?>
                                    </div>
                                    <a class="product__name" href="<?php echo $product['href']; ?>" title="<?php echo $product['name']; ?>">
                                        <?php echo $product['name']; ?>
                                    </a>
                                    <div class="product__price">
                                        <?php echo $product['price']; ?>
                                    </div>
                                </div>
                                <?php if($product['stock_status']) { ?>
                                <div class="product__status product__status_new">
                                    <div class="product__text"><?php echo $product['stock_status']; ?></div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="product__btns">
                                <a class="product__btn btn btn_white" href="<?php echo $product['href'].'#online'; ?>">
                                    <span class="btn__text"><?php echo $infolinks['wheretobuy']['name']; ?></span>
                                </a>
                                <a class="product__btn btn btn_orange"  href="<?php echo $product['href']; ?>">
                                    <span class="btn__text"><?php echo $text_open_product; ?></span>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
<?php echo $pagination; ?>
<?php $s = ob_get_clean(); echo json_encode($s); exit(); ?>
<?php } ?>
<script async src="catalog/view/javascript/jquery/fancynew/jquery.fancynew.js"></script>