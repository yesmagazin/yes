<?php if ($selecteds) { ?>
<div class="filters__item js-accordeon-item active">
    <div class="filters__head js-accordeon-head"><?php echo $text_selected; ?></div>
    <div class="filters__body js-accordeon-body pb0" style="display: block;">
        <div class="filters__list">
            <?php foreach ($selecteds as $option) { ?>
            <div class="filters__line ocfilter-option">
                <?php foreach ($option['values'] as $value) { ?>
                <button type="button" onclick="location = '<?php echo $value['href']; ?>';" class="filters__link remove_filter">
                    <?php echo $option['name']; ?>: <?php echo $value['name']; ?>
                </button>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="filters__line remove_filter ocfilter-option" onclick="location = '<?php echo $link; ?>';" >
                <?php echo $text_cancel_all; ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
