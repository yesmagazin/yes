<?php
if ( ! empty( $menu ) ) :
?>
<div id="new-product-menu">
    <button class="menu-back" id="menu-back"><?php echo $back_text?></button>
    <div class="menu-inner">
        <div class="top-level">
            <?php foreach( $menu as $index => $menuItem ) : ?>
                <div class="top-item">
                    <a href="<?=$menuItem['url']?>" class="item-link <?php echo ($index > 0) ?: 'active';?> <?php echo (!empty( $menuItem['children'] )) ?: 'no-children';?>" id="menu-item-<?=$index?>">
                        <?=$menuItem['title']?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="sub-level">
            <?php foreach( $menu as $index => $menuItem ) : ?>
                <?php if ( !empty( $menuItem['children'] ) ) : ?>
                <div class="top-item menu-item-<?=$index?> <?php echo ($index > 0) ?: 'active';?>">
                    <div class="sub-menu">
                        <div class="sub-menu-inner">
                            <?php foreach( $menuItem['children'] as $subMenuItem ) : ?>
                            <div class="sub-item-block">
                                <a href="<?=$subMenuItem['url']?>">
                                    <h3><?=$subMenuItem['title']?></h3>
                                </a>
                                <?php if ( !empty($subMenuItem['children']) ) : ?>
                                <ul>
                                    <?php foreach( $subMenuItem['children'] as $subLevel2 ) : ?>
                                    <li>
                                        <a href="<?=$subLevel2['url']?>">
                                            <?=$subLevel2['title']?>
                                        </a>
                                        <?php if ( !empty($subLevel2['children']) ) : ?>
                                        <ul class="third-level">
                                            <?php foreach( $subLevel2['children'] as $subLevel3 ) : ?>
                                            <li>
                                                <a href="<?=$subLevel3['url']?>">
                                                    <?=$subLevel3['title']?>
                                                </a>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <?php endif; ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>