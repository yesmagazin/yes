<?php if (count($languages) > 1) { ?>
<div class="mobile__menu-language">
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-language-m">
  <?php  foreach ($languages as $language) { ?>
  <span class="<?php if ($language['code'] == $code) { echo 'active'; } ?>" rel="<?php echo $language['code']; ?>"><?php echo $language['name']; ?></span>
  <?php } ?>
  <input type="hidden" name="code" value="" />
  <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
</form>
</div>
<?php } ?>