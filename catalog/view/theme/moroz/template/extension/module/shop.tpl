<?php if ($shops){ ?>
  <?php foreach ($shops as $shop) { ?>
    <div class="shops__row">
        <div class="shops__col">
            <?php if($shop['href']){ ?>
            <a class="shops__preview" href="<?php echo $shop['href'][0]; ?>" target="_blank" rel="nofollow" onclick="pushEvent('<?=trim($shop['href'][1])?>', 'magaz')">
                <img class="shops__pic" src="<?php echo $shop['image']; ?>" alt="<?php echo $shop['name']; ?>">
            </a>
            <?php } else { ?>
            <img class="shops__pic" src="<?php echo $shop['image']; ?>" alt="<?php echo $shop['name']; ?>">
            <?php } ?>
        </div>
        <div class="shops__col">
            <?php if($shop['href']){ ?>
            <a class="shops__link" href="<?php echo $shop['href'][0]; ?>" target="_blank" rel="nofollow" onclick="pushEvent('<?=trim($shop['href'][1])?>', 'magaz')">
                <?php echo $shop['href'][1]; ?>
            </a>
            <?php } ?>
            <div class="shops__about"><?php echo $shop['name']; ?></div>
        </div>
        <div class="shops__col">
            <div class="shops__info">
                <p><?php echo $shop['cond']; ?></p>
            </div>
        </div>
        <div class="shops__col">
            <a class="shops__btn gotoshop btn btn_orange" href="<?php echo $shop['url']; ?>" data-pid="<?php echo $shop['model']; ?>" data-sid="<?php echo $shop['sid']; ?>" target="_blank" rel="nofollow" onclick="pushEvent('<?=trim($shop['href'][1])?>', 'magaz')">
                <span class="btn__text"><?php echo $text_to_shop; ?></span>
            </a>
        </div>
    </div>
  <?php } ?>
<?php } ?>
