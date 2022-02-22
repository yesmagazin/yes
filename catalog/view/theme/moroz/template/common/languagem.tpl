<?php if (count($languages) > 1) { ?>
<div class="header__lang lang js-lang">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-language">
        <div class="lang__head js-lang-head"><?php echo $active; ?></div>
        <div class="lang__drop js-lang-drop">
            <div class="lang__list">
                <?php  foreach ($languages as $language) { ?>
                <button class="lang__link <?php if ($language['code'] == $code) { echo 'active'; } ?>" rel="<?php echo $language['code']; ?>"><?php echo $language['name']; ?></button>
                <?php } ?>
            </div>
        </div>
        <input type="hidden" name="code" value="" />
        <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
    </form>
</div>
<?php } ?>