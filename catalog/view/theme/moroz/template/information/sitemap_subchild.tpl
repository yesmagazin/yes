<ul class="catalog__box-list subchild">
    <?php foreach($catchild['children'] as $ctchld) {  ?>
    <li class="catalog__box-point">
        <a class="catalog__box-link" href="<?php echo $ctchld['href']; ?>"><?php echo $ctchld['name']; ?></a>
    </li>
    <?php } ?>
</ul>