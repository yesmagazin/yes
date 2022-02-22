<?php echo $header; ?>

<div class="head">
    <div class="head__preview blogue"></div>
    <div class="head__center center">
        <div class="head__wrap">
            <?php include 'breadcrumbs.tpl'; ?>
            <h1 class="head__title title"><?php echo $text_details; ?></h1>
            <div class="head__stage stage">Blogue</div>
        </div>
    </div>
</div>
<div class="news news_blog">
    <div class="news__center center">
        <?php if ($articles) { ?>
        <div class="news__list">
            <?php foreach ($articles as $article) { ?>
            <a class="news__item" href="<?php echo $article['href']; ?>">
                <div class="news__preview">
                    <img class="news__pic" src="<?php echo $article['thumb']; ?>" alt="<?php echo $article['name']; ?>">
                </div>
                <div class="news__top">
                    <div class="news__category"><?php echo $article['cat_name']; ?></div>
                    <div class="news__date"><?php echo $article['date']; ?></div>
                </div>
                <h4 class="news__name"><?php echo $article['name']; ?></h4>
                <div class="news__text">
                    <?php echo (mb_strlen($article['preview']) > 100 ) ? mb_substr(strip_tags($article['preview']), 0, 100, 'UTF-8').'..' : $article['preview']; ?>
                </div>
            </a>
            <?php } ?>
        </div>
        <?php } ?>
        <div class="news__foot">
            <?php /*<a class="news__btn btn btn_orange" href="<?php echo $href_all; ?>">
                <span class="btn__text"><?php echo $text_all; ?></span>
            </a>*/ ?>
            <?php echo $pagination; ?>
        </div>
    </div>
</div>

<?php echo $footer; ?>