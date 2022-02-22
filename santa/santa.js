const debug = true;

const santas = {
    santa_1 : {
        url : 'https://yes-tm.com/',
        position : '.subs .subs__preview',
        mobilePosition : '.subs .subs__center',
        type : 'half',
        descr : "Круто-Санта обирає для подарунків дуууже імениті бренди. Зараз він відправився туди, де є багацько інфи про бренд YES. Шукай його там."
    },
    santa_2 : {
        url : 'https://yes-tm.com/o-brende',
        position : '.company__gallery .company__line:first-child .company__photo:last-child',
        mobilePosition : '',
        type : 'full',
        descr : "У якості першого подарунку Круто-Санта обрав зелений шкільний рюкзак з очами. Три сотні вирішив він покласти у свій мішок. Він зараз там."
    },
    santa_3 : {
        url : 'https://yes-tm.com/558199-ryukzak-shkolnyj-yes-s-33-monsters-1',
        position : '.card__share.share .share__social',
        mobilePosition : '.card__share.share',
        type : 'half',
        descr : "Круто-Санта усім дарує позитивні емоції. У якості наступного подарунку для дівчини  він обрав рюкзак Citi, та такий, де посміхається дуже великий смайлик. Сотня таких не завадить у мішечку Круто-Санти."
    },
    santa_4 : {
        url : 'https://yes-tm.com/558298-ryukzak-shkolnyj-yes-t-45-smile-camo-girls-1',
        position : '.options__item .location .location__col:last-child',
        mobilePosition : '',
        type : 'half rounded',
        descr : "Які там олені! Круто-Санта полюбляє екзотику ;) Він обрав собі записник та такий, на обкладинці якого порозбігалися леопардики."
    },
    santa_5 : {
        url : 'https://yes-tm.com/251985-ezhednevnik-myagk-a5-nedat-vivere-352-str-oranzh-folg-1',
        position : '#product .view__col .view__for.slick-slider .view__slide:nth-child(6)',
        mobilePosition : '',
        type : 'half rounded',
        descr : "Ігри - найулюбленіший подарунок Круто-Санти. Адже це тааак весело та пізнавально для малечі. Знайди гру YES, для якої необхідні знання с хімії. Круто-Санта прихопив багацько таких  у свій мішок - десь сотні зо дві."
    },
    santa_6 : {
        url : 'https://yes-tm.com/953745-nabor-himicheskih-eksperimentov-quotoops-bolshaya-him',
        position : '.options__item .shops__list .shops__row:nth-child(6) .shops__col:first-child .shops__preview',
        mobilePosition : '',
        type : 'half',
        descr : "Круто-Санта - знаменитість! І він дуууже полюбляє таких же як він сам. Шукай його серед новин, де є знамениті люди."
    },
    santa_7 : {
        url : 'https://yes-tm.com/andre-tan--brend-%C2%AByes%C2%BB-prodemonstrirovali-novuu-kollekciu-shkolnyh-rukzakov-2021',
        position : '.article__body .article__desc .article__share',
        mobilePosition : '',
        type : 'half',
        descr : "Круто-Санта вирішив перепочити, та випити гарячого чаю. Шукай його там, де є стакан YES із натяком на те, що полюбляє панда. Стакан дуууже крутий, тому Круто-Санта прихопив ще сотню на подарунки."
    },
    santa_8 : {
        url : 'https://yes-tm.com/707309-stakan-bambukovyj-yes-vivere-400ml',
        position : '.options__item .comments .comments__form .comment__rating .rating__group',
        mobilePosition : '',
        type : 'half',
        descr : "У Круто-Санти величезний список дитячих бажань. Він їх виконує переважно вночі.. Саме тому вирішив покласти цей список у найтрендовіший сірий рюкзак, що світиться у темряві. І ще підказка: цей самий рюкзак Круто-Санта вполював у нашому новорічному відео (щоб точно дізнатись, як він виглядає - переходь до нашої сторінки інстаграм та шукай пост с цим відео)"
    },
    santa_9 : {
        url : 'https://yes-tm.com/558595-ryukzak-molodezhnyj-1',
        position : '.card__row .view__col .view__for.slick-slider .view__slide:nth-child(3)',
        mobilePosition : '',
        type : 'half rounded',
        descr : "Найменшим діткам до 5-ти років Круто-Санта обрав яскравий жовто-синій рюкзак та не простий… Він відображає справжню зірку популярного мульту. Та не одну - їх там було ой як багато та всі такі прикольні!!! П’ять сотень хутко поклав у свій мішок."
    },
    santa_10 : {
        url : 'https://yes-tm.com/557820-ryukzak-detskij-k-18-quotminionsquot',
        position : '#product .view__col .view__for.slick-slider .view__slide:nth-child(5)',
        mobilePosition : '',
        type : 'half rounded',
        descr : "Вітаємо! Ти відшукав усіх Круто-Сант та, сподіваємося, порахував, скільки ж всього та які подарунки він обрав. Напиши нам у директ інстаграм @yes.official.ua скріни усіх місць перебування Круто-Санти та скільки подарунків для малечі він поклав у свій мішок"
    },
};

const cssId = 'santa-styles';

if ( !document.getElementById( cssId ) )
{
    var head  = document.getElementsByTagName( 'head' )[ 0 ];
    var link  = document.createElement( 'link' );
    link.id   = cssId;
    link.rel  = 'stylesheet';
    link.type = 'text/css';
    link.href = 'https://yes-tm.com/santa/santa.min.css?v1.0.4';
    link.media = 'all';
    head.appendChild( link );
}

let renderSanta = function( santaData, key ) {
    if ( debug ) { console.log( santaData ); }
    if ( santaData.position.length < 1 ) {
        return ;
    }
    let parent = $( santaData.position );
    if ( parent.css( 'position' ) != 'absolute' && parent.css( 'position' ) != 'fixed' ) {
        parent.css( 'position', 'relative' );
    }
    if ( parent.find( '.santa' ).length > 0 ) {
        return ;
    }
    if ( $( window ).width() > 767 || santaData.mobilePosition.length < 1 ) {
        $(santaData.position).append('<div class="santa ' + santaData.type + ' ' + key + '" data-santa="' + key + '"></div>');
    } else {
        $(santaData.mobilePosition).append('<div class="santa ' + santaData.type + ' ' + key + '" data-santa="' + key + '"></div>');
    }
}

let renderPopup = function( santaKey ) {
    if ( debug ) { console.log( santas[ santaKey ] ); }
    let santa = santas[ santaKey ];
    if ( $( 'body' ).find( '#santa-popUp' ).length < 1 ) {
        let helpTitle = ( santaKey == 'santa_10' ) ? '' : '<h2>Лови підказку...</h2>';
        $('body').append( '<div id="santa-popUp" data-santa="' + santaKey + '"><div class="inner"><span class="close-santa">&times;</span>' + helpTitle + '<div class="descr">' + santa.descr + '<p><small><i>Pоби скрін</i></small></p></div></div></div>' );
        $( 'body' ).find( '#santa-popUp .inner' ).css( {
            'margin-left' : $( 'body' ).find( '#santa-popUp .inner' ).width() / -2 - 28,
            'margin-top' : $( 'body' ).find( '#santa-popUp .inner' ).height() / -2 - 28,
        } );
    }
    $( 'body' ).find( '#santa-popUp' ).fadeIn( 250, function () {
        $( 'body' ).find( '#santa-popUp .inner' ).css( {
            'margin-left' : $( 'body' ).find( '#santa-popUp .inner' ).width() / -2 - 28,
            // 'margin-top' : $( 'body' ).find( '#santa-popUp .inner' ).height() / -2 - 28,
        } );
    } );
}

jQuery( document ).ready( function( $ ) {
    let currentPage = window.location.href;

    $.each( santas, function( k, v ) {
        if ( currentPage == v.url ) {
            return renderSanta( v, k );
        }
    } )

    $( 'body' ).on( 'click', '.santa', function ( e ) {
        let santaKey = $( this ).data( 'santa' );
        if ( typeof santaKey !== undefined && santaKey != '' ) {
            e.preventDefault();
            renderPopup( santaKey );
        }
    } )

    $( 'body' ).on( 'click', '#santa-popUp .close-santa', function () {
        $( this ).parent().parent().fadeOut( 400, function () {
            $( this ).remove();
        } )
    } )
} )