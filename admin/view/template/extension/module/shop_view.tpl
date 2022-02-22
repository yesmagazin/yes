<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>"
                   class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
				<?php foreach ($breadcrumbs as $breadcrumb) { ?>
                    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
				<?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $text_list; ?></h3>
            </div>
        </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td class="text-center"><?php echo $column_model; ?></td>
                        <td class="text-center"><?php echo $column_price; ?>
                        <td class="text-center"><?php echo $column_url; ?></td>
                    </tr>
                    </thead>
                    <tbody>
					<?php if ($shops) { ?>
						<?php foreach ($shops as $shop) { ?>
                            <tr>
                                <td><?php echo $shop['model']; ?></td>
                                <td><?php echo $shop['price']; ?></td>
                                <td><?php echo $shop['url']; ?></td>
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
    </div>
</div>
<?php echo $footer; ?>
