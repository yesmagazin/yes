<?php echo $header; ?>
<div class="head">
    <div class="head__preview" style="background-image: url(catalog/view/theme/moroz/stylesheet/img/bg-head-1.jpg);"></div>
    <div class="head__center center">
        <div class="head__wrap">
            <ul class="head__breadcrumbs breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php foreach ($breadcrumbs as $index => $breadcrumb) { ?>
                    <li class="breadcrumbs__item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                        <a class="breadcrumbs__link" href="<?php echo $breadcrumb['href']; ?>" itemprop="item">
                            <meta itemprop="position" content="<?=++$index?>">
                            <span itemprop="name"><?php echo $breadcrumb['text']; ?></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <h1 class="head__title title" style="max-width: 80%;"><?php echo $heading_title; ?></h1>
        </div>
    </div>
</div>
<div class="container center">
    <div class="row"><?php echo $column_left; ?>
        <?php if ($column_left && $column_right) { ?>
        <?php $class = 'col-sm-6'; ?>
        <?php } elseif ($column_left || $column_right) { ?>
        <?php $class = 'col-sm-9'; ?>
        <?php } else { ?>
        <?php $class = 'col-sm-12'; ?>
        <?php } ?>
        <div id="content" class="<?php echo $class; ?> content information_simple" style="margin-top: 25px; margin-bottom: 25px;"><?php   echo $content_top; ?>
            <?php echo $description; ?>
        </div>

        <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>

<?php echo $footer; ?>