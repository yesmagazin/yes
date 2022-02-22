<?php echo $header; ?>

<div class="section page sitemap">
    <div class="section__center center">
        <?php include 'breadcrumbs.tpl'; ?>
        <h1 class="section__title title"><?php echo $heading_title; ?></h1>
        <div id="sitemap__wrap">
            <?php foreach($categories as $category) {  ?>
            <a class="catalog__box-link" href="<?php echo $category['href']; ?>">
                <div class="catalog__box-title"><?php echo $category['name']; ?></div>
            </a>
            <?php if (isset($category['children']) && $category['children']) {  ?>
            <?php include 'sitemap_subcat.tpl'; ?>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

<?php echo $footer; ?>
