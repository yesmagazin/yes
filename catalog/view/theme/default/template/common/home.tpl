<?php echo $header; ?>
<script>
    $(document).ready(function(){
       $.getJSON("http://ip-api.com/json/?callback=?", function(data) {
            var country = data.country; // страна пользователя
           if(!sessionStorage.getItem('modal') && country == "Russia"){
               $('.my-iziModal').iziModal({
                   title: 'Выберите вашу страну',
                   subtitle:'для более удобного выбора товаров',
                   autoOpen: 100,
                   headerColor: '#ff8400',
                   onOpening: function(){
                       $('.btn-country_rus').addClass('fadeInRight');
                       $('.btn-country_ua').addClass('fadeInLeft');

                   },
                   onClosed: function(){
                       sessionStorage.setItem('modal', 'ok')
                   },
                   radius: 0
               });
               $('.btn-country_ua').on('click', function () {
                   $('.my-iziModal').iziModal('close')
               })
           }
        });
    });
</script>
<div  class="content-wrap">
	<div class="wrap_main">
	  <div class="slider_wrapper">
		<div class="button_left_menu hid"><i class="fa fa-bars"></i></div>
		<?php echo $column_left; ?>
		<?php if ($column_left && $column_right) { ?>
		<?php $class = 'col-sm-6'; ?>
		<?php } elseif ($column_left || $column_right) { ?>
		<?php $class = 'col-sm-9'; ?>
		<?php } else { ?>
		<?php $class = 'col-sm-10'; ?>
		<?php } ?>
		<div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?><?php echo $content_bottom; ?></div>
		<?php echo $column_right; ?></div>
		<div class="content scroll-block products">
	<div id="yak6" data-anchor="6">
				<div class="zagolov">
					<a href="/index.php?route=product/allproduct"><h1>ВСЕ ТОВАРЫ</h1></a>
					<div id="all-items" class="select-item ">
					<div class="blocks-item ">
					        <?php foreach ($categories as $category) { ?>
							<div class="block-1">
							<?php if ($category['children']) { ?>
							<li class="dropdown">
								<a href="<?php echo $category['href']; ?>" class="dropdown-toggle" >
									<?php echo $category['name']; ?>
								</a>
								<?php if($category['image']){ ?>
									<img src="<?php echo $category['image']; ?>" class="img-responsive">
								<?php } ?>
								<?php foreach (array_chunk($category['children'], ceil(count($category['children']) / $category['column'])) as $children) { ?>
								  <ul class="list-unstyled">
									<?php foreach ($children as $child) { ?>
										<li>
											<a href="<?php echo $child['href']; ?>">
												<?php echo $child['name']; ?>
											</a>
										</li>
									<?php } ?>
								  </ul>
								  <?php } ?>
							</li>
							<?php } else { ?>
							<li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
							<?php } ?>
							</div>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
</div>
<div id="yak3" class="map-page map-page-w">
	<?php  echo $events; ?>
				  <div class="wraw_content_schop">
						  <?php  foreach($locations as $location){ ?>
							  <?php  if($location["address"] != 'none'){ ?>
								<div id="<?php echo $location["location_id"];?>" class="content_shop">
								  <div class="region_name"><?php echo str_replace('`', '"', trim($location["name"]));?></div>
									<?php $shops = explode('|',$location["address"]);/* foreach ($shops as $key => $val) { if(empty(trim($val))){ $val = str_replace(array("\r","\n"),"",$val);  $shops[$key] = trim($val);}} if(!is_array($shops)){   array_diff('',$shops);}*/?>
										<?php foreach($shops as $shop){ ?>
										<?php //$shop = trim($shop); ?>
										<?php if(!empty($shop)){  ?>
										<?php $sho = explode(':',$shop);  /*foreach ($sho as $key => $val) { if(empty(trim($val))){ $val = str_replace(array("\r","\n"),"", $val); $sho[$key] = trim($val);}} if(!is_array($sho)){array_diff('',$sho);} */?>
										<?php if(isset($sho[0])){  ?>
												<div class="shop_wrap"><div class="name_shop"><?php echo str_replace('`', '"', trim($sho[0]));?></div>
												<?php if(isset($sho[1])){ trim($sho[1]); }
												if(isset($sho[1])){ ?>
												<?php 	$sh = explode(';',$sho[1]); /*  foreach ($sh as $key => $val) { if(empty(trim($val))){ $val = str_replace(array("\r","\n"),"",$val); $sh[$key] = trim($val);}} if(!is_array($sh)){array_diff('',$sh);} */ ?>
												<?php 		foreach($sh as $s){ ?>
														<div class="adress_shop"><?php echo  str_replace('`', '"', trim($s));?></div>
														<?php } ?>
													<?php } ?>
													</div>
												<?php }  ?>
											<?php }  ?>
										<?php }?>
								</div>
							<?php }?>
						<?php }?>
					</div>
    </div>
	</div>
</div>
<div id="yak5" data-anchor="4">
<?php echo $footer; ?>
</div>