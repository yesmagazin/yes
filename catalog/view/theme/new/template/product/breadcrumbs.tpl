<div class="crumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
    <?php foreach ($breadcrumbs as $k=>$breadcrumb) { ?>
    <?php if($k != (count($breadcrumbs)-1)) { ?>
    <span itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
        <a href="<?php echo $breadcrumb['href']; ?>" class="crumbs__link" itemprop="item">
            <meta itemprop="position" content="<?php echo $k+1; ?>">
            <span itemprop="name">
                <?php echo $breadcrumb['text']; ?>
            </span>
        </a>
    </span>
    /
    <?php }else{ ?>
    <span class="crumbs__active">
        <?php echo $breadcrumb['text']; ?>
    </span>
    <?php } ?>
    <?php } ?>
</div>