<?php echo $header;?>
<div class="head">
    <div class="head__preview" style="background-image: url(catalog/view/theme/moroz/stylesheet/img/bg-head-1.jpg);"></div>
    <div class="head__center center">
        <div class="head__wrap">
            <div class="head__stage stage">discounts</div>
            <ul class="head__breadcrumbs breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
                <li class="breadcrumbs__item" itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                    <a class="breadcrumbs__link" href="/" itemprop="item">
                        <meta itemprop="position" content="1">
                        <span itemprop="name"><?php echo $breadcrumbs[0]['text']; ?></span>
                    </a>
                </li>
                <li class="breadcrumbs__item"><?php echo $title; ?></li>
            </ul>
            <h1 class="head__title title" style="max-width:650px"><?php echo $meta_h1; ?></h1>
        </div>
    </div>
</div>
<div id="promoact" class="center">
    <div class="table-filter">
        <div class="city">
            <select id="city-filter">
                <option value="">Все города</option>
            </select>
        </div>
        <div class="shoptype">
            <select id="type-filter">
                <option value="offline" selected>Магазины</option>
                <option value="online">Онлайн магазины</option>
            </select>
        </div>
        <div class="search">
            <input type="text" name="shopsearch" placeholder="Найти магазин" />
        </div>
    </div>
    <?php echo $description; ?>
</div>
<script>
    var cities = [];
    var hash = window.location.hash;

    if (typeof hash === undefined || hash == '#offline' || hash == ''){
        $('#promoact .offline').show();
        $('#city-filter ').show();
        $('#promoact .online').hide();
        $("#type-filter option[value='offline']").prop('selected', true);
    }
    if (hash == '#online') {
        $('#promoact .offline').hide();
        $('.city').hide();
        $('#promoact .online').show();
        $("#type-filter option[value='online']").prop('selected', true);
    }

    $('#promoact .offline table tbody tr').each(function(){
        var city = $(this).find('td:nth-child(2)').text();
        if($.inArray( city, cities ) == -1 && city != '')
            cities.push(city);
    })
    cities = $.unique(cities);
    cities.sort();
    if(cities.length > 0) {
        $.each(cities, function (k,city) {
            $('#city-filter').append('<option value="' + city + '">' + city + '</option>');
        })
    }
    $(".search input[name=shopsearch]").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#promoact .offline table tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#city-filter").on("change", function() {
        var value = $(this).find('option:selected').val().toLowerCase();
        $("#promoact .offline table tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    // $("#type-filter").on("change", function() {
    //     var value = $(this).find('option:selected').val().toLowerCase();
    //     $('#promoact table tbody tr').each(function() {
    //         if (value == 'real'){
    //             if($(this).data('store') == 1) {
    //                 $(this).show();
    //             } else {
    //                 $(this).hide();
    //             }
    //         }
    //         if (value == 'online') {
    //             if($(this).data('online') == 1) {
    //                 $(this).show();
    //             } else {
    //                 $(this).hide();
    //             }
    //         }
    //     })
    // });

    var showCity = $("#city-filter").find('option:selected').val().toLowerCase();
    $("#promoact .offline table tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(showCity) > -1)
    });

    $("#type-filter").on('change', function(){
        var type = $(this).find('option:selected').val();
        if(type == 'offline'){
            $('#promoact .offline').show();
            $('.city ').show();
            $('#promoact .online').hide();
            window.location.hash = 'offline';
        }else if(type == 'online') {
            $('#promoact .offline').hide();
            $('.city').hide();
            $('#promoact .online').show();
            window.location.hash = 'online';
        }
    })

    /*var typeShop = $("#type-filter").find('option:selected').val().toLowerCase();*/
    // $('#promoact table tbody tr').each(function() {
    //     if (hash == '#real'){
    //         if($(this).data('store') != 1) {
    //             $(this).remove();
    //         }
    //     }
    //     if (hash == '#online') {
    //         if($(this).data('online') != 1) {
    //             $(this).remove();
    //         }
    //     }
    // })
</script>
<?php echo $footer; ?>