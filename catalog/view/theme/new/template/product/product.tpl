<?php echo $header; ?>
<main class="page good">
    <section class="good__body">
        <?php include 'breadcrumbs.tpl'; ?>
        <div class="good__top" itemscope itemtype="http://schema.org/Product">
            <div class="good__img">
                <div class="good__img-box">
                    <?php if ($thumb || $images) { ?>
                    <div class="good__img-big <?php if (!$images) { echo 'oneimage'; } ?>">
                        <?php if ($thumb) { ?>
                        <button class="good__img-big--button-prev"><i class="fas fa-chevron-circle-left good__img-big--prev"></i></button>
                        <img src="<?php echo $popup; ?>" alt="<?php echo $heading_title; ?>" itemprop="image">
                        <button class="good__img-big--button-next"><i class="fas fa-chevron-circle-right good__img-big--next"></i></button>
                        <?php } ?>
                    </div>
                    <?php if ($images) { ?>
                    <div class="good__img-small">
                        <?php if ($thumb) { ?>
                        <div class="active">
                            <img src="<?php echo $thumb; ?>" alt="<?php echo $heading_title; ?>" data-src ="<?php echo $popup; ?>">
                        </div>
                        <?php } ?>
                        <?php foreach ($images as $image) { ?>
                        <div>
                        <img src="<?php echo $image['thumb']; ?>" alt="<?php echo $heading_title; ?>" data-src ="<?php echo $image['popup']; ?>">
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="good__option">
                <div class="good__option-box">
                    <span class="vertical-slider__subtitlegood">yes</span>
                    <div class="good__option-head">
                        <span>
                            <?php echo $text_article; ?> <b><?php echo $sku;?></b>
                        </span>
                        <meta itemprop="brand" content="YES">
                        <meta itemprop="sku" content="<?php echo $sku; ?>">
                        <?php if ($review_status) { ?>
                        <div class="good__option-stars" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                              <?php if ($rating < $i) { ?>
                                <i class="fas fa-star"></i>
                              <?php } else { ?>
                                <i class="fas fa-star active"></i>
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
                    <h1 class="good__option-title">
                        <?php echo $heading_title; ?>
                    </h1>
                    <meta itemprop="name" content="<?php echo $heading_title; ?>">
                    <meta itemprop="url" content="<?php echo $product_url; ?>">
                    <?php if ($review_status) { ?>
                    <div class="good__option-review">
                        <span> <?php echo $text_total_reviews; ?> <a href="#"><?php echo $reviews; ?></a></span>
                    </div>
                    <?php } ?>
                    <div class="good__option-desc" itemprop="description">
                        <?php echo $description; ?>
                    </div>
                    <?php if($attribute_groups) { ?>
                    <div class="good__option-compare <?php if($in_compare) echo 'active'; ?>">
                        <button onclick="compare.add('<?php echo $product_id; ?>');"><i class="fas fa-check-square"></i><?php echo $in_compare ? $button_compare_in : $button_compare; ?></button>
                        <div class="good__option-compare-link">
                            <span class="number" id="compare-total"><?php echo $cnt_compare; ?></span>
                            <a href="<?php echo $url_compare; ?>"><?php echo $to_compare; ?><span></span></a>
                        </div>
                    </div>
                    <?php } ?>
                    <!--div class="good__option-color">
                        <h3 class="good__option-color-title">Доступные цвета</h3>
                        <div class="good__option-color__pop-up">
                            <span><input id="cl1" checked type="radio" value="bla"><label for="cl1"></label></span>
                            <span><input id="cl2" type="radio" value="blu"><label for="cl2"></label></span>
                            <span><input id="cl3" type="radio" value="yel"><label for="cl3"></label></span>
                            <span><input id="cl4" type="radio" value="gre"><label for="cl4"></label></span>
                            <span><input id="cl5" type="radio" value="red"><label for="cl5"></label></span>
                        </div>
                    </div-->
                    <meta itemprop="itemCondition" itemtype="http://schema.org/OfferItemCondition" content="http://schema.org/NewCondition" />
                    <div class="good__option-price" itemprop="offers" itemscope="itemscope" itemtype="http://schema.org/Offer">
                        <?php if($price_old>0) { ?>
                        <span><b><?php echo $price; ?></b></span>
                        <?php } ?>
                        <meta itemprop="category" content="<?php echo $product_cat; ?>">
                        <meta itemprop="price" content="<?php echo $price_old; ?>">
                        <meta itemprop="priceCurrency" content="UAH">
                        <meta itemprop="availability" content="<?php echo $price_old ? 'InStock' : 'OutOfStock'; ?>">
                        <meta itemprop="url" content="<?php echo $product_url; ?>">
                        <meta itemprop="priceValidUntil" content="<?php echo $priceValidUntil; ?>">
                    </div>
                    <div class="good__option-buttons">
                        <a class="good__option-button" href="<?php echo $shops ? '#' : $infolinks['wheretobuy']['href']; ?>" data-shops="<?php echo $shops ? '1' : '0'; ?>" id="to_buy"><?php echo $shops ? $text_buy : $text_to_buy; ?></a>
                        <a class="good__option-button" href="<?php echo $infolinks['kontakty']['href']; ?>"><?php echo $text_ask; ?></a>
                    </div>
                    <div class="good__option-share">
                        <span><?php echo $text_share; ?><a></a></span>
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
            </div>
        </div>
        <div class="good__desc">
            <div class="good__desc-head">
                <div class="good__desc-wrap">
                    <?php if($attribute_groups) { ?>
                    <button class="active"><?php echo $tab_attribute; ?></button>
                    <?php } ?>
                    <?php if($shops) { ?>
                    <button class="online <?php echo !$attribute_groups ? 'active' : ''; ?>"><?php echo $tab_online; ?></button>
                    <?php } ?>
                    <button class="offline <?php echo !$attribute_groups && !$shops ? 'active' : ''; ?>"><?php echo $tab_offline; ?></button>
                    <?php if ($review_status) { ?>
                    <button class="rew"><?php echo $tab_review; ?></button>
                    <?php } ?>
                </div>
            </div>
            <div class="good__desc-bot">
                <?php if($attribute_groups) { ?>
                <h3 class="category__sidebar-title active"><?php echo $tab_attribute; ?></h3>
                <div class="good__desc-text active">
                    <div class="good__desc-opt">
                        <div class="good__desc-left">
                            <?php foreach ($attribute_groups as $attribute_group) { ?>
                              <?php foreach ($attribute_group['attribute'] as $attribute) { ?>
                            <span><b><?php echo $attribute['name']; ?> </b><i></i></span>
                              <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="good__desc-right">
                            <?php foreach ($attribute_groups as $attribute_group) { ?>
                              <?php foreach ($attribute_group['attribute'] as $attribute) { ?>
                                <span><?php echo $attribute['text']; ?></span>
                              <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if($shops) { ?>
                <h3 class="online category__sidebar-title"><?php echo $tab_online; ?></h3>
                <div class="good__desc-text<?php echo !$attribute_groups ? ' active' : ''; ?>">
                    <div class="good__desc-row first">
                        <div class="good__desc-img">
                            <span><?php echo $text_stores; ?></span>
                        </div>
                        <div class="good__desc-info">
                            <span><?php echo $text_info; ?></span>
                        </div>
                        <div class="good__desc-conditions">
                            <span><?php echo $text_conditions; ?></span>
                        </div>
                    </div>
                    <?php echo $shops; ?>
                </div>
                <?php } ?>
                <h3 class="offline category__sidebar-title"><?php echo $tab_offline; ?></h3>
                <div class="good__desc-text<?php echo !$attribute_groups && !$shops ? ' active' : ''; ?>">
                    <div class="good__desc-text-wrap">
                        <?php echo $events; ?>
                    </div>
                </div>
                <?php if ($review_status) { ?>
                <h3 class="rew category__sidebar-title"><?php echo $tab_review; ?></h3>
                <div class="good__desc-text">
                    <div class="good__desc-text-wrap">
                        <div class="good__desc-reviews">
                            <?php echo $load_reviews; ?>
                        </div>
                        <div class="good__desc-review">
                            <h3 class="good__desc-u-title"><?php echo $text_write; ?></h3>
                            <form action="#" data-action="index.php?route=product/product/write&product_id=<?php echo $product_id; ?>" id="form-review">
                                <div id="recaptcha" class="g-recaptcha"
                                 data-sitekey="6LdR0awUAAAAAANaiO6Pe3uL9lDR4Z1muGw7a6pd"
                                 data-badge="inline"
                                 data-callback="onSubmitRev"
                                 data-size="invisible"></div>
                                <div class="good__desc-u-stars">
                                    <?php echo $entry_rating; ?>
                                    <div id="reviewStars-input">
                                        <input class="star-rating__input" type="radio" name="rating" value="5" id="star-5" />
                                        <label class="star-rating__ico " for="star-5"><i class="fal fa-star"></i></label>
                                        <input class="star-rating__input" type="radio" name="rating" value="4" id="star-4" />
                                        <label class="star-rating__ico " for="star-4"><i class="fal fa-star"></i></label>
                                        <input class="star-rating__input" type="radio" name="rating" value="3" id="star-3" />
                                        <label class="star-rating__ico " for="star-3"><i class="fal fa-star"></i></label>
                                        <input class="star-rating__input" type="radio" name="rating" value="2" id="star-2" />
                                        <label class="star-rating__ico " for="star-2"><i class="fal fa-star"></i></label>
                                        <input class="star-rating__input" type="radio" name="rating" value="1" id="star-1" />
                                        <label class="star-rating__ico " for="star-1"><i class="fal fa-star"></i></label>
                                    </div>
                                </div>
                                <label for="name"><?php echo $entry_name; ?></label>
                                <input type="text" name="name"  id="name" placeholder="<?php echo $placeholder_name; ?>">
                                <label for="text"><?php echo $entry_review; ?></label>
                                <textarea id="text" name="text" cols="30" rows="10" placeholder="<?php echo $placeholder_review; ?>"></textarea>
                                <button type="button" id="button-review">
                                    <i class="fas fa-sync-alt"></i>
                                    <?php echo $button_write; ?>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php if($related){ ?>
    <section class="good__dop">
        <div class="collections-slider">
            <div class="collections-slider__head">
                <div class="collections-slider__title">
                    <h2 class="collections-slider__title-text"><?php echo $text_related_hit; ?></h2>
                </div>
                <div class="collections-slider__nav">
                    <div class="collections-slider__nav-wrap">
                        <div class="collections-slider__nav-slider" id="collections-slider__nav-slider-first">
                            <?php for($i=1;$i<=count($related);$i++){ ?>
                            <span class="collections-slider__nav-number" data-progress="<?php echo $i; ?>"><?php echo $i; ?></span>
                            <?php } ?>
                        </div>
                        <span>/ <?php echo count($related); ?></span>
                    </div>
                    <div class="collections-slider__nav-progress">
                        <div class="collections-slider__nav-complete"></div>
                    </div>
                </div>
            </div>
            <div id="collections-slider__slider-first" class="collections-slider__slider">
                <?php foreach($related as $r){ ?>
                <div class="collections-slider__slide">
                    <img class="collections-slider__slide-img" src="<?php echo $r['thumb']; ?>" alt="<?php echo $r['name']; ?>">
                    <span class="collections-slider__slide-article"><?php echo $text_article; ?><?php echo $r['model']; ?></span>
                    <span class="collections-slider__slide-desc">
                    <?php echo $r['name']; ?>
                    </span>
                    <span class="collections-slider__slide-price"><b><?php echo $r['price']; ?></b></span>
                    <div class="collections-slider__slide-links">
                        <a href="<?php echo $r['href'].'#online'; ?>" class="collections-slider__slide-link"><?php echo $text_to_buy; ?></a>
                        <a href="<?php echo $r['href']; ?>" class="collections-slider__slide-link"><?php echo $text_more; ?></a>
                    </div>
                    <?php if($r['stock']) { ?>
                    <span class="collections-slider__slide-tab"><?php echo $r['stock']; ?></span>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>
</main>
<script>
    let product_id = '<?php echo $product_id; ?>';
</script>
<?php echo $footer; ?>