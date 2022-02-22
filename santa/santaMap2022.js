var mapStyle = [
    {
        "featureType": "all",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "weight": "2.00"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#9c9c9c"
            }
        ]
    },
    {
        "featureType": "all",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#eeeeee"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#7b7b7b"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#46bcec"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#c8d7d4"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#070707"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    }
];

var mapObjects = [
    {
        position: new google.maps.LatLng(49.8055039, 30.0519462),
        title: 'Біла Церква',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td><p>Сubi</p></td>' +
            '<td><p>вул. Таращанська, 191А ТЦ "Бродвей"</p></td>' +
            '</tr>' +
            '<tr>' +
            '<td><p>Сubi</p></td>' +
            '<td><p>вул. Ярослава Мудрого, 40 ТЦ "Гермес"</p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(51.3439998, 25.8346479),
        title: 'Вараш',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td><p>Kancbaza</p></td>' +
            '<td><p>Майдан Незалежності, 10 ТЦ "Orange Plaza"</p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(50.2648491,28.673178),
        title: 'Житомир',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td><p>Сubi</p></td>' +
            '<td><p>Майдан Згоди,6</p></td>' +
            '</tr>' +
            '<tr>' +
            '<td><p>Сubi</p></td>' +
            '<td><p>вул. Кочерги,3В</p></td>' +
            '</tr>' +
            '<tr>' +
            '<td><p>Сubi</p></td>' +
            '<td><p>пр. Незалежності, 55А</p></td>' +
            '</tr>' +
            '<tr>' +
            '<td><p>Сubi</p></td>' +
            '<td><p>вул. Грушевського, 5 ТЦ "Олді"</p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(47.8399068, 35.1372944),
        title: 'Запоріжжя',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td><p>Натали</p></td>' +
            '<td><p>Пр.Перемоги, 64</p></td>' +
            '</tr>' +
            '<tr>' +
            '<td><p>Канцопт</p></td>' +
            '<td><p>вул. Благовіщенська, 49</p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(48.9117677, 24.6821097),
        title: 'Івано-Франківськ',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td><p>Офіс Центр</p></td>' +
            '<td><p>вул. В’ячеслава Чорновола, 11</p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.1957398, 37.2102862),
        title: 'Ізюм',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td><p>Канцлер</p></td>' +
            '<td><p>вул. Соборна, 13</p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(50.5256172,30.2311362),
        title: 'Ірпінь',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td><p>Єліпс</p></td>' +
            '<td><p>вул. Михайла Ломоносова, 50/2</p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(50.4069593,30.3440442),
        title: 'Софіївська Борщагівка',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Олівець Молодець</td>' +
            '<td>провулок Амосова, 7 (ЖК Софія)</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(50.453768, 30.533842),
        title: 'Київ',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Віват Канцелярія</td>' +
            '<td>вул. Заболотного,37, ТРЦ Арт Моллм-н Виват, канцелярия</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Віват Канцелярія</td>' +
            '<td>вул. Борщагівська, 154-А, ТРЦ Аркадия м-н Виват, канцелярия</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Віват Канцелярія</td>' +
            '<td>пр. Соборности, 2/1-а,  ТРЦ Дарница м-н Виват, канцелярия</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Віват Канцелярія</td>' +
            '<td>пр. Романа Шухевича, 2Т,  ТРЦ Скай Молл, м-н Виват, канцелярия</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Лібраріум</td>' +
            '<td>вул. Дніпровська набережна, ТРЦ Рівер Молл</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Лібраріум</td>' +
            '<td>пр. Степана Бандери, 36, ТРЦ Блокбастер</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Лібраріум</td>' +
            '<td>вул. Берковецька, б. 6 Д, ТРЦ Lavina Mall</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Лібраріум</td>' +
            '<td>пр. Правди, 47, ТРЦ Ретровиль, магазин Либрариум.</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Лібраріум</td>' +
            '<td>вул, Кольцева, 1. ТРЦ Республика  м-н Либрариум</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Єліпс</td>' +
            '<td>вул. Єлизавети Чавдар, 1</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Єліпс</td>' +
            '<td>бульвар Кольцова, 14г</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Єліпс</td>' +
            '<td>вул. Урлівська, 23А</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Олівець Молодець</td>' +
            '<td>вул. Ани Ахматової 14а</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Fin House</td>' +
            '<td>вул. Андрія Малишка 3, від в маг. Дитячий світ, пов. 2</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(48.5266877,37.6691897),
        title: 'Костянтинівка',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Канцлер</td>' +
            '<td>пр. Свободи, 155</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(48.7294482,37.5194222),
        title: 'Краматорськ',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Канцлер</td>' +
            '<td>вул. Дворцова,15</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(47.9070207,33.0863412),
        title: 'Кривий Ріг',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Акварель</td>' +
            '<td>ТРЦ "Терра", 5-й Зарічний мікрорайон, 11к</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Акварель</td>' +
            '<td>пр. Металургів, 38А</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(50.73977,25.2639655),
        title: 'Луцьк',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Офіс Центр</td>' +
            '<td>вул. Кривий вал, 31</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Офіс Центр</td>' +
            '<td>вул. Ковельська, 22</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.2347287,28.4346146),
        title: 'Вінница',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Магік</td>' +
            '<td>Хмельницьке шосе, 145 ТЦ "Фуршет"</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Магік</td>' +
            '<td>пр-т Коцюбинського, 70 ТЦ "Петроцентр"</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Магік</td>' +
            '<td>вул.Пирогова, 31 ТЦ "Бастилія"</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Магік</td>' +
            '<td>вул.Соборна, 10а ТЦ "Cloud"</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Магік</td>' +
            '<td>вул.Келецька, 57 ТЦ "Мир"</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(47.1225737,37.5119231),
        title: 'Маріуполь',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Акварель</td>' +
            '<td>ТРЦ ПортCity, Запоріжське шосе, 2</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Натали</td>' +
            '<td>вул. Київська, 33</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(48.4408968,22.6776966),
        title: 'Мукачево',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Любимый</td>' +
            '<td>вул. Воз’еднання, 20 ТЦ "Щодня"</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(48.5295203,35.8240022),
        title: 'Павлоград',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Акварель</td>' +
            '<td>ТЦ "Олімпія", вул.Горького 166/2</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.6020233,34.4871992),
        title: 'Полтава',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Акварель</td>' +
            '<td>ТРЦ Конкорд, вул. Європейська, 60А</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Акварель</td>' +
            '<td>ТРЦ Київ, вул. Кооперативна, 1</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(50.6110962,26.2091481),
        title: 'Рівне',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Kancbaza</td>' +
            '<td>вул. Данила Галицького,19</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Kancbaza</td>' +
            '<td>вул. Академіка Грушевського, 2Б</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Kancbaza</td>' +
            '<td>вул. Богоявленська,28</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(48.9562962,38.4466177),
        title: 'Северодонецьк',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Канцлер</td>' +
            '<td>пр. Свободи,13</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Канцлер</td>' +
            '<td>пр.Гвардійський, 23</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Канцлер</td>' +
            '<td>вул. Курчатова, 16</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(50.9006445,34.7441747),
        title: 'Суми',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Акварель</td>' +
            '<td>ТРЦ Київ, вул. Кооперативна, 1</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Лібраріум</td>' +
            '<td>вул. М. Лушпи, 4/1 ТРЦ "Лавина"</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.5483493,25.5626497),
        title: 'Тернопіль',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Офіс Центр</td>' +
            '<td>вул. Перля, 3 "ТЦ Новус"</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(48.6193764,22.2446183),
        title: 'Ужгород',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Любимый</td>' +
            '<td>вул. Легоцького, 19а ТРЦ "Токyо"</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(48.7630002,30.1807396),
        title: 'Умань',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Школяр</td>' +
            '<td>вул. Чорного,4</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Школяр</td>' +
            '<td>вул. Тищінка, 8</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.4105308,26.9252192),
        title: 'Хмельницький',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Офіс Центр</td>' +
            '<td>вул. Подільська, 93</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Офіс Центр</td>' +
            '<td>вул. Кам’янецька, 72, ТЦ “Kvartal”</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Офіс Центр</td>' +
            '<td>вул. Проскурівська, 4/3, "ТЦ Дитячій світ"</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Офіс Центр</td>' +
            '<td>вул. Трудова, 6А, ТЦ “WOODMALL”</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Офіс Центр</td>' +
            '<td>вул. Старокостянтинівське, шосе 2, ТЦ “Агора”</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Офіс Центр</td>' +
            '<td>вул. Панаса Мирного, 1, ТЦ “Проспект Центр”</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.4311119,31.9791906),
        title: 'Черкаси',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Віват Канцелярія</td>' +
            '<td>вул,О.Дашкевича, 29,</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Віват Канцелярія</td>' +
            '<td>Хрещатик, 212</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Лібраріум</td>' +
            '<td>О.Дашкевича, 29</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Лібраріум</td>' +
            '<td>Хрещатик, 212</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(51.4957591,31.2204992),
        title: 'Чернігів',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Віват Канцелярія</td>' +
            '<td>пр. Миру, 18, Виват Канцелярия</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Віват Канцелярія</td>' +
            '<td>пр. Победы, 96, Виват Канцелярия</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Віват Канцелярія</td>' +
            '<td>Хрещатик 212, Виват Канцелярия</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Віват Канцелярія</td>' +
            '<td>пр. Мира, 49  ТРЦ ЦУМ м-н Виват, канцелярия</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Лібраріум</td>' +
            '<td>вул. 77-й Гвардейской дивизии, 18 ТРЦ Голливуд  м-н Либрариум</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Лібраріум</td>' +
            '<td>Хрещатик 212, Виват Канцелярия</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(48.4780663,35.0436042),
        title: 'Дніпро',
        descr: '<table>' +
            '<tr>' +
            '<td>Магазин</td>' +
            '<td>Адреса</td>' +
            '</tr>' +
            '<tr>' +
            '<td>YES</td>' +
            '<td>ул. Каштанова, 11</td>' +
            '</tr>' +
            '</table>',
    },

];

// jQuery('#santa-map').height(jQuery(window).height() - 40);
function initialize() {
    var myLatlng = new google.maps.LatLng(49.162417, 30.9801156);
    var centr = new google.maps.LatLng(49.162417, 30.9801156);
    var mapOptions = {
        center: centr,
        zoom: 6,
        disableDefaultUI: true,
        styles : mapStyle
    };
    var icon = "https://yes-tm.com/image/logo_maps.png";
    var iconHover = "https://yes-tm.com/image/logo_maps.png";
    var map = new google.maps.Map(document.getElementById('santa-map-2022'),
        mapOptions);
    var pointsPlaces = mapObjects;
    var infowindow = null;
    pointsPlaces.forEach(function(place) {
        var marker = new google.maps.Marker({
            position: place.position,
            icon: icon,
            map: map
        });
        var logoText = place.title;
        var label = new google.maps.InfoWindow({
            content: "<div class='objContentPop'>" +
                "<div class='logo'>" + logoText + "</div>" +
                "<div class='descr'>" + place.descr + "</div>" +
                "</div>"
        });
        google.maps.event.addListener(marker, 'mouseover', function() {
            marker.setIcon(iconHover);
        });
        google.maps.event.addListener(marker, 'mouseout', function() {
            marker.setIcon(icon);
        });
        google.maps.event.addListener(marker, 'click', function() {
            if (infowindow) {
                infowindow.close();
            }
            if(infowindow != label) {
                infowindow = label;
                label.open(map, marker);
            }else{
                infowindow = null;
            }
        });
        google.maps.event.addListener(map, 'click', function() {
            label.close();
        });
        if(infowindow == null) {
            infowindow = label;
            label.open(map, marker);
        }
        google.maps.event.addListener(label, 'domready', function() {

            // Reference to the DIV that wraps the bottom of infowindow
            var iwOuter = jQuery('.gm-style-iw');

            var iwBackground = iwOuter.prev();

            // Removes background shadow DIV
            iwBackground.children(':nth-child(2)').css({'background' : 'none', 'border-radius' : '10px', 'box-shadow' : '#3D3D3D 0px 6px 16px -5px', 'border' : '3px solid #E3EAEC'});

            // Removes white background DIV
            iwBackground.children(':nth-child(4)').css({'background' : '#E3EAEC', 'border-radius' : '10px'});

            iwBackground.children(':nth-child(3)').children(':nth-child(1)').css({'width' : '25px', 'left' : '-13px', 'top' : '2px'});
            iwBackground.children(':nth-child(3)').children(':nth-child(1)').children(':nth-child(1)').css({'transform' : 'skewX(50deg)', 'width' : '25px', 'left' : '0px', 'background-color' : '#E3EAEC'});
            iwBackground.children(':nth-child(3)').children(':nth-child(2)').css({'width' : '25px', 'left' : '12px', 'top' : '2px'});
            iwBackground.children(':nth-child(3)').children(':nth-child(2)').children(':nth-child(1)').css({'transform' : 'skewX(-50deg)', 'width' : '25px', 'background-color' : '#E3EAEC'});

            // Reference to the div that groups the close button elements.
            var iwCloseBtn = iwOuter.next();

            // Apply the desired effect to the close button
            iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'}).hide();

            // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
            if(jQuery('.iw-content').height() < 140){
                jQuery('.iw-bottom-gradient').css({display: 'none'});
            }

            // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
            iwCloseBtn.mouseout(function(){
                jQuery(this).css({opacity: '1'});
            });
        });
    });

    if (infowindow) {
        infowindow.close();
    }
    // map.setOptions({draggable: false, zoomControl: false, scrollwheel: false, disableDoubleClickZoom: true});
}
google.maps.event.addDomListener(window, 'load', initialize);

const cssId = 'santa-styles';

if ( !document.getElementById( cssId ) )
{
    var head  = document.getElementsByTagName( 'head' )[ 0 ];
    var link  = document.createElement( 'link' );
    link.id   = cssId;
    link.rel  = 'stylesheet';
    link.type = 'text/css';
    link.href = 'https://yes-tm.com/santa/santa.min.css?v1.0.8';
    link.media = 'all';
    head.appendChild( link );
}