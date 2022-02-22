<div class="location">
    <div class="location__tabs js-tabs">
        <div class="location__center center">
            <div class="location__nav">
                <a class="location__link js-tabs-link active" href="#" data-type="offline"><?php echo $text_offline; ?></a>
                <a class="location__link js-tabs-link" href="#" data-type="online"><?php echo $text_online; ?></a>
            </div>
            <div class="location__container">
                <div class="location__item js-tabs-item" style="<?php echo ( strpos( $_SERVER["REQUEST_URI"], '#shoponline') === false ? 'display: block;' : '' ) ?>">
                    <?php echo $shops['offline']; ?>
                </div>
                <div class="location__item js-tabs-item" style="<?php echo ( strpos( $_SERVER["REQUEST_URI"], '#shoponline') !== false ? 'display: block;' : '' ) ?>">
                    <?php echo $shops['online']; ?>
                </div>
            </div>
        </div>
    </div>
</div>