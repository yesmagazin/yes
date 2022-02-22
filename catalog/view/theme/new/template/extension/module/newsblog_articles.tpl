<?php if($articles) { ?>
<section class="news-slider">
    <div class="news-slider__head">
        <h2 class="news-slider__title"><?php echo $text_brand_news; ?></h2>
        <h3 class="news-slider__subtitle">brand news</h3>
        <div class="news-slider__nav">
            <div class="news-slider__nav-wrap">
                <div class="news-slider__nav-slider">
                    <span class="news-slider__nav-number" data-progress="1">1</span>
                    <span class="news-slider__nav-number" data-progress="2">2</span>
                    <span class="news-slider__nav-number" data-progress="3">3</span>
                    <span class="news-slider__nav-number" data-progress="4">4</span>
                    <span class="news-slider__nav-number" data-progress="5">5</span>
                </div>
                <span>/ 5</span>
            </div>
            <div class="news-slider__nav-progress">
                <div class="news-slider__nav-complete"></div>
            </div>
        </div>
        <?php if ($link_to_category) { ?>
        <a href="<?php echo $link_to_category; ?>" class="news-slider__more"><?php echo $text_more; ?><i class="arrow"></i></a>
        <?php } ?>
    </div>
    <div class="news-slider__slider">
        <?php foreach ($articles as $article) { ?>
        <div class="news-slider__slide">
            <img src="<?php echo $article['thumb']; ?>" alt="<?php echo $article['name']; ?>" class="news-slider__slide-img">
            <div class="news-slider__slide-info">
                <span class="news-slider__slide-category"><?php echo $article['category']; ?></span>
                <span class="news-slider__slide-date"><?php echo $article['date']; ?></span>
            </div>
            <h3 class="news-slider__slide-title">
                <a href="<?php echo $article['href']; ?>">
                <?php echo $article['name']; ?>
                </a>
            </h3>
            <span class="news-slider__slide-desc">
                <?php echo mb_substr($article['preview'],0,100,'UTF-8').".."; ?>
            </span>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>