<?php if($articles) { ?>
<div class="news news_main">
    <div class="news__center center">
        <div class="news__head">
            <h2 class="news__title title"><?php echo $heading_title; ?></h2>
            <?php if ($link_to_category) { ?>
            <a class="news__next next" href="<?php echo $link_to_category; ?>">
                <?php echo $text_more; ?>
                <svg class="icon icon-arrow-right"><use xlink:href="catalog/view/theme/moroz/stylesheet/img/sprite.svg#icon-arrow-right"></use></svg>
            </a>
            <?php } ?>
            <div class="news__stage stage">brand news</div>
        </div>
        <div class="news__list">
            <?php foreach ($articles as $k=>$article) {
                if($k<3) {
            ?>
            <a class="news__item" href="<?php echo $article['href']; ?>">
                <div class="news__preview">
                    <img class="news__pic" src="<?php echo $article['thumb']; ?>" alt="<?php echo $article['name']; ?>">
                </div>
                <div class="news__top">
                    <div class="news__category"><?php echo $article['category']; ?></div>
                    <div class="news__date"><?php echo $article['date']; ?></div>
                </div>
                <h4 class="news__name"><?php echo $article['name']; ?></h4>
                <div class="news__text"><?php echo mb_substr($article['preview'],0,100,'UTF-8').".."; ?></div>
            </a>
            <?php }} ?>
        </div>
    </div>
</div>
<?php } ?>