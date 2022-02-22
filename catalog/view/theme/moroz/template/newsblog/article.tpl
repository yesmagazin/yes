<?php echo $header; ?>

<div class="article">
    <div class="article__center center">
        <?php include 'breadcrumbs_article.tpl'; ?>
        <div class="article__head">
            <h1 class="article__title title"><?php echo $heading_title_article; ?></h1>
            <div class="article__date"><?php echo $date; ?></div>
            <div class="article__stage stage">Blogue</div>
        </div>
        <div class="article__preview">
            <img class="article__pic" src="<?php echo $original; ?>" alt="<?php echo $heading_title; ?>" title="<?php echo $heading_title; ?>">
        </div>
        <div class="article__body">
            <div class="article__row">
                <div class="article__desc">
                    <div class="article__category"><?php echo $text_share; ?></div>
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style article__share">
                        <a class="article__link a2a_button_facebook"></a>
                        <a class="article__link a2a_button_viber"></a>
                        <a class="article__link a2a_button_telegram"></a>
                        <a class="article__link a2a_button_pinterest"></a>
                        <!--a class="article__link a2a_button_twitter"></a>
                        <a class="article__link a2a_button_whatsapp"></a-->
                    </div>
                </div>
                <div class="article__content content">
                    <?php echo $description; ?>
                    <?php if ($subscribe_form && empty( $subscribe_form_success )) { echo $subscribe_form; }?>
                    <?php if ($subscribe_form_success) { echo '<h4>'.$subscribe_form_success.'</h4>'; }?>
                    <?php if(isset($preview) && $preview) { ?>
                    <?php echo '<blockquote>'.$preview.'</blockquote>'; ?>
                    <?php } ?>
                </div>
                <div class="article__desc article_categories_list">
                    <?php if ($categories) { ?>
                    <div class="article__category"><?php echo $text_categories; ?></div>
                    <?php foreach ($categories as $cat) { ?>
                    <div class="article__info">
                        <a href="<?php echo $cat['href']; ?>" class="article__info-link"><?php echo $cat['name']; ?></a>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
        <div class="news" style="margin-bottom: 35px;">
            <?php if($articles) { ?>
            <h2 class="news__title title"><?php echo $text_relative; ?></h2>
            <div class="news__list">
                <?php foreach($articles as $art) { ?>
                <a class="news__item" href="<?php echo $art['href']; ?>">
                    <div class="news__preview">
                        <img class="news__pic" src="<?php echo $art['thumb']; ?>" alt="<?php echo $art['art_name']; ?>"">
                    </div>
                    <div class="news__top">
                        <div class="news__category"><?php echo $art['cat_name']; ?></div>
                        <div class="news__date"><?php echo $art['date']; ?></div>
                    </div>
                    <h4 class="news__name"><?php echo $art['art_name']; ?>"</h4>
                    <div class="news__text"><?php echo strip_tags( $art['preview'] ); ?></div>
                </a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php echo $footer; ?>