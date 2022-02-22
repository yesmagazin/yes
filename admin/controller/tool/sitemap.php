<?php

class ControllerToolSitemap extends Controller {

    private $data = array();
    private $site;
    private $urlController;

    public function index( $site = false ) {
        if($site){
            $this->site = $site;
        }
        $this->load->model('catalog/category');
        $this->load->model('catalog/product');

        $this->urlController = new Url(HTTP_CATALOG, $this->config->get('config_secure') ? HTTP_CATALOG : HTTPS_CATALOG);
        require_once modification(DIR_CATALOG . 'controller/startup/seo_url.php');
        $rewriter = new ControllerStartupSeoUrl($this->registry);
        $this->urlController->addRewrite($rewriter);
//        if ($this->config->get('config_seo_url')) {
//            $this->urlController->addRewrite($this);
//        }

        $this->getData();
        $this->MakeSFile();
    }

    private function getData(){
        if($cids = $this->model_catalog_category->getCategoriesIDsPath($this->site['db'])){
            foreach ($cids as $cid){
                $this->data[] = array(
                    'f' => 0,
                    'h' => $this->urlController->link('product/category', 'path=' . $cid, true, $this->site['db']),
                    't' => 'cat',
                );
            }
        }
        if($pids = $this->model_catalog_product->getProductsIDs(/*$this->site['db']*/)){
            foreach ($pids as $pid){
                $this->data[] = array(
                    'f' => 1,
                    'h' => $this->urlController->link('product/product', 'product_id=' . $pid, true, $this->site['db']),
                    't' => 'prod',
                );
            }
        }
    }

    public static $notSet = array('https://yes-tm.com/accessories','https://yes-tm.com/accessories/akcecuari-dlya-vzuttya','https://yes-tm.com/accessories/aksesuari-dlya-volossya','https://yes-tm.com/accessories/biznes-aksesuari-1','https://yes-tm.com/accessories/biznes-aksesuari-1/tip/bejdzh','https://yes-tm.com/accessories/biznes-aksesuari-1/tip/vizitnitsa-karmannaja','https://yes-tm.com/accessories/breloki','https://yes-tm.com/accessories/breloki/brelok-fliker','https://yes-tm.com/accessories/breloki/brelok-katafot','https://yes-tm.com/accessories/breloki/shpil-ki','https://yes-tm.com/accessories/dozhdevik','https://yes-tm.com/accessories/koshel-ki','https://yes-tm.com/accessories/kosmetika','https://yes-tm.com/accessories/nalipki','https://yes-tm.com/accessories/plyashki-ta-lanchbokci','https://yes-tm.com/accessories/plyashki-ta-lanchbokci/lanchbokci','https://yes-tm.com/accessories/plyashki-ta-lanchbokci/plyashki','https://yes-tm.com/accessories/plyashki-ta-lanchbokci/termos','https://yes-tm.com/accessories/poperechnii-remin-dlya-ryukzaka','https://yes-tm.com/accessories/skarbnichki','https://yes-tm.com/all-categories','https://yes-tm.com/andre-tan','https://yes-tm.com/blog','https://yes-tm.com/compare-products','https://yes-tm.com/contact-us','https://yes-tm.com/dityacha-tvorchist','https://yes-tm.com/dityacha-tvorchist/barvi','https://yes-tm.com/dityacha-tvorchist/gravyuri','https://yes-tm.com/dityacha-tvorchist/igri','https://yes-tm.com/dityacha-tvorchist/rozmalovki','https://yes-tm.com/dlya-podrostkov-i-molodezhi','https://yes-tm.com/kanctovari','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/al-bomi','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/bloknoti','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/bloknoti-motivatori','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/dnevniki','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/planingi','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/tetradi','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/tetradi/tsvet/korichnevyj','https://yes-tm.com/kanctovari/izmeritel-nie-prinadlezhnocti','https://yes-tm.com/kanctovari/izmeritel-nie-prinadlezhnocti/lineika','https://yes-tm.com/kanctovari/izmeritel-nie-prinadlezhnocti/trancportir-639907880','https://yes-tm.com/kanctovari/penali','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/cirkuli','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/karandash-grafitnii','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/korektori','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/lactiki','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/markeri-uk-ua','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/ruchki','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/tochilki','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/trimachi-dlya-ruchok','https://yes-tm.com/kanctovari/ricovanie','https://yes-tm.com/kanctovari/ricovanie/cvetnie-karandashi','https://yes-tm.com/kanctovari/ricovanie/flomacteri','https://yes-tm.com/kanctovari/ricovanie/kicti','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/inshe','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/kancelyarski-dribnici','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/klei','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/mel','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/nozhnici','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papir-dlya-notatok-ta-indeksiv','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-dlja-tetradej','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-dlja-truda','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-konvert-na-knopke','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-konvert-na-molnii','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-portfel-dlja-prinadlezhnostej','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/plactilin','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/podctavka-dlya-knig','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/podctavka-dlya-pic-mennix-prinadlezhnoctei','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/podlozhka-dlya-ctola','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/zakladki','https://yes-tm.com/kanctovari/shodenniki','https://yes-tm.com/novinki-1','https://yes-tm.com/novosti-i-akcii','https://yes-tm.com/prezentaciya-tovarov','https://yes-tm.com/ru','https://yes-tm.com/accessories','https://yes-tm.com/accessories/akcecuari-dlya-vzuttya','https://yes-tm.com/accessories/aksesuari-dlya-volossya','https://yes-tm.com/accessories/biznes-aksesuari-1','https://yes-tm.com/accessories/biznes-aksesuari-1/tip/bejdzh','https://yes-tm.com/accessories/biznes-aksesuari-1/tip/vizitnitsa-karmannaja','https://yes-tm.com/accessories/breloki','https://yes-tm.com/accessories/breloki/brelok-fliker','https://yes-tm.com/accessories/breloki/brelok-katafot','https://yes-tm.com/accessories/breloki/shpil-ki','https://yes-tm.com/accessories/dozhdevik','https://yes-tm.com/accessories/koshel-ki','https://yes-tm.com/accessories/kosmetika','https://yes-tm.com/accessories/nalipki','https://yes-tm.com/accessories/plyashki-ta-lanchbokci','https://yes-tm.com/accessories/plyashki-ta-lanchbokci/lanchbokci','https://yes-tm.com/accessories/plyashki-ta-lanchbokci/plyashki','https://yes-tm.com/accessories/plyashki-ta-lanchbokci/termos','https://yes-tm.com/accessories/poperechnii-remin-dlya-ryukzaka','https://yes-tm.com/accessories/skarbnichki','https://yes-tm.com/all-categories','https://yes-tm.com/andre-tan','https://yes-tm.com/blog','https://yes-tm.com/compare-products','https://yes-tm.com/contact-us','https://yes-tm.com/dityacha-tvorchist','https://yes-tm.com/dityacha-tvorchist/barvi','https://yes-tm.com/dityacha-tvorchist/gravyuri','https://yes-tm.com/dityacha-tvorchist/igri','https://yes-tm.com/dityacha-tvorchist/rozmalovki','https://yes-tm.com/dlya-podrostkov-i-molodezhi','https://yes-tm.com/kanctovari','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/al-bomi','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/bloknoti','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/bloknoti-motivatori','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/dnevniki','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/planingi','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/tetradi','https://yes-tm.com/kanctovari/bumazhno-belovie-tovari/tetradi/tsvet/korichnevyj','https://yes-tm.com/kanctovari/izmeritel-nie-prinadlezhnocti','https://yes-tm.com/kanctovari/izmeritel-nie-prinadlezhnocti/lineika','https://yes-tm.com/kanctovari/izmeritel-nie-prinadlezhnocti/trancportir-639907880','https://yes-tm.com/kanctovari/penali','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/cirkuli','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/karandash-grafitnii','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/korektori','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/lactiki','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/markeri-uk-ua','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/ruchki','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/tochilki','https://yes-tm.com/kanctovari/prinadlezhnocti-dlya-pic-ma-i-chercheniya/trimachi-dlya-ruchok','https://yes-tm.com/kanctovari/ricovanie','https://yes-tm.com/kanctovari/ricovanie/cvetnie-karandashi','https://yes-tm.com/kanctovari/ricovanie/flomacteri','https://yes-tm.com/kanctovari/ricovanie/kicti','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/inshe','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/kancelyarski-dribnici','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/klei','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/mel','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/nozhnici','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papir-dlya-notatok-ta-indeksiv','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-dlja-tetradej','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-dlja-truda','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-konvert-na-knopke','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-konvert-na-molnii','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/papka/tip/papka-portfel-dlja-prinadlezhnostej','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/plactilin','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/podctavka-dlya-knig','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/podctavka-dlya-pic-mennix-prinadlezhnoctei','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/podlozhka-dlya-ctola','https://yes-tm.com/kanctovari/shkol-nie-prinadlezhnocti/zakladki','https://yes-tm.com/kanctovari/shodenniki','https://yes-tm.com/novinki-1','https://yes-tm.com/novosti-i-akcii','https://yes-tm.com/prezentaciya-tovarov','https://yes-tm.com/ryukzaki-ta-cumki','https://yes-tm.com/ryukzaki-ta-cumki/chohli-dlya-noutbukiv-i-planshetiv','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids/vozrast-let/3-5','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/tip/rjukzak-roll-top/vozrast-let/14-18','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/tsvet/chernyj/vozrast-let/14-19/14-18','https://yes-tm.com/ryukzaki-ta-cumki/sportivni-sumki','https://yes-tm.com/ryukzaki-ta-cumki/sumki/sumki-dlya-vzuttya','https://yes-tm.com/ryukzaki-ta-cumki/sumki/sumki-kids','https://yes-tm.com/ryukzaki-ta-cumki/sumki/sumki-na-poyas','https://yes-tm.com/ryukzaki-ta-cumki/zhinochi-ryukzaki','https://yes-tm.com/sovety-mamam','https://yes-tm.com/ryukzaki-ta-cumki','https://yes-tm.com/ryukzaki-ta-cumki/chohli-dlya-noutbukiv-i-planshetiv','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids/vozrast-let/3-5','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/material/poliester-dzhins','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/tip/rjukzak-fashion','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/tip/rjukzak-roll-top','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/14-18/19-29','https://yes-tm.com/ryukzaki-ta-cumki/sportivni-sumki','https://yes-tm.com/ryukzaki-ta-cumki/sumki/sumki-dlya-vzuttya','https://yes-tm.com/ryukzaki-ta-cumki/sumki/sumki-kids','https://yes-tm.com/ryukzaki-ta-cumki/sumki/sumki-na-poyas','https://yes-tm.com/ryukzaki-ta-cumki/zhinochi-ryukzaki','https://yes-tm.com/sovety-mamam','https://yes-tm.com/ryukzaki-ta-cumki/pol/dlja-nee','https://yes-tm.com/ryukzaki-ta-cumki/pol/dlja-nego','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nee','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nego','https://yes-tm.com/ryukzaki-ta-cumki/sportivni-sumki/tip/rjukzak-sport','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nee/vozrast-let/3-5','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-kids/pol/dlja-nego/vozrast-let/3-5','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/6-9','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/10-13','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/14-18/10-13','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nee/vozrast-let/14-18/10-13','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nego/vozrast-let/14-18/10-13','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nee','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/pol/dlja-nego','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/tip/rjukzak-s-ortopedicheskoj-spinkoj','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/vozrast-let/14-18','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nee/vozrast-let/14-18','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nego/vozrast-let/14-18','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/tip/rjukzak-s-ortopedicheskoj-spinkoj/vozrast-let/10-13','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/vozrast-let/19-29','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nee/vozrast-let/19-29','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nego/vozrast-let/19-29','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nee','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-molodigni/pol/dlja-nego','https://yes-tm.com/ryukzaki-ta-cumki/zhinochi-ryukzaki/tip/rjukzak-sumka','https://yes-tm.com/ryukzaki-ta-cumki/zhinochi-ryukzaki/tsvet/chernyj','https://yes-tm.com/ryukzaki-ta-cumki/zhinochi-ryukzaki/obem-l/7','https://yes-tm.com/ryukzaki-ta-cumki/zhinochi-ryukzaki/material/eko-kozha','https://yes-tm.com/ryukzaki-ta-cumki/kocmetichki/tip/penal-kosmetichka','https://yes-tm.com/ryukzaki-ta-cumki/sportivni-sumki/tip/sumka-sportivnaja','https://yes-tm.com/ryukzaki-ta-cumki/sumki','https://yes-tm.com/ryukzaki-ta-cumki/dityachi-valizi','https://yes-tm.com/ryukzaki-ta-cumki/kocmetichki','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/tip/rjukzak-s-ortopedicheskoj-spinkoj/vozrast-let/10-13','https://yes-tm.com/ryukzaki-ta-cumki/dityachi-valizi');

    public static $notSetNoSlash = array('https://yes-tm.com/actions-partners','https://yes-tm.com/andre-tan--brend-«yes»-prodemonstrirovali-novuu-kollekciu-shkolnyh-rukzakov-2021','https://yes-tm.com/andre-tan-rekomenduet-rukzaki-yes','https://yes-tm.com/-balzam-vіd-yes-775','https://yes-tm.com/black-friday-2020-kakoj-on-tvoj-luchshij-rukzak','https://yes-tm.com/brelok-katafot-limon-uk-ua','https://yes-tm.com/brend-«yes»-—-vybor-2020-goda-sredi-rukzakov-v-ukraine','https://yes-tm.com/chemodany-dlya-puteshestvij','https://yes-tm.com/chto-drajvuet-sovremennyh-detej-top5-sovetov-ot-brenda-yes','https://yes-tm.com/cirkul-v-penali','https://yes-tm.com/cirkul-z-grifelyami','https://yes-tm.com/cirkul-z-grifelyami-1692980596','https://yes-tm.com/cirkul-z-grifelyami-1959618689','https://yes-tm.com/ctakan-dlya-pic-movogo-priladdya-rozbirnii-charming-animals','https://yes-tm.com/ctakan-dlya-pic-movogo-priladdya-rozbirnii-me-to-you','https://yes-tm.com/ctakan-dlya-pic-movogo-priladdya-rozbirnii-monsters','https://yes-tm.com/ctakan-dlya-pic-movogo-priladdya-rozbirnii-oxford-blue','https://yes-tm.com/cumka-cportivna-39-5-20','https://yes-tm.com/cumka-cportivna-48-5-23-5-14','https://yes-tm.com/cumka-cportivna-agile-42-24-19-5','https://yes-tm.com/cumka-cportivna-dinosaurs-20-34-16','https://yes-tm.com/cumka-cportivna-football-41-18-5-22-5','https://yes-tm.com/cumka-cportivna-owl-20-34-16','https://yes-tm.com/cumka-cportivna-smile-41-18-5-22-5','https://yes-tm.com/cumka-cportivna-tangy-42-24-19-5','https://yes-tm.com/cumka-molodizhna-st-34-meow-35-5-27-10-5','https://yes-tm.com/cumka-ryukzak-bezhevii-uk-ua','https://yes-tm.com/cumka-ryukzak-bilii','https://yes-tm.com/cumka-ryukzak-bilii-2052247235','https://yes-tm.com/cumka-ryukzak-chervonii','https://yes-tm.com/cumka-ryukzak-cinii-633260388','https://yes-tm.com/cumka-ryukzak-criblo-17-20-8cm','https://yes-tm.com/cumka-ryukzak-cvitlo-cinii','https://yes-tm.com/cumka-ryukzak-cvitlo-fioletovii','https://yes-tm.com/cumka-ryukzak-myatna-z-baxromoyu-36-26-11','https://yes-tm.com/cumka-ryukzak-purpurnii-uk-ua','https://yes-tm.com/cumka-ryukzak-yackravo-rozhevii','https://yes-tm.com/cumka-ryukzak-zelenii-uk-ua','https://yes-tm.com/cumka-ryukzak-zolota-19-5-25-11cm','https://yes-tm.com/cumka-shopper-sheeny-38-34-uk-ua','https://yes-tm.com/cumka-shopper-sneakers-38-34-uk-ua','https://yes-tm.com/de-kupiti','https://yes-tm.com/gamanec-harvard-26-12-5','https://yes-tm.com/gamanec-oxford-26-12-5','https://yes-tm.com/gamanec-oxford-rose-24-5-12','https://yes-tm.com/gamanec-smiley-girl-25-12-5','https://yes-tm.com/icshi-krutosantu-na-sajte-yes-novogodnij-onlajn-kvest','https://yes-tm.com/-igry-yes--luchshij-podarok-rebenku-na-novogodnie-prazdniki','https://yes-tm.com/kakie-izmeneniya-zhdut-shkolnikov-i-roditelej-v-novom-uchebnom-godu','https://yes-tm.com/kak-povysit-samoocenku-rebenku-','https://yes-tm.com/kak-stirat-rukzak-sovety-po-uhodu-za-rukzakami','https://yes-tm.com/kak-vybrat-rukzak-v-shkolu-shkolnye-rukzaki-tm-yes','https://yes-tm.com/kak-vyibrat-ryukzak-dlya-pervoklassnika','https://yes-tm.com/konteynery-i-butylki-dlya-vody-yes','https://yes-tm.com/kraftovye-tetradi-yes','https://yes-tm.com/kreida-bila-100-sht-krugla','https://yes-tm.com/kreida-bila-24-sht-krugla','https://yes-tm.com/kreida-kol-orova-krugla-24-sht-maximum-speed','https://yes-tm.com/liniika-100-cm-dlya-doshki','https://yes-tm.com/liniika-40-cm-prozora','https://yes-tm.com/marker-gelevii-6-kol-oriv-24sht','https://yes-tm.com/marker-highlighter-yes-neon-5-kol-oriv','https://yes-tm.com/marker-tekctovii-dvoctoronnii-3-kol-ori','https://yes-tm.com/modnye-rukzaki-2020--2021-kakoj-rukzak-vybrat','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-antilogy','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-balloon','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-bright-star','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-cute','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-fluffy','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-fluffy-391449575','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-happy-smiley','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-heart','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-pineapple','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-rainbow','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-sweet','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-unicorn','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-vland','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-vushy','https://yes-tm.com/nabir-akcecuariv-dlya-shnurkiv-vushy-1120654018','https://yes-tm.com/nabir-dekorativnix-3d-ctikeriv-covushki-100-150-mm','https://yes-tm.com/nabir-dekorativnix-3d-ctikeriv-flowers-100-150-mm','https://yes-tm.com/nabir-dekorativnix-ctikeriv-z-ticnennyam-fol-goyu-pineapple-100-150-mm','https://yes-tm.com/nabir-dekorativnix-ctikeriv-z-ticnennyam-fol-goyu-smile-180-175-mm','https://yes-tm.com/nabir-dekorativnix-ctikeriv-z-ticnennyam-glasses-100-150-mm','https://yes-tm.com/nabir-dekorativnix-ctikeriv-z-ticnennyam-london-140-210mm','https://yes-tm.com/nabir-liniiok-4-predm-liniika-15-cm','https://yes-tm.com/nabir-liniiok-4-predm-liniika-20-cm','https://yes-tm.com/nabir-nakleiok-leather-stikers-1064080056','https://yes-tm.com/nabir-nakleiok-leather-stikers-1596904078','https://yes-tm.com/nabir-nakleiok-leather-stikers-2132759893','https://yes-tm.com/nabir-nakleiok-leather-stikers-737383047','https://yes-tm.com/nabir-nalipok-patch-stiker-banan-vishnya','https://yes-tm.com/nabir-nalipok-patch-stiker-i-do-not-care','https://yes-tm.com/nabir-nalipok-patch-stiker-iedinorig-lav','https://yes-tm.com/nabir-penzlikiv-cintetika-4-sht','https://yes-tm.com/nabir-termo-nalipok-fashion-peep-kavun-burger','https://yes-tm.com/nabir-termo-nalipok-fashion-peep-ochi-pomada','https://yes-tm.com/nozhici-13-cm-dlya-shul-gi','https://yes-tm.com/o-brende','https://yes-tm.com/olivci-24-kol-smiley-world-pink','https://yes-tm.com/oshibki-teper-ne-strashny-s-ruchkoj-pishistiraj-brenda-','https://yes-tm.com/papka-dlya-praci-plact-na-blickavci-z-vnutr-kisheneyu-a4-charming-animals','https://yes-tm.com/penal-cilikonovii-owlsome-21-8-5-3-5-uk-ua','https://yes-tm.com/penzlik-zhivopicnii-eko-poni-no-1','https://yes-tm.com/penzlik-zhivopicnii-eko-poni-no-3','https://yes-tm.com/penzlik-zhivopicnii-eko-poni-no-5','https://yes-tm.com/plactilin-10-kol-street-racing','https://yes-tm.com/plactilin-12-kol-street-racing','https://yes-tm.com/plactilin-7-kol-charming-animals','https://yes-tm.com/plactilin-7-kol-me-to-you','https://yes-tm.com/plactilin-7-kol-oxford','https://yes-tm.com/plactilin-7-kol-smiley-world','https://yes-tm.com/planer-brenda-«yes»tvoj-pomocshnik-№1-','https://yes-tm.com/pochemu-tm-yes-vybiraut-na-protyazhenii-14-let','https://yes-tm.com/pozdravlyaem-vas-s-prazdnikom-poslednego-zvonka-dnem-proshchaniya-so-shkoloy','https://yes-tm.com/pravila-ekspluatacії-rukzakіv-ta-sumok-tm-yes','https://yes-tm.com/remin-poperechnii-blakitnii','https://yes-tm.com/remin-poperechnii-buzkovii','https://yes-tm.com/remin-poperechnii-chervonii','https://yes-tm.com/remin-poperechnii-cinii','https://yes-tm.com/remin-poperechnii-rozhevii','https://yes-tm.com/ruchka-geleva-glitter-6-kol-oriv-pvc','https://yes-tm.com/ryukzak-cportivnii-44-32-5-16','https://yes-tm.com/ryukzak-cumka-lovely-pandas-35-20-34-uk-ua','https://yes-tm.com/ryukzak-cumka-sly-fox-35-20-34-uk-ua','https://yes-tm.com/ryukzak-dityachii-j025-20-5-25-9-5','https://yes-tm.com/ryukzak-dityachii-j100-32-24-14-5-cinii','https://yes-tm.com/ryukzak-dityachii-k-19-robot-24-5-20-11','https://yes-tm.com/ryukzak-dityachii-k-19-unicorn-24-5-20-11','https://yes-tm.com/ryukzak-dityachii-ox-17-j031-26-37-15-5-1256971756','https://yes-tm.com/ryukzak-dityachii-ox-17-j034-25-37-15','https://yes-tm.com/ryukzaki-ta-cumki/rjukzaki-school/vozrast-let/14-18/19-29/','https://yes-tm.com/ryukzak-karkacnii-h-11-unicorn-blue-33-5-26-13-5-uk-ua','https://yes-tm.com/ryukzak-karkacnii-t-33-stalwart-44-5-29-5-14-5-uk-ua','https://yes-tm.com/ryukzak-pidlitkovii-x163-oxford-biryuzovii-47-29-16cm','https://yes-tm.com/ryukzak-shkil-nii-ox-379-40-29-5-12-rozhevii','https://yes-tm.com/ryukzak-s-usb-port','https://yes-tm.com/sestry-s-ryukzaki-yes-2-v-1','https://yes-tm.com/shpil-ki-must-have','https://yes-tm.com/shpil-ki-must-have-2091412656','https://yes-tm.com/shpil-ki-must-have-2091661109','https://yes-tm.com/shpil-ki-must-have-78462278','https://yes-tm.com/shukaj-dіda-moroza-vіd-yes','https://yes-tm.com/skolko-dolzhen-vesit-shkolnyiy-ryukzak','https://yes-tm.com/slime-factory','https://yes-tm.com/spina-rebenka-pod-nadezhnoj-zacshitoj-rukzaka-s-ortopedicheskoj-spinkoj-brenda-«yes»','https://yes-tm.com/stil-novogo-pokoleniya--kollaboraciya-yes-x-andre-tan','https://yes-tm.com/s-yes-byt-zvezdoy-legko','https://yes-tm.com/termosy-yes','https://yes-tm.com/tetradi-kraft-i-novye-dizajnerskie-ruchki-ot-yes','https://yes-tm.com/top5-sportivnyh-sekcij-dlya-detej','https://yes-tm.com/tovary-tm-yes--prosto-nahodka-dlya-princesc-217','https://yes-tm.com/trancportir-dlya-doshki','https://yes-tm.com/trancportir-uk-ua','https://yes-tm.com/trancportir-z-liniikoyu-10-cm','https://yes-tm.com/trikutnik-dlya-doshki','https://yes-tm.com/trikutnik-flyuor-11-cm','https://yes-tm.com/trimach-dlya-pic-ma-l','https://yes-tm.com/trimach-dlya-pic-ma-r','https://yes-tm.com/garantiya','https://yes-tm.com/vstrechayte-eksklyuzivnuyu-novinku-obemnuyu-gravyuru-yes-kids','https://yes-tm.com/yes-citypack', 'https://yes-tm.com/sertifikaciya', 'https://yes-tm.com/rekomendovano-ortopedami');

    private function MakeNode($p_e,$i){
        $s_f = '';
        if ($i==0){
            $s_f = "<url>\r\n";
            $s_f .= "<loc>https://yes-tm.com/</loc>\r\n";
            $s_f .= "<lastmod>" . date("c", strtotime("now +1 hour")) . "</lastmod>\r\n";
            $s_f .= "<changefreq>daily</changefreq>\r\n";
            $s_f .= "<priority>1.0</priority>\r\n";
            $s_f .= "</url>\r\n";
        }else {
            $changefreq = $priority = false;
            switch ($p_e['f']) {
                case 0:
                    $priority = "1.0";
                    $changefreq = "weekly";
                    break;
                case 1:
                    $priority = "1.0";
                    $changefreq = "daily";
                    break;
                /*case 4:
                    $arr = "https://yes-tm.com/" . $p_e['fu'] . ".htm";
                    $priority = "0.5";
                    $changefreq = "weekly";
                    break;
                case 5:
                    $arr = "https://yes-tm.com/news/";
                    $priority = "0.5";
                    $changefreq = "weekly";
                    break;
                case 6:
                    $arr = "https://yes-tm.com/news/" . $p_e['nid'] . "-" . $p_e['fu'] . ".html";
                    $priority = "0.5";
                    $changefreq = "weekly";
                    break;*/
            }
            if($changefreq && $priority){
                $s_f .= "<url>\r\n";
                $link = ( isset( $p_e['t'] ) && $p_e['t'] == 'prod' ) ? $p_e['h'] : $p_e['h'] . '/';
                $s_f .= "<loc>" . $link . "</loc>\r\n";
//                $s_f .= "<xhtml:link rel='alternate' hreflang='ru' href='" . str_replace( 'https://yes-tm.com/', 'https://yes-tm.com/ru/', $p_e['h'] ) . "'/>\r\n";
                $s_f .= "<lastmod>" . date("c", strtotime("now +1 hour")) . "</lastmod>\r\n";
                $s_f .= "<changefreq>" . $changefreq . "</changefreq>\r\n";
                $s_f .= "<priority>" . $priority . "</priority>\r\n";
                $s_f .= "</url>\r\n";

                $notSetUnique = array_unique( static::$notSet );
                $notSetNoSlashUnique = array_unique( static::$notSetNoSlash );

                if ( in_array( $p_e['h'], $notSetUnique ) ) {
                    $index = array_search( $p_e['h'], $notSetUnique );
                    unset($notSetUnique[ $index ]);
                }

                if ( in_array( $p_e['h'], $notSetNoSlashUnique ) ) {
                    $index = array_search( $p_e['h'], $notSetNoSlashUnique );
                    unset($notSetNoSlashUnique[ $index ]);
                }

                $s_f .= "<url>\r\n";
                $s_f .= "<loc>" . str_replace( 'https://yes-tm.com/', 'https://yes-tm.com/ru/', $link ) . "</loc>\r\n";
                $s_f .= "<lastmod>" . date("c", strtotime("now +1 hour")) . "</lastmod>\r\n";
                $s_f .= "<changefreq>" . $changefreq . "</changefreq>\r\n";
                $s_f .= "<priority>" . $priority . "</priority>\r\n";
                $s_f .= "</url>\r\n";

                $ruUrl = str_replace( 'https://yes-tm.com/', 'https://yes-tm.com/ru/', $p_e['h'] );
                if ( in_array( $ruUrl, $notSetUnique ) ) {
                    $index = array_search( $ruUrl, $notSetUnique );
                    unset($notSetUnique[ $index ]);
                }

                if ( in_array( $ruUrl, $notSetNoSlashUnique ) ) {
                    $index = array_search( $ruUrl, $notSetNoSlashUnique );
                    unset($notSetNoSlashUnique[ $index ]);
                }

                static::$notSet = $notSetUnique;
                static::$notSetNoSlash = $notSetNoSlashUnique;
            }
        }
        return $s_f;
    }

    private function MakeSFile(){
        if($this->data){
            $sms = array();
            $url_count = 10000;
            $p_e_c = count($this->data);
            $smps = floor($p_e_c/$url_count)+1;
            for ($s=0;$s<$smps;$s++)
            {
                $s_f = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";
                $s_f .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xmlns:xhtml=\"http://www.w3.org/1999/xhtml\">\r\n";
                $start = $url_count*$s;
                $stop = $url_count*($s+1);
                if ($stop>$p_e_c) $stop = $p_e_c;
                for ($i=$start;$i<$stop;$i++)
                    $s_f .= self::MakeNode($this->data[$i],$i);

                $alterCats = static::$notSet;
                $alterCatsNoSlash = static::$notSetNoSlash;

                foreach( $alterCats as $alterCat ) {
                    $s_f .= "<url>\r\n";
                    $s_f .= "<loc>" . $alterCat . "/</loc>\r\n";
//                    $s_f .= "<xhtml:link rel='alternate' hreflang='ru' href='" . str_replace( 'https://yes-tm.com/', 'https://yes-tm.com/ru/', $alterCat ) . "'/>\r\n";
                    $s_f .= "<lastmod>" . date("c", strtotime("now +1 hour")) . "</lastmod>\r\n";
                    $s_f .= "<changefreq>weekly</changefreq>\r\n";
                    $s_f .= "<priority>0.9</priority>\r\n";
                    $s_f .= "</url>\r\n";

                    $s_f .= "<url>\r\n";
                    $s_f .= "<loc>" . str_replace( 'https://yes-tm.com/', 'https://yes-tm.com/ru/', $alterCat ) . "/</loc>\r\n";
                    $s_f .= "<lastmod>" . date("c", strtotime("now +1 hour")) . "</lastmod>\r\n";
                    $s_f .= "<changefreq>weekly</changefreq>\r\n";
                    $s_f .= "<priority>0.9</priority>\r\n";
                    $s_f .= "</url>\r\n";
                }

                foreach( $alterCatsNoSlash as $alterCatNoSlash ) {
                    $s_f .= "<url>\r\n";
                    $s_f .= "<loc>" . $alterCatNoSlash . "</loc>\r\n";
//                    $s_f .= "<xhtml:link rel='alternate' hreflang='ru' href='" . str_replace( 'https://yes-tm.com/', 'https://yes-tm.com/ru/', $alterCat ) . "'/>\r\n";
                    $s_f .= "<lastmod>" . date("c", strtotime("now +1 hour")) . "</lastmod>\r\n";
                    $s_f .= "<changefreq>weekly</changefreq>\r\n";
                    $s_f .= "<priority>0.8</priority>\r\n";
                    $s_f .= "</url>\r\n";

                    $s_f .= "<url>\r\n";
                    $s_f .= "<loc>" . str_replace( 'https://yes-tm.com/', 'https://yes-tm.com/ru/', $alterCatNoSlash ) . "</loc>\r\n";
                    $s_f .= "<lastmod>" . date("c", strtotime("now +1 hour")) . "</lastmod>\r\n";
                    $s_f .= "<changefreq>weekly</changefreq>\r\n";
                    $s_f .= "<priority>0.8</priority>\r\n";
                    $s_f .= "</url>\r\n";
                }

                $s_f .= "</urlset>\r\n";
                $f_s = "sitemap_yes.xml";//"sitemap_".$s.".xml";
                $sms[] = $f_s;
                if ($h = fopen(DIR_ROOT.$f_s,"w+")){
                    fwrite($h, $s_f);
                    fclose($h);
                }
            }
            if($sms){
                $s_f = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";
                $s_f .= "<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\r\n";
                foreach($sms as $s){
                    $s_f .= "<sitemap><loc>https://yes-tm.com/".$s."</loc><lastmod>".date("c",strtotime("now +1 hour"))."</lastmod></sitemap>\r\n";
                }
                $s_f .= "</sitemapindex>";
                if ($h = fopen(DIR_ROOT."sitemap_index.xml","w+")){
                    fwrite($h, $s_f);
                    fclose($h);
                }
                if ($h = fopen(DIR_ROOT."sitemap.xml","w+")){
                    fwrite($h, $s_f);
                    fclose($h);
                }
            }
        }
    }

}