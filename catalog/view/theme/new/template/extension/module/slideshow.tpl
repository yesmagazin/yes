<?php  if($module == 1) {?>
<div id="yak4" data-anchor="2">	
		<div id="slideshow<?php echo $module; ?>" class="owl-carousel slider_home" style="opacity: 1;">
		  <?php foreach ($banners as $banner) { ?>
		  <div class="item">
			<?php if ($banner['link']) { ?>
			<a href="<?php echo $banner['link']; ?>"><img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" class="img-responsive" /></a>
			<?php } else { ?>
			<img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" class="img-responsive" />
			<?php } ?>
		  </div>
		  <?php } ?>
		</div>
</div>		
		<script type="text/javascript"><!--
$('#slideshow<?php echo $module; ?>').owlCarousel({
	items: 6,
	autoPlay: 2000000000,
	singleItem: true,
	navigation: true,
	navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
	pagination: true
});
--></script>
<?php }?>

<?php  if($module == 0) {?>
<div id="slideshow" data-anchor="1">	
	<div id="slideshow<?php echo $module; ?>" class="owl-carousel" style="opacity: 1;">
	  <?php  foreach ($banners as $banner) { ?>
	<div class="col-md-12 col-sm-12">
	  <div class="item col-md-7 col-sm-7 col-xs-12 images_slider">
		<?php if ($banner['link']) { ?>
		<a href="<?php echo $banner['link']; ?>"><img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" class="img-responsive" /></a>
		<?php } else { ?>
		<img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" class="img-responsive" />
		<?php } ?>
	  </div>
	  <div class="item col-md-5 col-sm-5 col-xs-12 text_slider">
		<?php 
		$item = explode("|", $banner['title']);
		?><div class="mini_title"><?php echo $item[0]; ?></div>
		<div class="title"><?php echo $item[1]; ?></div>
		<div class="descriction"><?php echo $item[2]; ?></div>
		<div class="tp-caption btn tp-fade">
		<a href="<?php echo $banner['link']; ?>" class="btn-for-slaid" ><?php echo $text_learn_more; ?></a>
			</div>
	  </div>
	</div>
	  <?php } ?>
	</div>
</div>


<script type="text/javascript"><!--
$('#slideshow<?php echo $module; ?>').owlCarousel({
	items: 6,
	autoPlay: 7000,
	singleItem: true,
	navigation: true,
	navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
	pagination: true
});
--></script>
<?php }?>
