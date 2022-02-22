<?php echo $header; ?>
<!--menu-->
<?php if ($categories) {  ?>
<div class="container">
  <nav id="menu" class="navbar">
    <div class="navbar-header"><span id="category" class="visible-xs"><?php if(isset($text_category)){ echo $text_category;} ?></span>
      <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
      <div class="button_left_menu"><i class="fa fa-bars"></i></div>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <?php foreach ($categories as $category) { ?>
        <?php if ($category['children']) { ?>
        <li class="dropdown"><a href="<?php echo $category['href']; ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category['name']; ?></a>
          <div class="dropdown-menu">
            <div class="dropdown-inner">
              <?php foreach (array_chunk($category['children'], ceil(count($category['children']) / $category['column'])) as $children) { ?>
              <ul class="list-unstyled">
                <?php foreach ($children as $child) { ?>
                <li><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a></li>
                <?php } ?>
              </ul>
              <?php } ?>
            </div>
             </div>
        </li>
        <?php } else { ?>
        <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
        <?php } ?>
        <?php } ?>
      </ul>
    </div>
  </nav>
</div>
<?php } ?>

<!--menu-->
<div class="container">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    <?php } ?>
  </ul>
  <div class="row"><?php echo $column_left; ?>
    <?php if ($column_left && $column_right) { ?>
    <?php $class = 'col-sm-6'; ?>
    <?php } elseif ($column_left || $column_right) { ?>
    <?php $class = 'col-sm-9'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    <div id="content" class="<?php echo $class; ?>"><?php   echo $content_top; ?>

	  <?php  if($inform_id == 10 ){ ?>
	  <?php echo $slideshow; ?>
	  <?php }else{ if($inform_id != 11){ ?>
	        <h1><?php echo $heading_title; ?></h1>
      <?php echo $description; ?>
	  <?php }} ?>
	  
	  <div class="wraw_content_schop">
	  <?php   foreach($locations as $location){ ?>
		  <?php  if($location["address"] != 'none'){ ?>
			<div id="<?php echo $location["location_id"];?>" class="content_shop">
			  <div class="region_name"><?php echo trim($location["name"]);?></div>
				<?php $shops = explode('|',$location["address"]); foreach ($shops as $key => $val) { if(empty(trim($val))){ $val = str_replace(array("\r","\n"),"",$val);  $shops[$key] = trim($val);}} if(!is_array($shops)){   array_diff('',$shops);}?>
					<?php foreach($shops as $shop){ ?>
					<?php $shop = trim($shop); ?>
					<?php if(!empty($shop)){  ?>
					<?php $sho = explode(':',$shop);  foreach ($sho as $key => $val) { if(empty(trim($val))){ $val = str_replace(array("\r","\n"),"", $val); $sho[$key] = trim($val);}} if(!is_array($sho)){array_diff('',$sho);} ?>
					<?php if(isset($sho[0])){  ?>
							<div class="shop_wrap"><div class="name_shop"><?php echo trim($sho[0]);?></div>
							<?php if(isset($sho[1])){ trim($sho[1]); }
							if(isset($sho[1])){ ?>
							<?php 	$sh = explode(';',$sho[1]);   foreach ($sh as $key => $val) { if(empty(trim($val))){ $val = str_replace(array("\r","\n"),"",$val); $sh[$key] = trim($val);}} if(!is_array($sh)){array_diff('',$sh);}  ?>
							<?php 		foreach($sh as $s){ ?>
									<div class="adress_shop"><?php echo trim($s);?></div>
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
	  
	  <?php ?>
	  <?php if(isset($events)){echo $events; } ?>
	  <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
	<?php // var_dump($locations); ?>
</div>
<?php echo $footer; ?>