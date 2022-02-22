<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbr0ysJ3IvHiPJ3fPX5ZfnKyEJSPDtxpw" type="text/javascript"></script>
   <!-- AIzaSyBIvy5GA_NXbZ1HqYlGbIjrNKnM8vzBT20 -->


<script src="catalog/view/javascript/jquery.tekmap.0.7.js"></script>

<div class="container-fluid">
<div class="map-page map-page-w">
	<div id="mapp" class="map-title anchor" data-anchor="4">
		<a id="whear" data-ps2id-target="" class="_mPS2id-t mPS2id-target mPS2id-target-first mPS2id-target-last"></a>    <h1>
				<?php echo $WHERE_CAN_I_BUY; ?>
			</h1>
			
	</div>
	  <div class="row">
			<div class="col-sm-6">
				<div class="map-caption ">
							<?php  echo $select_your_nearest_store;  ?>
							<div class="arrow-map ">
						</div>
				</div>
					<div class="town-select">
						<select class="selectpicker" data-live-search="true">
							<option> <?php echo $not_chosen; ?> </option>
							<?php if(!empty($categories)){ foreach($categories as $k => $category){ ?>
							<option data-content="<span data-id='town<?php echo $category['category_id']; ?>'><?php echo $category['category_name']; ?></span>"><?php echo $category['category_name']; ?></option>

							<?php } } ?>
						</select>
					</div>
			</div>
			<div class="col-sm-6">
							<div class="map-caption ">
							<?php  echo $buy_online_title;  ?>
							<div class="arrow-map ">
						</div>
				</div>
			<div  class="map-page map-page-w">
				<div class="map-caption " style="height: 110px;">
						<button class="block1_url1  open_modal1">
						<?php echo $buy_online; ?>
						</button>
				</div>
			</div>
			</div>
		 </div>
</div>
  <div class="row">
      <style>
          .warap_main_page #content1{
              padding: 0 15px;
          }
          @media (max-width: 420px) {
              .warap_main_page #content1{
                  padding: 0 7px;
              }
          }
      </style>
    <div id="content1" class="col-sm-12 page-map-content">


		<div id="map" ></div>
        <div class="table-responsive table-container">
            <table style="display: none" class="table table-bordered">
                <thead>
                <tr>
                    <td>Название</td>
                    <td>Адрес</td>
                    <td>Телефон</td>
                    <td>Ссылки</td>
                </tr>
                </thead>
                <tbody>
                <?php /*var_dump($events);*/ if(!empty($events)){ foreach($events as $i => $event){ ?>
                <tr style="display: none" class="town<?php echo $event['category_id']; ?> table-td"
				data-title="<?php echo $event['title']; ?>"
				data-address="<?php echo $event['address']; ?>"
				data-information="<?php echo $event['information']; ?>"
				data-latitude="<?php echo $event['latitude']; ?>"
				data-longitude="<?php echo $event['longitude']; ?>"
				>
                    <td style="cursor: pointer;"><a><?php echo $event['title']; ?></a></td>
                    <td><?php echo $event['information']; ?></td>
                    <td><?php echo $event['start_time']; ?></td>
                    <td><?php echo $event['end_time']; ?></td>
                </tr>
                <?php } } ?>
                </tbody>
            </table>
        </div>
	<!--	<div class="block-content">
 <img alt="" src="/image/catalog/slide_maps/1300e-1900x1300.jpg" style=" margin: 0 auto; width: 50%; height: 50%;">
</div> -->


        <script>
            $(document).ready(function(){
			$("#map").TekMap();
			var marker = [] ;
			
							$('.table-td').each(function(i,v) {		
							//console.log(v.dataset);				
									marker.push( {
										lat:v.dataset.latitude,
										lng:v.dataset.longitude, 
										draggable:false,
										infowindow: v.dataset.title+'<br>'+ v.dataset.information,
										icon:{url:"image/logo_maps.png",size:[75, 74],origin:[10,48]},
										shadow:{url:"image/shadow50.png",size:[75, 74],origin:[10,48]}
									});
								
								
							});
						
						$('#map').css({'height': '520px', 'width': '100%'});
							$("#map").TekMap({
									lat : 48.379433,
									lng : 31.1655799000, 
									mapoptions : {
										zoom: 6,
										mapTypeId: google.maps.MapTypeId.ROADMAP,
										scrollwheel: false
									},
									markers : marker
								});
			
			
			
                $("body").on('click','.dropdown-menu.inner li', function () {
                    var a = $('.bootstrap-select .filter-option > span').attr('data-id');
                    $('.table-bordered').css('display', 'table');
                    $('.table-td').css('display', 'none');
					$('.table-td').removeClass('maps');
                    $('.'+a).css('display', 'table-row');
					$('.'+a).addClass('maps');
					//console.log($('.'+a));
					if($('.maps') && $('.'+a).length > 0){	
						var marker = [] ;
						$("#map").TekMap();
					//	console.log($('.'+a).length);
							$('.maps').each(function(i,v) {
							//console.log(v.dataset);
								
									marker.push( {
										lat:v.dataset.latitude,
										lng:v.dataset.longitude, 
										draggable:false,
										infowindow:v.dataset.title+'<br>'+ v.dataset.information,
										icon:{url:"image/logo_maps.png",size:[75, 74],origin:[10,48]},
										shadow:{url:"image/shadow50.png",size:[75, 74],origin:[10,48]}
									});
								
								
							});
						$('#map').css({'height': '600px', 'width': '100%'});
							$("#map").TekMap({
									lat:$('.maps')[0].dataset.latitude,
									lng:$('.maps')[0].dataset.longitude, 
									markers : marker
								});
								
							$("td").on('click',  function (e) {
								e.preventDefault();
								var parent_td = $(this).parent()[0];
								//console.log(parent_td.dataset);
								
								$("#map").TekMap({
									lat:parent_td.dataset.latitude,
									lng:parent_td.dataset.longitude,
									mapoptions : {
										zoom: 18,
										mapTypeId: google.maps.MapTypeId.ROADMAP,
										scrollwheel: false
									},
									markers : marker
								});
							});
						
					}else{
						$("#map").TekMap();
						var marker = [] ;
							$('.table-td').each(function(i,v) {						
									marker.push( {
										lat:v.dataset.latitude,
										lng:v.dataset.longitude, 
										draggable:false,
										infowindow:v.dataset.title+'<br>'+ v.dataset.information,
										icon:{url:"image/logo_maps.png",size:[75, 74],origin:[10,48]},
										shadow:{url:"image/shadow50.png",size:[75, 74],origin:[10,48]}
									});
								
								
							});
						
						$('#map').css({'height': '520px', 'width': '100%'});
							$("#map").TekMap({
									lat : 48.379433,
									lng : 31.1655799000, 
									mapoptions : {
										zoom: 6,
										mapTypeId: google.maps.MapTypeId.ROADMAP,
										scrollwheel: false
									},
									markers : marker
								});
					}
                    
                                        var scrollTop = $('#map + .table-responsive').offset().top;
                    var body = $("html, body");
                    body.stop().animate({scrollTop:scrollTop}, 500, 'swing', function() {});
                    
                    
                });
				
				
            });

        </script>
		<script>
/*	$(document).ready(function(){
		$("#map").TekMap({
			lat:41.99624282178582,
			lng:2.933349609375, 
			markers : [{
				lat:41.96193934475723,
				lng:3.035423755645752, 
				draggable:false,
				infowindow:"Tekmap demo by Comunicatek!",
				icon:{url:"image/logo_maps.png",size:[75, 74],origin:[10,48]},
				shadow:{url:"image/shadow50.png",size:[75, 74],origin:[10,48]}
			}]
		});
		
	});*/
</script>


		
		
		
		
		
		
		
		
		
		
		
		
		
		
						<script>
$(document).ready(function(){
    $(".open_modal1").click(function(){
        $("#modal1").modal();
    });

});
</script>
    </div>

	</div>




			