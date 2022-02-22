<?php echo $header; ?>

<main class="page collections page-blog">
    <section class="collections__head">
        <div class="collections__head-wrap">
            <?php include 'breadcrumbs.tpl'; ?>
            <h2 class="page__title"><?php echo $text_details; ?></h2>
            <span class="page__backtitle">Blogue</span>
        </div>
    </section>
    <section class="blog">
        <div class="container">
            <!--div class="ajax-catogory">
                <span class="category__label">Выберите категорию</span>
                <ul class="category__list">
                    <li class="category__list-item active"><a href="">Все категории</a></li>
                    <li class="category__list-item"><a href="">Категория 1</a></li>
                    <li class="category__list-item"><a href="">Категория 2</a></li>
                    <li class="category__list-item"><a href="">Категория 3</a></li>
                </ul>
            </div-->
            <div class="blog__body">
                <?php if ($articles) { ?>
                <div class="row">
                    <?php foreach ($articles as $article) { ?>
                    <div class="news-slider__slide slick-slide">
                        <img src="<?php echo $article['thumb']; ?>" alt="<?php echo $article['name']; ?>" class="news-slider__slide-img">
                        <div class="news-slider__slide-info">
                            <span class="news-slider__slide-category"><?php echo $article['cat_name']; ?></span>
                            <span class="news-slider__slide-date"><?php echo $article['date']; ?></span>
                        </div>
                        <a href="<?php echo $article['href']; ?>" class="news-slider__slide-title">
                            <?php echo $article['name']; ?>
                        </a>
                        <span class="news-slider__slide-desc">
                            <?php echo mb_strlen($article['preview'])>100 ? mb_substr($article['preview'], 0, 100, 'UTF-8').'..' : $article['preview']; ?>
                        </span>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <div class="ajax-navigation">
                <a href="<?php echo $href_all; ?>" class="button"><?php echo $text_all; ?></a>
                <?php echo $pagination; ?>
            </div>
        </div>
    </section>
</main>

<?php echo $footer; ?>