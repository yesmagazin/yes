<ul class="catalog__box-list subcat">
    <?php foreach($category['children'] as $catchild) {  ?>
    <li class="catalog__box-point">
        <a class="catalog__box-link" href="<?php echo $catchild['href']; ?>"><?php echo $catchild['name']; ?></a>
        <?php if (isset($catchild['children']) && $catchild['children']) {  ?>
        <?php include 'sitemap_subchild.tpl'; ?>
        <?php } ?>
    </li>
    <?php } ?>
</ul>