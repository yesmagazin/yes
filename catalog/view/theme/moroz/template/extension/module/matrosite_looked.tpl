<div class="center" id="viewed">
  <h2 class="goods__title title"><?php echo $heading_title; ?></h2>
<div class="row">
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
        <span class="btn__text"><?php echo $text_wheretobuy; ?></span>
      </a>
      <a class="product__btn btn btn_orange"  href="<?php echo $product['href']; ?>">
        <span class="btn__text"><?php echo $text_open_product; ?></span>
      </a>
    </div>
  </div>
  <?php } ?>
</div>
</div>
