<?php if($categories) { ?>
<div class="filters__item js-accordeon-item <?php if(empty($selectedsFilters)) { echo 'active'; } ?>">
    <div class="filters__head js-accordeon-head"><?php echo $category_name; ?></div>
    <div class="filters__body js-accordeon-body" <?php if(empty($selectedsFilters)) { echo 'style="display: block;"'; } ?> >
        <div class="filters__list">
            <?php foreach ($categories as $category) { ?>
            <a class="filters__link" href="<?php echo $category['href']; ?>" title="<?php echo $category['name']; ?>"><?php echo $category['name']; ?></a>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>