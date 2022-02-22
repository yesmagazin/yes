<?php echo $header; ?>

<div class="container categor_page">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $k=>$breadcrumb) { ?>
      <li>
        <?php if($k != (count($breadcrumbs)-1)) { ?>
          <a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php }else{ ?>
          <?php echo $breadcrumb['text']; ?>
        <?php } ?>
      </li>
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
    <div id="content" class="<?php echo $class; ?>" style="min-height: 600px;"><?php echo $content_top; ?>
      <h1><?php echo $heading_title; ?></h1>
      <?php if(false) { ?>
<!--       <div class="row">
        <?php if ($thumb) { ?>
        <div class="col-sm-2"><img src="<?php echo $thumb; ?>" alt="<?php echo $heading_title; ?>" title="<?php echo $heading_title; ?>" class="img-thumbnail" /></div>
        <?php } ?>
        <?php if ($description) { ?>
        <div class="col-sm-10"><?php echo $description; ?></div>
        <?php } ?>
      </div> -->
      <!-- <hr> -->
      <?php } ?>
      <?php if ($products) { ?>
      <div class="row hidden">
        <div class="col-md-2 col-sm-6 hidden-xs">
          <div class="btn-group btn-group-sm">
            <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="<?php echo $button_list; ?>"><i class="fa fa-th-list"></i></button>
            <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="<?php echo $button_grid; ?>"><i class="fa fa-th"></i></button>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="form-group">
            <a href="<?php echo $compare; ?>" id="compare-total" class="btn btn-link"><?php echo $text_compare; ?></a>
          </div>
        </div>
        <div class="col-md-4 col-xs-6">
          <div class="form-group input-group input-group-sm">
            <label class="input-group-addon" for="input-sort"><?php echo $text_sort; ?></label>
            <select id="input-sort" class="form-control" onchange="location = this.value;">
              <?php foreach ($sorts as $sorts) { ?>
              <?php if ($sorts['value'] == $sort . '-' . $order) { ?>
              <option value="<?php echo $sorts['href']; ?>" selected="selected"><?php echo $sorts['text']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $sorts['href']; ?>"><?php echo $sorts['text']; ?></option>
              <?php } ?>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="col-md-3 col-xs-6">
          <div class="form-group input-group input-group-sm">
            <label class="input-group-addon" for="input-limit"><?php echo $text_limit; ?></label>
            <select id="input-limit" class="form-control" onchange="location = this.value;">
              <?php foreach ($limits as $limits) { ?>
              <?php if ($limits['value'] == $limit) { ?>
              <option value="<?php echo $limits['href']; ?>" selected="selected"><?php echo $limits['text']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $limits['href']; ?>"><?php echo $limits['text']; ?></option>
              <?php } ?>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <?php foreach ($products as $product) { ?>
        <div class="product-layout product-list col-xs-12">
          <div class="product-thumb">
            <div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" /></a></div>
            <div class="descript">
              <div class="main_attr"><?php if(isset($product['attribute_groups'][0])){echo $product['attribute_groups'][0]['name'];} ?></div>
              <div class="caption">
                <h4><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></h4>
                <?php if ($product['rating']) { ?>
                <div class="rating">
                  <?php for ($i = 1; $i <= 5; $i++) { ?>
                  <?php if ($product['rating'] < $i) { ?>
                  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                  <?php } else { ?>
                  <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                  <?php } ?>
                  <?php } ?>
                </div>
                <?php } ?>
              </div>
			 <div class="attribut">
				<span class="name_attr"><?php if ($product['sku']) { ?> </span>
				<span class="val_attr"><?php  echo $text_model.''. $product['sku']; ?>      <?php } ?></span>
			</div>
			<div class="size">
        <?php
          if(isset($product['attribute_groups'][0])){
          foreach($product['attribute_groups'][0]['attribute'] as $attribute){
            //print $attribute['name'];
            if($attribute['name'] == 'Размер:'){
              $attr_name = '<span class="name_attr">'.$attribute['name'].'</span>';
              $attr_val = '<span class="val_attr">'.$attribute['text'].'</span>';
              echo $attr_name, $attr_val;
              } 
          }
          }
        ?>
      </div>			
			<div class="button_shop">
            <a href="/index.php?route=information/information&information_id=11">ГДЕ КУПИТЬ?</a>
          </div>
          <?php if(false) { ?>
             <!-- <div class="button-group">

                <button type="button" onclick="cart.add('<?php /*echo $product['product_id']; ?>', '<?php echo $product['minimum']; ?>');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md"><?php echo $button_cart; ?></span></button>
                <button type="button" data-toggle="tooltip" title="<?php echo $button_wishlist; ?>" onclick="wishlist.add('<?php echo $product['product_id']; ?>');"><i class="fa fa-heart"></i></button>
                <button type="button" data-toggle="tooltip" title="<?php echo $button_compare; ?>" onclick="compare.add('<?php echo $product['product_id']; */?>');"><i class="fa fa-exchange"></i></button>
              </div> -->
              <?php } ?>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="row pagination_wrap">
        <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
        <div class="col-sm-6 text-right"><?php echo $results; ?></div>
      </div>
      <?php } ?>
      <?php if (!$products) { ?>
      <p><?php echo $text_empty; ?></p>
      <?php } ?>
     <?php echo $content_bottom; ?></div>
    	<?php echo $column_right; ?></div>
	

</div>
<?php echo $footer; ?>
