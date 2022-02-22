<?php if ($selecteds) { ?>
<div class="category__sort-dop" id="selected-options">
    <div class="category__sort-dop__pop-up active">
        <?php foreach ($selecteds as $option) { ?>
        <div class="ocfilter-option">
            <?php foreach ($option['values'] as $value) { ?>
            <button type="button" onclick="location = '<?php echo $value['href']; ?>';" class="remove_filter"><?php echo $option['name']; ?>: <?php echo $value['name']; ?> <i class="fa fa-times"></i></button>
            <?php } ?>
        </div>
        <?php } ?>
        <div class="remove_filter ocfilter-option" onclick="location = '<?php echo $link; ?>';" ><?php echo $text_cancel_all; ?></div>
    </div>
</div>
<div class="hidden" id="ocfilter-button" style="display: none">
<button class="btn btn-primary disabled" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Загрузка.."></button>
</div>
<?php } ?>
