<?php if (count($languages) > 1) { ?>
<div class="header__language-wrap">
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-language">
  <?php  foreach ($languages as $language) { ?>
  <button class="header__language <?php if ($language['code'] == $code) { echo 'active'; } ?>" type="button" rel="<?php echo $language['code']; ?>"><?php echo $language['name']; ?></button>
  <?php } ?>
  <input type="hidden" name="code" value="" />
  <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
</form>
</div>
<?php } ?>