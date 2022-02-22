<ul class="article__breadcrumbs breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
    <?php foreach ($breadcrumbs as $k=>$breadcrumb) { ?>
    <?php if($k != (count($breadcrumbs)-1)) { ?>
    <li class="breadcrumbs__item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
        <a class="breadcrumbs__link" href="<?php echo $breadcrumb['href']; ?>" itemprop="item">
            <meta itemprop="position" content="<?php echo $k+1; ?>">
            <span itemprop="name">
                <?php echo $breadcrumb['text']; ?>
            </span>
        </a>
    </li>
    <?php }else{ ?>
    <li class="breadcrumbs__item">
        <?php echo $breadcrumb['text']; ?>
    </li>
    <?php } ?>
    <?php } ?>
</ul>