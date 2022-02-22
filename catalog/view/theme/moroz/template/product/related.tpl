<div class="goods js-goods">
    <div class="goods__center center">
        <h2 class="goods__title title"><?php echo $text_related_hit; ?></h2>
    </div>
    <div class="slider">
        <div class="slider__center center">
            <div class="slider__container">
                <div class="slider__wrap">
                    <div class="slider__list js-slider">
                        <?php foreach($related as $r){ ?>
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