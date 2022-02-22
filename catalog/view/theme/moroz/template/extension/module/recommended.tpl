<div class="tabs js-tabs">
    <div class="tabs__top">
        <div class="tabs__center center">
            <div class="tabs__nav">
                <?php if($modules2){ ?>
                <button class="tabs__link js-tabs-link active"><?php echo $modules2['title'] ;?></button>
                <?php } ?>
                <?php if($modules5){ ?>
                <button class="tabs__link js-tabs-link"><?php echo $modules5['title'] ;?></button>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="tabs__container">
        <?php if($modules2){ ?>
        <div class="tabs__item js-tabs-item" style="display: block;">
            <div class="slider">
                <div class="slider__center center">
                    <div class="slider__container">
                        <div class="slider__wrap">
                            <div class="slider__list js-slider-tabs">
                                <?php foreach ($modules2['product'] as $product) { ?>
                                <div class="slider__slide">
                                    <div class="product">
                                        <div class="product__inner">
                                            <a class="product__preview" href="<?php echo $product['href']; ?>">
                                                <img class="product__pic" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" />
                                            </a>
                                            <div class="product__body">
                                                <div class="product__code">
                                                    <?php echo $text_model; ?>: <?php echo $product['product_id']; ?>
                                                </div>
                                                <a class="product__name" href="<?php echo $product['href']; ?>">
                                                    <?php echo $product['name']; ?>
                                                </a>
                                                <div class="product__price">
                                                    <?php echo $product['price']; ?>
                                                </div>
                                            </div>
                                            <div class="product__status product__status_new">
                                                <div class="product__text"><?php echo $text_new; ?></div>
                                            </div>
                                        </div>
                                        <div class="product__btns">
                                            <a class="product__btn btn btn_white" href="<?php echo $product['href'].'#online'; ?>">
                                                <span class="btn__text"><?php echo $text_where_to_buy; ?></span>
                                            </a>
                                            <a class="product__btn btn btn_orange" href="<?php echo $product['href']; ?>">
                                                <span class="btn__text"><?php echo $text_podrobnee; ?></span>
                                            </a>
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
        <?php } ?>
        <?php if($modules5){ ?>
        <div class="tabs__item js-tabs-item">
            <div class="slider">
                <div class="slider__center center">
                    <div class="slider__container">
                        <div class="slider__wrap">
                            <div class="slider__list js-slider-tabs">
                                <?php foreach ($modules5['product'] as $product) { ?>
                                <div class="slider__slide">
                                    <div class="product">
                                        <div class="product__inner">
                                            <a class="product__preview" href="<?php echo $product['href']; ?>">
                                                <img class="product__pic" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" />
                                            </a>
                                            <div class="product__body">
                                                <div class="product__code">
                                                    <?php echo $text_model; ?>: <?php echo $product['product_id']; ?>
                                                </div>
                                                <a class="product__name" href="<?php echo $product['href']; ?>">
                                                    <?php echo $product['name']; ?>
                                                </a>
                                                <div class="product__price">
                                                    <?php echo $product['price']; ?>
                                                </div>
                                            </div>
                                            <div class="product__status product__status_new">
                                                <div class="product__text"><?php echo $text_hit; ?></div>
                                            </div>
                                        </div>
                                        <div class="product__btns">
                                            <a class="product__btn btn btn_white" href="<?php echo $product['href'].'#online'; ?>">
                                                <span class="btn__text"><?php echo $text_where_to_buy; ?></span>
                                            </a>
                                            <a class="product__btn btn btn_orange" href="<?php echo $product['href']; ?>">
                                                <span class="btn__text"><?php echo $text_podrobnee; ?></span>
                                            </a>
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
        <?php } ?>
        <?php if (FALSE && ($modules2 || $modules5)) { ?>
        <script>
        $(document).ready(function(){
            $('.js-slider-tabs').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: false,
                arrows:false,
                infinite: true,
                lazyLoad: 'ondemand',
                autoplay: true,
                autoplaySpeed: 6000,
                responsive: [
                    {
                        breakpoint: 1799,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
        </script>
        <?php } ?>
    </div>
</div>