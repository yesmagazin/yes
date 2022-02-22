<div class="goods js-goods">
  <div class="goods__center center">
    <h2 class="goods__title title"><?php echo $heading_title; ?></h2>
  </div>
  <div class="slider">
    <div class="slider__center center">
      <div class="slider__container">
        <div class="slider__wrap">
          <div class="slider__list js-slider">
            <?php foreach($products as $r){ ?>
            <div class="slider__slide">
              <div class="product">
                <div class="product__inner">
                  <a class="product__preview" href="<?php echo $r['href']; ?>">
                    <img class="product__pic" src="<?php echo $r['thumb']; ?>" alt="<?php echo $r['name']; ?>" />
                  </a>
                  <div class="product__body">
                    <div class="product__code"><?php echo $text_article; ?>&nbsp;<?php echo $r['model']; ?></div>
                    <a class="product__name" href="<?php echo $r['href']; ?>">
                      <?php echo $r['name']; ?>
                    </a>
                    <div class="product__price">
                      <?php echo $r['price']; ?>
                    </div>
                  </div>
                  <?php if($r['stock']) { ?>
                  <div class="product__status product__status_new">
                    <div class="product__text"><?php echo $r['stock']; ?></div>
                  </div>
                  <?php } ?>
                </div>
                <div class="product__btns">
                  <button data-href="<?php echo $r['href'].'#online'; ?>" class="product__btn btn btn_white" onclick="location=this.dataset.href">
                    <span class="btn__text"><?php echo $text_to_buy; ?></span>
                  </button>
                  <button data-href="<?php echo $r['href']; ?>" class="product__btn btn btn_orange" onclick="location=this.dataset.href">
                    <span class="btn__text"><?php echo $text_more; ?></span>
                  </button>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="slider__status js-slider-status"></div>
    <div class="slider__line">
      <div class="slider__progress js-slider-progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
        <span class="slider__label js-slider-label sr-only"></span>
      </div>
    </div>
  </div>
</div>

<?php /*
<h3><?php echo $heading_title; ?></h3>
<div class="row">
  <?php foreach ($products as $product) { ?>
  <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="product-thumb transition">
      <div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" /></a></div>
      <div class="caption">
        <h4><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h4>
        <p><?php echo $product['description']; ?></p>
        <?php if (count($product['diff_attributes'])>0) { ?>
            <strong><?php echo $entry_diff; ?></strong><br/> <?php echo implode('<br/> ',$product['diff_attributes']); ?>
        <?php } ?>
        <?php if ($product['rating']) { ?>
        <div class="rating">
          <?php for ($i = 1; $i <= 5; $i++) { ?>
          <?php if ($product['rating'] < $i) { ?>
          <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
          <?php } else { ?>
          <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
          <?php } ?>
          <?php } ?>
        </div>
        <?php } ?>
        <?php if ($product['price']) { ?>
        <p class="price">
          <?php if (!$product['special']) { ?>
          <?php echo $product['price']; ?>
          <?php } else { ?>
          <span class="price-new"><?php echo $product['special']; ?></span> <span class="price-old"><?php echo $product['price']; ?></span>
          <?php } ?>
          <?php if ($product['tax']) { ?>
          <span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
          <?php } ?>
        </p>
        <?php } ?>
      </div>
      <div class="button-group">
        <button type="button" onclick="cart.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $button_cart; ?></span></button>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_wishlist; ?>" onclick="wishlist.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-heart"></i></button>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_compare; ?>" onclick="compare.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-exchange"></i></button>
      </div>
    </div>
  </div>
  <?php } ?>
</div> */
