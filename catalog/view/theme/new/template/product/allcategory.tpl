<?php echo $header; ?>

<main class="page">
    <section class="page__head">
        <div class="crumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
            <span itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                <a href="/" class="crumbs__link" itemprop="item">
                    <meta itemprop="position" content="1">
                    <span itemprop="name">
                        <?php echo $text_main; ?>
                    </span>
                </a>
            </span>
            /
            <span class="crumbs__active"><?php echo $text_catalog; ?></span>
        </div>
        <h1 class="page__title"><?php echo $text_catalog; ?></h1>
    </section>
    <?php if ($categories) {  ?>
    <section class="page__body catalog">
    <?php foreach($categories as $category) {  ?>
    <div class="catalog__box">
        <a class="catalog__box-link" href="<?php echo $category['href']; ?>">
            <div class="catalog__box-title"><?php echo $category['name']; ?></div>
        </a>
        <?php if ($category['children']) {  ?>
        <ul class="catalog__box-list">
            <?php foreach($category['children'] as $catchild) {  ?>
            <li class="catalog__box-point">
                <a class="catalog__box-link" href="<?php echo $catchild['href']; ?>"><?php echo $catchild['name']; ?></a>
            </li>
            <?php } ?>
        </ul>
        <?php } ?>
        <img class="catalog__box-img" src="<?php echo $category['image']; ?>" alt="<?php echo $category['name']; ?>">
    </div>
    <?php } ?>
    </section>
    <?php } ?>
</main>

<?php echo $footer; ?>
