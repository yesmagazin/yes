<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script></script>
    <script src="http://rawgit.com/Logicify/jquery-locationpicker-plugin/master/dist/locationpicker.jquery.js"></script>
<div class="row">
    <div class="col-sm-4">


	<div class="list-group">
  <a href="#" class="list-group-item disabled">
   <strong> Categories & Events </strong>
  </a>
  <?php if(!empty($categories)){ foreach($categories as $category){ ?>
  <a  <?php if(isset($_GET['category_id'])){ if($_GET['category_id']==$category['category_id']) echo 'class="list-group-item active"'; } ?> href="index.php?route=common/events&category_id=<?php echo $category['category_id']; ?>" class="list-group-item"><?php echo $category['category_name']; ?></a>
  <?php } } ?>
    </div>

	</div>
	<div class="col-sm-8">
	<?php if(!empty($events)){ foreach($events as $event){ ?>
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
		<a class="texting" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsed<?php echo $event['event_id']; ?>" aria-expanded="false" aria-controls="collapsed<?php echo $event['event_id']; ?>">
  <div class="panel panel-default">
    <div class="panel-heading" style="height: 63px;" role="tab" id="heading<?php echo $event['event_id']; ?>">
	<div class="col-sm-1">
	<div class="div-month"><?php echo date("F", strtotime($event['start_date'])); ?></div>
	<div class="div-date"><?php echo date("d", strtotime($event['start_date'])); ?></div>
	</div>
	<div class="col-sm-8">
      <h5 class="panel-title">
        
          <?php echo $event['title']; ?>
	<h6><i class="fa fa-map-marker" ></i> <?php echo $event['address']; ?></h6>
        

      </h5>
	  </div>

	  <div class="col-sm-3"><p><i class="fa fa-calendar"></i> <?php echo date("D, j F Y", strtotime($event['start_date'])); ?></p><p><i class="fa fa-clock-o"></i> <?php echo substr($event['start_time'],0,5); ?> - <?php echo substr($event['end_time'],0,5); ?></p>
	</div>
	</a>
    </div>
	
    <div data-located="<?php echo $event['address']; ?>" data-lat="<?php echo $event['latitude']; ?>" data-lon="<?php echo $event['longitude']; ?>" data-id="<?php echo $event['event_id']; ?>" id="collapsed<?php echo $event['event_id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $event['event_id']; ?>">
      <div class="panel-body">
	  <div class="col-sm-8">
	 <!--  <div  id="us3<?php echo $event['event_id']; ?>" <?php if($event['information']!=""){ ?>style="width: 300px; height: 300px;"<?php }else{ ?> style="width: 680px; height: 300px;" <?php } ?>><img src="https://media.giphy.com/media/npCmk0VCFHyUM/giphy.gif"/></div>--->
	 <div id="gmap_canvas<?php echo $event['event_id']; ?>" <?php if($event['information']!=""){ ?>style="width: 300px; height: 300px;"<?php }else{ ?> style="width: 680px; height: 300px;" <?php } ?>></div>

	  </div>
	  <?php if($event['information']!=""){ ?>
	  <div class="col-sm-4">
	  <h3>Information</h3>
        <?php echo $event['information']; ?>
		</div>
		<?php } ?>
      </div>
    </div>
  </div>


</div>
	<?php } }else{
	echo "No Event Found";
	} ?>


	</div>

</div>
<script type='text/javascript'>


$(".panel-collapse").on('shown.bs.collapse', function () {
    console.log("1");

id=$(this).attr("data-id");
located=$(this).attr("data-located");
lat=$(this).attr("data-lat");
lon=$(this).attr("data-lon");

$("#heading"+id).css('background-color','rgb(243, 205, 77)');
/*
 $('#us3'+id).locationpicker({
                location: {latitude: lat, longitude: lon},
                radius: 50,

            });*/
			init_map(id,lat,lon,located);
			
});
$('.panel-collapse').on('hidden.bs.collapse', function () {
        console.log("2");
  id=$(this).attr("data-id");
  $("#heading"+id).css('background-color','#f5f5f5');
});
function init_map(id,lat,lon,located){var myOptions = {zoom:7,center:new google.maps.LatLng(lat,lon),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"+id), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(lat,lon)});infowindow = new google.maps.InfoWindow({content:""+located+"" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
console.log("4");
			</script>
<style>
.texting{
color:#000 !important;
}
.tab-style{
padding:7px;
background-color: rgb(244, 244, 243);
border:1px solid#ccc;
width:100%;
height:60px;;
}
.map-section{
border:1px solid#ccc;
height:auto;
}
.div-month{
background-color:orange;width:50px;height:20px;padding-left:10px;font-weight:bold; color:#FFF; border-top-left-radius: 5px;border-top-right-radius: 5px;
}
.div-date{
background-color:white;width:50px;height:26px;padding-left:14px; font-weight:bold; font-size:16px;
}
</style>

