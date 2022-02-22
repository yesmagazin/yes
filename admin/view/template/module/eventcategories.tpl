<?php echo $header; ?><?php echo $column_left; ?>
<?php
$langs = array();
foreach ($languages as $language) {
    $langs[$language['language_id']] = $language['name'];
}
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-eventcategories" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
        <?php // var_dump($languages); ?>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-eventcategories" class="form-horizontal">
		<div class="form-group">
<h3>Новый город</h3>
<div class="col-sm-10">
    <div class="col-sm-2">Язык</div>
    <div class="col-sm-6">Название</div>
    <div class="col-sm-2">Порядок</div>
</div>
              <?php foreach ($languages as $language) { ?>
<br/>
<div class="col-sm-10">
    <div class="col-sm-2"><img src="language/<?php echo $language['code']; ?>/<?php echo $language['code']; ?>.png" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?>        </div>
    <div class="col-sm-6"><input type="text" name="name_<?php echo $language['language_id']; ?>" /></div>
    <div class="col-sm-2"><input type="number" name="sortorder_<?php echo $language['language_id']; ?>" value="100" /></div>
</div>
              <?php } ?>
<br/>
<br/>
<br/>
<div class="clearfix"></div>
<?php /*
<p>
    <b>Для редактирования:</b> Справа от города нажать <i>Карандаш</i>, потом отредактировать тут, потом сохранить кнопкой справа вверху
</p>

            <label class="col-sm-2 control-label" for="input-status">Что редактируем </label>
            <div class="col-sm-10">
			<input type="text" name="category" value="<?php if(isset($categoryname)) echo $categoryname; ?>" class="form-control" />
			</div>
		 </div>
<!--          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="eventcategories_status" id="input-status" class="form-control">
                <?php if ($eventcategories_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
-->		
 */ ?>
 
        <!--</form>-->
		
		<div class="table-responsive">
  <table class="table">
		<tr>
		<th>id</th>
		<th>№</th>
		<th>Язык</th>
    <th>
      Город
    </th>
		<th>Порядок</th>
   
		
		<th>Состояние</th>
		</tr>
		<?php if(!empty($lists)){ foreach($lists as $list){ ?>
<!--        <form action="" method="POST">
            <input type="hidden" name="update_id" value="<?php echo $list['id']; ?>" />-->
		<tr>
		<td><?php echo $list['id']; // var_dump($list); ?></td>
		<td><?php echo $list['category_id']?></td>
		<td><?php echo $langs[$list['language_id']]; ?></td>
		<td><input type="text" name="name_<?php echo $list['id']; ?>" value="<?php echo $list['category_name']; ?>" /></td>
        <td><input type="number" name="sortorder_<?php echo $list['id']; ?>" value="<?php echo $list['sortorder']; ?>" />
            <input type="hidden" name='city_id_<?php echo $list['id']; ?>' value="<?php echo $list['id']; ?>" />
        </td>
		
		<td>
<!--            <button type="submit">
                <i class="fa fa-check" style="color: green;"></i>
            </button>
            <a href="index.php?route=module/eventcategories&category_id=<?php echo $list['category_id']; ?>&token=<?php echo $token; ?>&id=<?php echo $list['id']; ?>" class="btn btn-primary">
                <i class="fa fa-pencil"></i>
            </a> -->
            
            <a href="index.php?route=module/eventcategories/delete&category_id=<?php echo $list['category_id']; ?>&token=<?php echo $token; ?>&id=<?php echo $list['id']; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
		</tr>
        <!--</form>-->

        <?php } } ?>
		</table>
            </form>
		</div>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>