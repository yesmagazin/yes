<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo $add; ?>" data-toggle="tooltip" title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger" onclick="confirm('<?php echo $text_confirm; ?>') ? $('#form-product').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3>
      </div>
    </div>
        <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form-product">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                  <td class="text-center"><?php echo $column_image; ?></td>
                  <td class="text-left"><?php echo $column_name; ?>
                  <td class="text-center"><?php echo $column_phone; ?></td>
                  <td class="text-center"><?php echo $column_contact; ?></td>
                  <td class="text-left"><?php echo $entry_sort; ?></td>
                  <td class="text-left"><?php echo $column_status; ?></td>
                  <td class="text-center" style="width:150px"><?php echo $column_action; ?></td>
                </tr>
              </thead>
              <tbody>
                <?php if ($shops) { ?>
                <?php foreach ($shops as $shop) { ?>
                        <tr>
                            <td class="text-center"><?php if (in_array($shop['shop_id'], $selected)) { ?>
                                    <input type="checkbox" name="selected[]" value="<?php echo $shop['shop_id']; ?>" checked="checked" />
                                <?php } else { ?>
                                    <input type="checkbox" name="selected[]" value="<?php echo $shop['shop_id']; ?>" />
                                <?php } ?>
                            </td>
                            <td class="text-center"><?php if ($shop['image']) { ?>
                                    <img src="<?php echo $shop['image']; ?>" alt="<?php echo $shop['name']; ?>" class="img-thumbnail" />
		                        <?php } else { ?>
                                    <span class="img-thumbnail list"><i class="fa fa-camera fa-2x"></i></span>
		                        <?php } ?>
                            </td>
                            <td><?php echo $shop['name']; ?></td>
                            <td><?php echo $shop['phone']; ?></td>
                            <td><?php echo $shop['contact']; ?></td>
                            <td><?php echo $shop['sort']; ?></td>
                            <td><?php echo $shop['status']; ?></td>
                            <td>
                                <a href="<?php echo $shop['view']; ?>" data-toggle="tooltip" title="" class="btn btn-default"><i class="fa fa-list-alt"></i></a>
                                <a href="<?php echo $shop['update']; ?>" data-toggle="tooltip" title="" class="btn btn-default"><i class="fa fa-refresh"></i></a>
                                <a href="<?php echo $shop['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                <?php } ?>
                <?php } else { ?>
                <tr>
                  <td class="text-center" colspan="8"><?php echo $text_no_results; ?></td>
                </tr>
                <?php } ?>
              </tbody>
          </table>
        </div>
      </form>
   </div>
</div>
<?php echo $footer; ?>
