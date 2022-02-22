<?php echo $header; ?><?php echo $column_left; ?>
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
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-eventcategories" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">Город </label>
                        <div class="col-sm-10">
                            <input type="text" name="city_name" value="<?php if(isset($city_name)) echo $city_name; ?>" class="form-control" />
                        </div>
                        <label class="col-sm-2 control-label" for="input-status">Почта Адрес </label>
                        <div class="col-sm-10">
                            <input type="text" name="contact_ml" value="<?php if(isset($contact_ml)) echo $contact_ml; ?>" class="form-control"  placeholder="E-Mail" />
                        </div>
                        <label class="col-sm-2 control-label" for="input-status">Номер телефона </label>
                        <div class="col-sm-10">
                            <input id="phone" type="text" name="contact_mb" value="<?php if(isset($contact_mb)) echo $contact_mb; ?>" class="form-control" placeholder="+38 (___) ___-____" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
                        <div class="col-sm-10">
                            <select name="changing_contacts_status" id="input-status" class="form-control">
                                <?php if ($changing_contacts_status) { ?>
                                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                <option value="0"><?php echo $text_disabled; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_enabled; ?></option>
                                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                </form>

                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>№</th>
                            <th>
                                Наминование магазина
                            </th>
                            <th>
                                Почта Адрес
                            </th>
                            <th>
                                Номер телефона
                            </th>
                            <th>Состояние</th>
                        </tr>
                        <?php if(!empty($lists)){ foreach($lists as $list){ ?>
                        <tr>
                            <td><?php echo $list['city_id']?></td>
                            <td><?php echo $list['city_name']?></td>
                            <td><?php echo $list['contact_ml']?></td>
                            <td><?php echo $list['contact_mb']?></td>

                            <td><a href="index.php?route=extension/module/changing_contacts&city_id=<?php echo $list['city_id']; ?>&token=<?php echo $token; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a> <a href="index.php?route=extension/module/changing_contacts/delete&city_id=<?php echo $list['city_id']; ?>&token=<?php echo $token; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                        </tr>

                        <?php } } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $footer; ?>