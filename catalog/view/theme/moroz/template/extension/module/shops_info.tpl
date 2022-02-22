<?php if ($shops){ ?>
<div class="location__brands">
    <?php foreach ($shops as $shop) { ?>
    <a class="location__logo" href="<?php echo $shop['url']; ?>" title="<?php echo $shop['name']; ?>" rel="nofollow" target="_blank"  onclick="pushEvent('<?=trim($shop['href'][1])?>', 'magaz')">
        <img class="location__pic" src="<?php echo $shop['image']; ?>" alt="<?php echo $shop['name']; ?>" width="200">
    </a>
    <?php } ?>
</div>
<?php } ?>
