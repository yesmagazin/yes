<?php if ($shops){ ?>
<div class="partners">
    <div class="row">
        <div class="col-sm-12">
            <div class="partners__title"><?php echo $heading_title; ?></div>
        </div>
    </div>
    <div class="row">
          <?php foreach ($shops as $shop) { ?>
          <div class="col-sm-3">
              <div class="partners__list text-center">
                  <div class="partners__list__image">
                      <img src="<?php echo $shop['image']; ?>" alt="">
                  </div>
                  <div class="partners__list__price">
                      <?php if($shop['status_price']){ ?>
                          <?php echo $shop['price']; ?> грн.
                      <?php } ?>
                  </div>
                  <div class="partners__list__url">
                      <a target="_blank" rel="nofollow" href="<?php echo $shop['url']; ?>"><?php echo $text_button; ?></a>
                  </div>
              </div>
          </div>
          <?php } ?>
    </div>
</div>
<?php } ?>
