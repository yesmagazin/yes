<?php if ($reviews) { ?>
<?php foreach ($reviews as $review) { ?>
<div class="good__desc-review-row" itemprop="review" itemscope itemtype="http://schema.org/Review">
    <div class="good__desc-review-head">
        <span class="good__desc-review-title" itemprop="author"><?php echo $review['author']; ?></span>
        <div class="good__desc-review-stars" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
            <meta itemprop="worstRating" content="1">
            <meta itemprop="ratingValue" content="<?php echo $review['rating']; ?>">
            <meta itemprop="bestRating" content="5"/>
            <?php for ($i = 1; $i <= 5; $i++) { ?>
              <?php if ($review['rating'] < $i) { ?>
                <i class="fas fa-star"></i>
              <?php } else { ?>
                <i class="fas fa-star active"></i>
              <?php } ?>
            <?php } ?>
        </div>
        <span class="good__desc-review-date"><?php echo $review['date_added']; ?></span>
    </div>
    <span class="good__desc-review-body" itemprop="description">
        <?php echo $review['text']; ?>
    </span>
</div>
<?php } ?>
<?php if($show_button){ ?>
<button class="good__desc-review-button"><?php echo $text_more_reviews; ?></button>
<?php } } else { ?>
<p><?php echo $text_no_reviews; ?></p>
<?php } ?>
