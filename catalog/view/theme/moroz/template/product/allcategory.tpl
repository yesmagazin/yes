<?php echo $header; ?>

<div class="section">
    <div class="section__center center">
        <ul class="section__breadcrumbs breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li class="breadcrumbs__item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                <meta itemprop="position" content="1">
                <a class="breadcrumbs__link" href="/" itemprop="name"><?php echo $text_main; ?></a>
            </li>
            <li class="breadcrumbs__item"><?php echo $text_catalog; ?></li>
        </ul>
        <h1 class="section__title title"><?php echo $text_catalog; ?></h1>
        <?php if ($categories) {  ?>
        <div class="categories">
            <div class="categories__row">
                <div class="category-andre">
                    <a href="<?=$tan_category?>">
                        <img src="/catalog/view/theme/moroz/stylesheet/img/tan-promo/menu-desktop.jpg" class="desktop" alt="">
                        <img src="/catalog/view/theme/moroz/stylesheet/img/tan-promo/menu-mob.jpg" class="mobile" alt="">
                    </a>
                </div>
            </div>
            <div class="categories__row">
            <?php $k = 1;  ?>
            <?php foreach($categories as $category) {  ?>
                <div class="categories__box no_<?php echo $k; ?>">
                    <a class="categories__title title title_sm" href="<?php echo $category['href']; ?>">
                        <?php echo $category['name']; ?>
                    </a>
                    <?php if ($category['children']) {  ?>
                    <div class="categories__list">
                        <?php foreach($category['children'] as $catchild) {  ?>
                        <a class="categories__link" href="<?php echo $catchild['href']; ?>">
                            <?php echo $catchild['name']; ?>
                        </a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <div class="categories__preview__top">
                        <?php if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/image/catalog/allcats/redesign/categories-top-0'.$k.'-min.png')) : ?>
                        <img class="categories__pic__top" src="<?php echo 'image/catalog/allcats/redesign/categories-top-0'.$k.'-min.png'; ?>" alt="<?php echo $category['name']; ?>" width="297">
                        <?php endif; ?>
                    </div>
                    <div class="categories__preview">
                        <?php if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/image/catalog/allcats/redesign/categories-0'.$k.'-min.png')) : ?>
                        <img class="categories__pic" src="<?php echo 'image/catalog/allcats/redesign/categories-0'.$k.'-min.png'; ?>" alt="<?php echo $category['name']; ?>" width="297">
                        <?php endif; ?>
                    </div>
                </div>
            <?php if($k==2) echo '</div><div class="categories__row">'; $k++; ?>
            <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php echo $footer; ?>
