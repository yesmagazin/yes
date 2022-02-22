<section class="store__body">
            <div class="store__buttons-container">
                <a href="" class="store__button active-button" data-type="offline"><?php echo $text_offline; ?></a>
                <a href="" class="store__button" data-type="online"><?php echo $text_online; ?></a>
            </div>
            <div class="good__desc-bot">
                <div class="good__desc-text active" data-type="offline">
                    <div class="good__desc-text-wrap">
                        <?php echo $shops['offline']; ?>
                    </div>
                </div>
                <div class="good__desc-text" data-type="online">
                    <div class="good__desc-row first">
                        <div class="good__desc-img">
                            <span><?php echo $text_stores; ?></span>
                        </div>
                        <div class="good__desc-info">
                            <span><?php echo $text_info; ?></span>
                        </div>
                        <div class="good__desc-conditions">
                            <span><?php echo $text_conditions; ?></span>
                        </div>
                    </div>
                    <?php echo $shops['online']; ?>
                </div>
            </div>
        </section>