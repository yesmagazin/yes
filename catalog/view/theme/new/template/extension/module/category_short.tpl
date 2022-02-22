<?php if($categories) { ?>
<div class="category__sort-cat">
    <div class="category__sidebar-title"><?php echo $category_name; ?></div> 
    <div class="category__sort-cat__pop-up">
        <?php foreach ($categories as $category) { ?>
        <span><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></span>
        <?php } ?>
    </div>
</div>
<?php } ?>