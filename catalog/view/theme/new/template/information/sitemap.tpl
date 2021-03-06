<?php echo $header; ?>

<main class="page sitemap">
    <section class="page__head">
        <?php include 'breadcrumbs.tpl'; ?>
        <h1 class="page__title"><?php echo $heading_title; ?></h1>
    </section>
    <section class="page__body catalog">
        <div class="catalog__box">
            <?php foreach($categories as $category) {  ?>
            <a class="catalog__box-link" href="<?php echo $category['href']; ?>">
                <div class="catalog__box-title"><?php echo $category['name']; ?></div>
            </a>
            <?php if (isset($category['children']) && $category['children']) {  ?>
            <?php include 'sitemap_subcat.tpl'; ?>
            <?php } ?>
            <?php } ?>
        </div>
    </section>
</main>

<?php echo $footer; ?>
