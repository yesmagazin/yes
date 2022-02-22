<?php echo $header; ?>
<div class="container">
    <ul class="breadcrumb">
		<?php $last_crumb = array_pop($breadcrumbs); ?>
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
            <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
		<?php } ?>
        <li><?php echo $last_crumb['text']; ?></li>
    </ul>
    <div class="row">
        <div id="content" class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <div class="info_block">
                        <div class="info_block_title">
                            <h1><?php echo $text_where_buy; ?></h1>
                        </div>
                        <div class="info_map">
                            <div class="info_map_left">
	                            <?php echo $text_select_store; ?>:
                                <div class="select-wrapper">
                                        <select id="map-country" class="form-control">
                                            <option value="0"> <?php echo $text_not_chosen; ?> </option>
	                                        <?php if(!empty($cities)){ ?>
		                                        <?php foreach($cities as $k => $city){ ?>
                                                    <option value="<?php echo $city['city_id']; ?>"><?php echo $city['name']; ?></option>
		                                        <?php } ?>
	                                        <?php } ?>
                                        </select>
                                    <div class="select-arrow"></div>
                                </div>
                            </div>
                            <div class="info_map_right">
	                            <?php echo $text_buy_online; ?>:
                                <div class="info_map_btn" data-fancybox="" data-animation-duration="700" data-src="#shops_modal"><?php echo $button_buy_online; ?></div>
                            </div>
                        </div>
                        <div id="map"></div>
                        <div id="map_pist" class="map_table table-responsive table-container">
                            <table style="display: none" class="table table-bordered">
                                <thead>
                                <tr>
                                    <td><?php echo $text_store; ?></td>
                                    <td><?php echo $text_address; ?></td>
                                    <td><?php echo $text_telephone; ?></td>
                                    <td><?php echo $text_link; ?></td>
                                </tr>
                                </thead>
                                <tbody>
			                    <?php if(!empty($addresses)){ foreach($addresses as $i => $address){ ?>
                                    <tr data-city="<?php echo $address['city_id'];?>"
                                        data-title="<?php echo $address['store'];?>"
                                        data-address="<?php echo $address['address'];?>"
                                        data-information="<?php echo $address['information'];?>"
                                        data-latitude="<?php echo $address['latitude'];?>"
                                        data-longitude="<?php echo $address['longitude'];?>" >

                                        <td><?php echo $address['store']; ?></td>
                                        <td><?php echo $address['information']; ?></td>
                                        <td><?php echo $address['telephone']; ?></td>
                                        <td class="url"><?php echo $address['url']; ?></td>
                                    </tr>
			                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIvy5GA_NXbZ1HqYlGbIjrNKnM8vzBT20&language=<?php echo $localisation_tag; ?>" type="text/javascript"></script>

<script src="catalog/view/javascript/jquery/jquery.tekmap.0.7.js"></script>

<script>
    $(document).ready(function(){
        
        var map = $("#map"),
            map_list = $('#map_pist .table'),
            map_item = $('#map_pist .table tbody tr');

        map.TekMap();

        // Генерация маркеров
        var marker = [] ;

        map_item.each(function(i,v) {
            marker.push( {
                lat:v.dataset.latitude,
                lng:v.dataset.longitude,
                draggable:false,
                infowindow: v.dataset.title+'<br>'+ v.dataset.information,
                icon:{url:"image/logo_maps.png",size:[75, 74],origin:[10,48]}
            });

        });

        map.css({'height': '520px', 'width': '100%'});

        // Генерация карты
        map.TekMap({
            lat : 48.379433,
            lng : 31.1655799000,
            mapoptions : {
                zoom: 6,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false
            },
            markers : marker
        });

        // При выборе города
        $('#map-country').on('change', function() {
            
            var id = $(this).val();
            
            if(id != 0){

                var marker = [] ;

                // Скрываем ненужные значения
                map_list.fadeOut(function() {
                    
                    map_item.each(function (i, v) {
                        
                        if (v.dataset.city != id) {
                            
                            $(this).hide();
                            
                        } else {

                            // Собираем маркеры города
                            marker.push( {
                                lat:v.dataset.latitude,
                                lng:v.dataset.longitude,
                                draggable:false,
                                infowindow: v.dataset.title+'<br>'+ v.dataset.information,
                                icon:{url:"image/logo_maps.png",size:[75, 74],origin:[10,48]}
                            });
                            
                            $(this).show();
                        }

                    });
                    
                });
                
                // Открываем список
                map_list.fadeIn();

                setTimeout(function () {
                    map.TekMap({
                        lat: map_list.find("tbody tr:visible").first().data("latitude"),
                        lng: map_list.find("tbody tr:visible").first().data("longitude"),
                        markers : marker
                    });

                    // Красим таблицу
                    map_list.find("tbody tr:visible:odd").css('background', '#fafafa');
                    map_list.find("tbody tr:visible:even").css('background', '#ffffff');
                    
                }, 500);

                var scrollTop = map.offset().top;

                $("html, body").stop().animate({scrollTop:scrollTop}, 500, 'swing', function() {});
                
            }else{

                map.TekMap();

                // Генерация маркеров
                var marker = [] ;

                map_item.each(function(i,v) {
                    marker.push( {
                        lat:v.dataset.latitude,
                        lng:v.dataset.longitude,
                        draggable:false,
                        infowindow: v.dataset.title+'<br>'+ v.dataset.information,
                        icon:{url:"image/logo_maps.png",size:[75, 74],origin:[10,48]}
                    });

                });

                map.css({'height': '520px', 'width': '100%'});

                // Генерация карты
                map.TekMap({
                    lat : 48.379433,
                    lng : 31.1655799000,
                    mapoptions : {
                        zoom: 6,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        scrollwheel: false
                    },
                    markers : marker
                });
                
                map_list.fadeOut();
                
            }
     
        });

        map_item.on('click',  function (e) {
            e.preventDefault();
            
            map.TekMap({
                lat: $(this).data("latitude"),
                lng: $(this).data("longitude"),
                mapoptions : {
                    zoom: 18,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false
                },
                markers : marker
            });
        });
        
    });
</script>

<!-- SHOPS MODAL -->
<div style="display: none;" id="shops_modal" class="animated-modal">
    <div class="modal_header"><?php echo $text_buy_online; ?></div>
    <div class="shops_modal">
	<?php foreach ($online_points as $online_point) { ?>
        <a rel="nofollow" href="<?php echo $online_point['link']; ?>" target="_blank" class="shops_modal_item">
            <div class="name"><?php echo $online_point['name']; ?></div>
            <div><img src="<?php echo $online_point['image']; ?>" /></div>
            <div class="city"><?php echo $online_point['city']; ?></div>
        </a>
	<?php } ?>
    </div>
</div>
<!-- //SHOPS MODAL -->

<?php echo $footer; ?>



