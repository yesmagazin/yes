<?php echo $header; ?>

<main class="page collections page-post">
    <section class="collections__head">
        <div class="collections__head-wrap">
            <?php include 'breadcrumbs.tpl'; ?>
            <h2 class="page__title"><?php echo $heading_title; ?></h2>
            <span class="page__backtitle">Blogue</span>
            <span class="post__date"><?php echo $date; ?></span>
        </div>
    </section>
    <article class="post__body">
        <h2 class="post__heading"><?php echo $heading_title; ?></h2>
        <img class="post__wallpaper" src="<?php echo $popup; ?>" title="<?php echo $heading_title; ?>" alt="<?php echo $heading_title; ?>" />
        <p class="post__text"><?php echo $description; ?></p>
        <p class="blockquote"><?php echo $preview; ?></p>
        <aside>
            <div class="post__aside">
                <h4 class="post__aside-cat"><?php echo $text_share; ?></h4>
                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                    <a class="a2a_button_facebook"></a>
                    <a class="a2a_button_twitter"></a>
                    <a class="a2a_button_viber"></a>
                    <a class="a2a_button_telegram"></a>
                    <a class="a2a_button_whatsapp"></a>
                    <a class="a2a_button_pinterest"></a>
                </div>
            </div>
            <div class="post__aside">
                <h4 class="post__aside-cat"><?php echo $text_categories; ?></h4>
                <?php if ($categories) { ?>
                <?php foreach ($categories as $cat) { ?>
                <a href="<?php echo $cat['href']; ?>" class="post__aside-link"><?php echo $cat['name']; ?></a>
                <?php }} ?>
            </div>
        </aside>
    </article>
    <section class="blog">
        <?php if($articles) { ?>
        <div class="container">
            <h2 class="page__title"><?php echo $text_relative; ?></h2>
            <div class="blog__body">
                <?php foreach($articles as $art) { ?>
                <div class="news-slider__slide slick-slide">
                    <img src="<?php echo $art['thumb']; ?>" alt="<?php echo $art['art_name']; ?>" class="news-slider__slide-img">
                    <div class="news-slider__slide-info">
                        <span class="news-slider__slide-category"><?php echo $art['cat_name']; ?></span>
                        <span class="news-slider__slide-date"><?php echo $art['date']; ?></span>
                    </div>
                    <a href="<?php echo $art['href']; ?>" class="news-slider__slide-title">
                        <?php echo $art['art_name']; ?>
                    </a>
                    <span class="news-slider__slide-desc">
                        <?php echo $art['preview']; ?>
                    </span>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </section>
</main>

<?php echo $footer; ?>