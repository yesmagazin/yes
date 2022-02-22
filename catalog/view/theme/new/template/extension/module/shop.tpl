<?php if ($shops){ ?>
  <?php foreach ($shops as $shop) { ?>
    <div class="good__desc-row">
        <div class="good__desc-img">
            <img src="<?php echo $shop['image']; ?>" alt="">
        </div>
        <div class="good__desc-info">
            <span>
                <?php if($shop['href']){ ?>
                <a href="<?php echo $shop['href'][0]; ?>" target="_blank" rel="nofollow"><?php echo $shop['href'][1]; ?></a><br>
                <?php } ?>
                <?php echo $shop['name']; ?>
            </span>
        </div>
        <div class="good__desc-conditions">
            <span><?php echo $shop['cond']; ?></span>
        </div>
        <div class="good__desc-button">
            <a href="<?php echo $shop['url']; ?>" target="_blank" rel="nofollow"><?php echo $text_to_shop; ?></a>
        </div>
    </div>
  <?php } ?>
<?php } ?>
