<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-events" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
   <!-- <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>  AIzaSyBIvy5GA_NXbZ1HqYlGbIjrNKnM8vzBT20 -->
 <!--	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIvy5GA_NXbZ1HqYlGbIjrNKnM8vzBT20&libraries=places" type="text/javascript"></script> -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbr0ysJ3IvHiPJ3fPX5ZfnKyEJSPDtxpw&libraries=places" type="text/javascript"></script>
    <script src="https://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
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
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-events" class="form-horizontal">
		<div class="form-group">
            <label class="col-sm-2 control-label" >Города магазинов</label>
            <div class="col-sm-10">
			<select required="required" multiple name="event_category_id[]"  class="form-control">
			<option value="" disabled>Выберите город</option>
               <?php if(!empty($eventscategory)){ foreach($eventscategory as $category){ ?>
			   
			   <option value="<?php echo $category['category_id']; ?>" <?php if(isset($eventcategoryids)){  foreach($eventcategoryids as $ids){ if($ids['category_id']==$category['category_id']) echo "selected"; break; } } ?>><?php echo $category['category_name']; ?></option>
			   
			   <?php } } ?>
              </select>
			</div>
		 </div>
		<div class="form-group">
            <label class="col-sm-2 control-label"  >Наименование магазина</label>
            <div class="col-sm-10">
			<input type="text" name="title" value="<?php if(isset($eventname)) echo $eventname; ?>" class="form-control" />
			</div>
		 </div>
		 
		 
		 <div class="form-group">
            <label class="col-sm-2 control-label"  >Дата начала работы </label>
            <div class="col-sm-10">
			<div class="input-group date">
			<input type="text" name="start_date" data-date-format="YYYY-MM-DD" value="<?php if(isset($start_date)) echo $start_date; ?>" class="form-control" />
			<span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                    </span></div>
			</div>
		 </div>
		 <div class="form-group">
            <label class="col-sm-2 control-label"  >Дата окончания</label>
            <div class="col-sm-10">
			<div class="input-group date">
			<input type="text" name="end_date" data-date-format="YYYY-MM-DD" value="<?php if(isset($end_date)) echo $end_date; ?>" class="form-control" />
			<span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                    </span></div>
			</div>
		 </div>

		 
		 <div class="form-group">
            <label class="col-sm-2 control-label"  >URL</label>
            <div class="col-sm-10">
			<input type="text" name="start_time" value="<?php if(isset($start_time)) echo $start_time; ?>" class="form-control" />
			</div>
		 </div>
		 <div class="form-group">
            <label class="col-sm-2 control-label"  >Телефон</label>
            <div class="col-sm-10">
			<input type="text" name="end_time" value="<?php if(isset($end_time)) echo $end_time; ?>" class="form-control" />
			</div>
		 </div>
		
	
		 <div class="form-group">
            <label class="col-sm-2 control-label"  >Подробная информация</label>
            <div class="col-sm-10">
			<input type="text" name="information" value="<?php if(isset($information)) echo $information; ?>" class="form-control" />
			</div>
		 </div>
		 
		 <div class="form-group">
                        <label class="col-sm-2 control-label">Место нахождения:</label>

                        <div class="col-sm-10">
                            <input type="text" value="" name="address" class="form-control" id="us3-address" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Радиус:</label>

                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="us3-radius" />
                        </div>
                    </div>
					<div class="form-group">
					<div class="col-sm-10">
                    <div class="col-sm-10 pull-right" id="us3" style="width: 550px; height: 400px;"></div>
					</div>
					</div>
                    <div class="clearfix">&nbsp;</div>
					<div class="form-group">
					<div class="col-sm-10">
                    <div class="m-t-small">
                        <label class="p-r-small col-sm-2 control-label">широта:</label>

                        <div class="col-sm-2">
                            <input type="text" name="latitude" class="form-control" style="width: 110px" id="us3-lat" />
                        </div>
                        <label class="p-r-small col-sm-2 control-label">долгота:</label>

                        <div class="col-sm-2">
                            <input type="text" name="longitude" class="form-control" style="width: 110px" id="us3-lon" />
                        </div>
                    </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
		 
          <div class="form-group" >
            <label class="col-sm-2 control-label"  ><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="events_status" id="input-status" class="form-control">
                <?php if ($events_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
                        <div class="form-group">
                <label class="col-sm-2 control-label" for="input-sort-order">Сортировка</label>
                <div class="col-sm-10">
                  <input type="text" name="sort_order" value="<?php if(isset($sort_order)) echo $sort_order; ?>" placeholder="Сортировка" id="input-sort-order" class="form-control" />
                </div>
              </div>
		  
        </form>
		
		<div class="table-responsive">
  <table class="table">
		<tr>
		<th>
		  №
		</th>
		<th>
		  Магазин
		</th>
		<th>
		  Начало
		</th>
		<th>
		  Окончание
		</th>
		<!--<th>
		  Start Time
		</th>
		<th>
		  End Time
		</th>-->
		<th>
		  Адресс
		</th>
		<th>
		 Подробная информация
		</th>
   
		
		<th>Actions</th>
		</tr>
		<?php if(!empty($lists)){ foreach($lists as $list){ ?>
		<tr>
		<td><?php echo $list['event_id'];?></td>
		<td><?php echo $list['title'];?></td>
		<td><?php echo $list['start_date'];?></td>
		<td><?php echo $list['end_date'];?></td>
		<!--<td><php echo $list['start_time'];?></td>
		<td><php echo $list['end_time'];?></td>-->
		<td><?php echo $list['address'];?></td>
		<td><?php echo $list['information'];?></td>
		
		<td><a href="index.php?route=module/events&event_id=<?php echo $list['event_id']; ?>&token=<?php echo $token; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a> <a href="index.php?route=module/events/delete&event_id=<?php echo $list['event_id']; ?>&token=<?php echo $token; ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
		</tr>

        <?php } } ?>
		</table>
		</div>
      </div>
	  <script type="text/javascript"><!--
$('.date').datetimepicker({
	pickTime: false
});

$('.time').datetimepicker({
	pickDate: false
});
<?php if(isset($_GET['event_id'])){
?>
$('#us3').locationpicker({
                location: {latitude: <?php echo ($latitude) ? $latitude : 0; ?>, longitude: <?php echo ($longitude) ? $longitude : 0; ?>},
                radius: 50,
                inputBinding: {
                    latitudeInput: $('#us3-lat'),
                    longitudeInput: $('#us3-lon'),
                    radiusInput: $('#us3-radius'),
                    locationNameInput: $('#us3-address')
                },
                enableAutocomplete: true,
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                   // alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
				    
                }
            });
			
<?php
}else{ ?>
$('#us3').locationpicker({
                location: {latitude: 48.379433, longitude: 31.16557990000},
                radius: 50,
                inputBinding: {
                    latitudeInput: $('#us3-lat'),
                    longitudeInput: $('#us3-lon'),
                    radiusInput: $('#us3-radius'),
                    locationNameInput: $('#us3-address')
                },
                enableAutocomplete: true,
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                   // alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
				   
                }
            });
<?php } ?>
//--></script>
    </div>
  </div>
</div>
<?php echo $footer; ?>