<div class="comments__wrap">
    <?php if ($reviews) { ?>
    <div class="comments__list">
        <?php foreach ($reviews as $review) { ?>
        <div class="comments__item" itemprop="review" itemscope itemtype="http://schema.org/Review">
            <meta itemprop="datePublished" content="<?php echo $review['date_added']; ?>"/>
            <div class="comments__head">
                <div class="comments__user">
                    <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                        <span itemprop="name"><?php echo $review['author']; ?></span>
                    </span>
                </div>
                <div class="comments__rating rating">
                    <div class="rating__list" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                        <meta itemprop="ratingValue" content="<?php echo $review['rating']; ?>">
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <?php if ($review['rating'] < $i) { ?>
                        <div class="rating__item">
                            <svg class="icon icon-star-empty"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-star-empty"></use></svg>
                        </div>
                        <?php } else { ?>
                        <div class="rating__item">
                            <svg class="icon icon-star"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-star"></use></svg>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="comments__date"><?php echo $review['date_added']; ?></div>
            </div>
            <div class="comments__text" itemprop="reviewBody"><?php echo $review['text']; ?></div>
        </div>
        <?php } ?>
    </div>
    <?php if($show_button){ ?>
    <div class="comments__btns"><button class="comments__btn btn btn_orange" id="show-more-reviews"><span class="btn__text"><?php echo $text_more_reviews; ?></span></button></div>
    <?php } } else { ?>
    <p><?php echo $text_no_reviews; ?></p>
    <?php } ?>
</div>