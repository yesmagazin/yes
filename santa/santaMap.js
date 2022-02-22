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
        position: new google.maps.LatLng(48.4644255, 35.0469577),
        title: 'Дніпро',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>Демар-Мост Сіті-Новий Центр-Босфор-Яворницького-ялинка на площи коло ЦУМу-ЦУМ-Європейська площа-Театральна площа-Мост Сіті</p></td>' +
            '<td><i>Фіксований час</i><p>Мост Сіті <strong>17:00-18:00</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>Демар-Мост Сіті-Новий Центр-Босфор-Яворницького-ялинка на площи коло ЦУМу-ЦУМ-Європейська площа-Театральна площа-Мост Сіті</p></td>' +
            '<td><i>Фіксований час</i><p>Мост Сіті <strong>17:00-18:00</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(51.4932819, 31.2928226),
        title: 'Чернигів',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>АТБ(напроти маг. Турист) — ринок Нива-магазин Сіверський</p></td>' +
            '<td><i>Фіксований час</i><p>ринок Нива <strong>16:30 - 17:00</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>Червона Площа-Міська Ялинка-Макдональдс</p></td>' +
            '<td><i>Фіксований час</i><p>Макдональдс <strong>16:30 - 17:00</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(47.8399068, 35.1372944),
        title: 'Запоріжжя',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>пр.Соборний  220 (Макдональдс) -  пр.Соборний 167 (бул.Шевченка)</p></td>' +
            '<td><i>Фіксований час</i><p>проспект Соборний 167 <strong>17:00-17:30</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>пр.Соборний 190 (пл.Маяковського)- пр.Соборний 147 (ТЦ Україна)</p></td>' +
            '<td><i>Фіксований час</i><p>фонтан Життя по Маяковського <strong>15:00-15:30</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(50.9068484, 34.7997876),
        title: 'Суми',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p> Центральний парк- пл.Покровська-вул.Петропавловська (до Стройтехнікума)-центральний ринок- вул. Соборна Воскресенська -Дитячий парк</p></td>' +
            '<td><i>Фіксований час</i><p>Макдональдс <strong>13:30-14:00</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p>Центральний парк-пл. Покровска-вул.Соборна-МАКдональдс-ринок центральний-Дитячий парк</p></td>' +
            '<td><i>Фіксований час</i><p>Макдональдс <strong>13:30-14:00</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(47.9084941, 33.4179204),
        title: 'Кривий Ріг',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p>проспект Поштовий-театр Шевченка-ялинка на Поштовій-площа Визволення Вікторі Плаза- вул. Лермонтова37</p></td>' +
            '<td><i>Фіксований час</i><p>ялинка на Поштовій <strong>13:30-14:00</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p>Соцмісто ринок-Фокстрот-ялинка в парку Ювілейному-Макдональдс 95 квартал</p></td>' +
            '<td><i>Фіксований час</i><p>ялинка в парку Ювілейний <strong>13:30-14:00</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(46.4737624, 30.7144506),
        title: 'Одеса',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p>парк Горького (фонтан)  — перша група; площа Незалежності (Макдональдс)-7 станція Люстдорфскої дороги (фонтан) — друга група</p></td>' +
            '<td><i>Фіксований час</i><p>фонтан парк Горького-1; Макдональдс на площі Незалежності -2  <strong>13:30-14:00</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p>Приморський бульвар- Дерибасівська — Соборна площа -1; Кримський бульвар- Марсельська _2</p></td>' +
            '<td><i>Фіксований час</i><p>Горсад -1; ТРЦ Сіті центр -2 <strong>13:30-14:00</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.0881686, 33.4229324),
        title: 'Кременчуг',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>Залізничний вокзал-ТЦ Амстор-вул. Леніна-сквер Октябрьський-ТЦ Європа-парк Придніпровський</p></td>' +
            '<td><i>Фіксований час</i><p>міська ялинка <strong>16:30-17:00</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>Залізничний вокзал-ТЦ Амстор-вул. Леніна-сквер Октябрьський-ТЦ Європа-парк Придніпровський</p></td>' +
            '<td><i>Фіксований час</i><p>міська ялинка <strong>16:30-17:00</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.5972123, 34.5412219),
        title: 'Полтава',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p>Вул . Соборності</p></td>' +
            '<td><i>Фіксований час</i><p>вул. Соборності 23 міська ялинка <strong>13:30-14:00</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p>Вул . Соборності</p></td>' +
            '<td><i>Фіксований час</i><p>вул. Соборності 23 міська ялинка <strong>13:30-14:00</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(47.1220608, 37.5569844),
        title: 'Маріуполь',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>Площа Миру, 102, центр міста-площадь Миру</p></td>' +
            '<td><i>Фіксований час</i><p>Миру 102 <strong>16:30-17:00</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>площа Миру, 69 — ЦУМ-Драм театр-міська ялинка</p></td>' +
            '<td><i>Фіксований час</i><p>Міська ялинка <strong>16:30-17:00</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(50.4529238,30.5209087),
        title: 'Київ',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>16:00-20:00</i>' +
            '<p>Локація 1: вул.Хрещатик, метро Хрещатик, Бессарабський ринок, ЦУМ</p>' +
            '<p>Локація 2: Новорічна ялинка, Софіївська площа, Михайлівська площа</p>' +
            '<p>Локація 3: Площа Контрактова, площа Поштова, Колесо огляду</p>' +
            '<p>Локація 4: пл.Контрактова, метро Контрактова</p>' +
            '</td>' +
            '<td><i>Фіксований час</i>' +
            '<p>Локація 1: метро Хрещатик <strong>16:30-17:00</strong></p>' +
            '<p>Локація 2: МакДональдз Майдан Незалежності <strong>16:30-17:00</strong></p>' +
            '<p>Локація 3: Колесо огляду <strong>16:30-17:00</strong></p>' +
            '<p>Локація 4: метро Контрактова <strong>16:30-17:00</strong></p>' +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>15:00-19:00</i>' +
            '<p>Локація 1: вул.Хрещатик, метро Хрещатик, Бессарабський ринок, ЦУМ</p>' +
            '<p>Локація 2: Новорічна ялинка, Софіївська площа, Михайлівська площа</p>' +
            '<p>Локація 3: Площа Контрактова, площа Поштова, Колесо огляду</p>' +
            '<p>Локація 4: пл.Контрактова, метро Контрактова</p>' +
            '</td>' +
            '<td><i>Фіксований час</i>' +
            '<p>Локація 1: метро Хрещатик <strong>16:30-17:00</strong></p>' +
            '<p>Локація 2: МакДональдз Майдан Незалежності <strong>16:30-17:00</strong></p>' +
            '<p>Локація 3: Колесо огляду <strong>16:30-17:00</strong></p>' +
            '<p>Локація 4: метро Контрактова <strong>16:30-17:00</strong></p>' +
            '</td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(48.4420712,22.7161831),
        title: 'Мукачево',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p>пл.Мира (біля центральної ялинки),  вул. Федорова</p></td>' +
            '<td><i>Фіксований час</i><p>Центральна ялинка <strong>13:30-14:00</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p>пл.Мира (біля центральної ялинки),  вул. Федорова</p></td>' +
            '<td><i>Фіксований час</i><p>Центральна ялинка <strong>13:30-14:00</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.8398197,24.0234708),
        title: 'Львів',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>пр-т Шевченка (МакДональдз) пл.Галицька, пр-т Свободи, площа Ринок, Оперний театр</p></td>' +
            '<td><i>Фіксований час</i><p>Оперний театр (пр-т Свободи, 28) <strong>16:00-16:30</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p>пр-т Шевченка (МакДональдз) пл.Галицька, пр-т Свободи, площа Ринок, Оперний театр</p></td>' +
            '<td><i>Фіксований час</i><p>Оперний театр (пр-т Свободи, 28) <strong>13:00 - 13:30</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(50.2648491,28.673178),
        title: 'Житомир',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>Площа Перемоги, ЦУМ, Глобал UA, вул.Михайлівська</p></td>' +
            '<td><i>Фіксований час</i><p>вул.Михайлівська <strong>15:30 - 16:00</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>Площа Перемоги, ЦУМ, Глобал UA, вул.Михайлівська</p></td>' +
            '<td><i>Фіксований час</i><p>вул.Михайлівська <strong>15:30 - 16:00</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.4185446,26.9929461),
        title: 'Хмельницький',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>Площі незалежності, ТЦ "Либідь плаза", вул. Камянецька, Центральна ялинка, ЦУМ вул. Проскурівська,  вул. Подільська, ТЦ "Офісцентр", ТЦ "Оазис", ТЦ "EL"</p></td>' +
            '<td><i>Фіксований час</i><p>вул.Проскурівська Центальна ялинка <strong>16:00 - 16:30</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>Площі незалежності, ТЦ "Либідь плаза", вул. Камянецька, Центральна ялинка, ЦУМ вул. Проскурівська,  вул. Подільська, ТЦ "Офісцентр", ТЦ "Оазис", ТЦ "EL"</p></td>' +
            '<td><i>Фіксований час</i><p>вул.Проскурівська Центальна ялинка <strong>16:00 - 16:30</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(48.3140244,25.941958),
        title: 'Черновці',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>15:00-19:00</i><p>Соборна площа-Кобилянська- Театральна</p></td>' +
            '<td><i>Фіксований час</i><p>вул.Кобилянська с <strong>15:00 - 19:00</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p>Соборна площа-Кобилянська- Театральна</p></td>' +
            '<td><i>Фіксований час</i><p>вул.Кобилянська с <strong>15:00 - 19:00</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.2331306,28.4532256),
        title: 'Винниця',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>вул.Соборна, майдан Незалежності, пл.Гагарина, майдан Небесної сотні, пл. Европейська (вежа)</p></td>' +
            '<td><i>Фіксований час</i><p>пл.Европейська <strong>15:30 - 16:00</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i><p>площа Могилка, Парк Дружби, ТЦ" Мир", Фонтан Сонячна система пр.Космонавтів, Парк "Дружби", ТЦ Магігранд</p></td>' +
            '<td><i>Фіксований час</i><p>парк Дружби народів <strong>13:30-14:00</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.548405,25.5626497),
        title: 'Тернополь',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>вул. Бродівська, вул. Збаразька-Злуци- Тарнавського- В. Великого- Курбаса-Текстильна, вул. Морозенка-15 Квітня-Київська-Пушкіна-Злуки-Коновальця-Ст. Бандери-Руська-Театральна площа</p></td>' +
            '<td><i>Фіксований час</i><p>ТРЦ Подоляни <strong>16:00 - 16:30</strong></p></td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>14:00-18:00</i><p>Збаразьке кільце, Театральна площа, бульв. Чорновола-Б.Хмельницького-Руська-Острозького-Живова-Оболоня-Шептицького-Живова-Руська-Дружби-Миру-Карпенка</p></td>' +
            '<td><i>Фіксований час</i><p>Театральна площа <strong>16:00 - 16:30</strong></p></td>' +
            '</tr>' +
            '</table>',
    },
    {
        position: new google.maps.LatLng(49.9876348,36.2444127),
        title: 'Харьков',
        descr: '<table>' +
            '<tr>' +
            '<td colspan="2">25.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i>' +
            '<p>Локація 1: Центральний ринок, Полтавський шлях, вокзал Південний, площа Привокзальна, р-н Холодна гора</p>' +
            '<p>Локація 2: вул.Алексіївська, пр.Людвига Свободи, Ст.метро Перемоги, ТЦ "Рост", магазин "Фокстрот", "Чудо"</p>' +
            '</td>' +
            '<td><i>Фіксований час</i>' +
            '<p>Локація 1: Вокзал Південний <strong>13:30 - 14:00</strong></p>' +
            '<p>Локація 2: ТЦ "РОСТ" <strong>13:30 - 14:00</strong></p>' +
            '</td>' +
            '</tr>' +
            '<tr>' +
            '<td colspan="2">26.12.2020</td>' +
            '</tr>' +
            '<tr>' +
            '<td><i>12:00-16:00</i>' +
            '<p>Локація 1: Ринок Барабашова, ТРК "Україна", Палац Піонерів</p>' +
            '<p>Локація 2: пр.Гагаріна "Таврія В", ст.метро Гагаріна,  Наберіжна, парк Стрілка, ст.метро "Історичний музей"</p>' +
            '</td>' +
            '<td><i>Фіксований час</i>' +
            '<p>Локація 1: ТРК "Україна" <strong>13:30 - 14:00</strong></p>' +
            '<p>Локація 2: ст.метро Гагаріна <strong>13:30 - 14:00</strong></p>' +
            '</td>' +
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
    var map = new google.maps.Map(document.getElementById('santa-map'),
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