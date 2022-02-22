<?
$YES_PICTERE_PATH = "catalog/product/";

//--- site TOP ------------------------------------------------------------------------------------------------------------------------------------------------------------
echo "<br> Подключение к базе сайта ТОП";
$connection=false;
$hostname="localhost";
$dbName="top-kanz";
$username="data_collector";
$password= "hor4Feixeitoyepeijohgaecoofoor";
if ($username and $password) {$connection= @mysql_connect($hostname,$username,$password);} 
if (!$connection) {echo "<br><br>Не прошло подключение к базе 1 "; exit;}
mysql_select_db($dbName);


echo "<br>ТОП: получение данных по картинкам";
$query="SELECT * from ps_image /*where id_product in (531471, 531460)*/ order by id_product, cover desc"; 
$result=mysql_query($query) or die(mysql_error()); 

echo "<br>ТОП: обработка данных по картинкам";
$topimages=array();
$old=0;
while ($productimage = mysql_fetch_array($result, MYSQL_BOTH)) {
	$id = $productimage['id_product'];
	$im = $productimage['id_image'];
	if (!$im) continue;
	
	if ($id<>$old) {
		if ($old) {$topimages[$old]=$images;}
		$images=array();
		$images[] = 0;
		$old=$id;
	}
	$images[] = $im;
}
$topimages[$id]=$images;
echo "<br>ТОП: получено товаров".count($topimages);

echo "<br><br>Проверка картинок по товару сайта YES";

echo "<br> Подключение к базе сайта YES";
$connection=false;
$hostname="localhost";
$dbName="yes_tm";
$username="yes_tm_dev";
$password= "X45%ajt7";
if ($username and $password) {$connection= @mysql_connect($hostname,$username,$password);} 
if (!$connection) {echo "<br><br>Не прошло подключение к базе "; exit;}
mysql_select_db($dbName);
$query="SELECT p.product_id, p.sku, p.image FROM oc_product p WHERE p.status=1 /*and p.product_id=467*/ /*LIMIT 5*/"; 
$result=mysql_query($query) or die(mysql_error()); 

echo "<br>Проверка картинок по товарам...";

while ($product = mysql_fetch_array($result, MYSQL_BOTH)) {
	if (!array_key_exists($product[sku], $topimages)){
		echo "<br>  - $product[sku] - пропуск, т.к. нет картинок в базе ТОП";
		continue;
	}
	$top=$topimages[$product[sku]];
	if ($top[1]=="") {
		echo "<br>  - $product[sku] - пропуск (1), т.к. нет картинок в базе ТОП";
		continue;
	}

	//проверка основной картинки
	$imagefile = GETPICTURENAME($product['image']);
	if ($imagefile <> $top[1]) {
		if (checkfile($top[1])){
			echo "<br>  - $product[sku] - ЗАПИСЬ основной картинки $top[1]";
			$query="UPDATE oc_product p SET p.image=\"$YES_PICTERE_PATH$top[1].jpg\" WHERE p.product_id=$product[product_id]"; 
			$r=mysql_query($query) or die(mysql_error()); 
			if (!$r) echo "<br>  !!!!! $product[sku] - ошибка записи (INSERT) картинки $top[1]";
		} else {echo "<br>  !!!!! $product[sku] - ошибка поиска картинки $top[1]";};
		$top[1]=0;
	} else {
		$top[1]=0;
	}

	//проверка дополнительных картинок
	$query1="SELECT * FROM oc_product_image i WHERE i.product_id = $product[product_id] order by sort_order"; 
	$result1=mysql_query($query1) or die(mysql_error()); 
	while ($yesimage = mysql_fetch_array($result1, MYSQL_BOTH)) {
		if ($yesimage['image']=="") {
			echo "<br>  - $product[sku] - удалить пустую запись IMAGE (1) $yesimage[product_image_id]";
			$query="DELETE FROM oc_product_image i WHERE i.product_image_id = $yesimage[product_image_id]"; 
			$r=mysql_query($query) or die(mysql_error()); 
			if (!$r) echo "<br>  !!!!! $product[sku] - ошибка удаления (DELETE) картинки $yesimage[product_image_id]";
			continue;
		}

		$imagefile = GETPICTURENAME($yesimage['image']);
		if ($imagefile=="") {
			echo "<br>  - $product[sku] - удалить пустую запись IMAGE (2) $yesimage[product_image_id]";
			$query="DELETE FROM oc_product_image i WHERE i.product_image_id = $yesimage[product_image_id]"; 
			$r=mysql_query($query) or die(mysql_error()); 
			if (!$r) echo "<br>  !!!!! $product[sku] - ошибка удаления (DELETE) картинки $yesimage[product_image_id]";
			continue;
		}
		
		//Проверка нужна ли эта картинка
		$ff=array_search($imagefile, $top);
		if ($ff==0){
			echo "<br>  - $product[sku] - удалить запись IMAGE $yesimage[product_image_id]";
			$query="DELETE FROM oc_product_image WHERE product_image_id = $yesimage[product_image_id]"; 
			$r=mysql_query($query) or die(mysql_error()); 
			if (!$r) echo "<br>  !!!!! $product[sku] - ошибка удаления (DELETE) картинки $yesimage[product_image_id]";
		} else {
			$top[$ff]=0;
		}
	}
	
	//копирование и создание нужных картинок
	foreach($top as $imagefile) {
		if ($imagefile==0) continue;
		if (checkfile($imagefile)){
			echo "<br>  - $product[sku] - ЗАПИСЬ картинки $imagefile";
			$query="INSERT INTO oc_product_image (product_id, image) VALUES ($product[product_id], \"$YES_PICTERE_PATH$imagefile.jpg\")"; 
			$r=mysql_query($query) or die(mysql_error()); 
			if (!$r) echo "<br>  !!!!! $product[sku] - ошибка создания (INSERT) картинки $imagefile";
		} else {echo "<br>  !!!!! $product[sku] - ошибка поиска картинки $imagefile";};
	}

}
echo "<br><br>Завершено";

function checkfile($filename){
	$dir="$_SERVER[DOCUMENT_ROOT]/image/catalog/product/";
	$fullfilename = "$dir$filename.jpg";
	if (file_exists($fullfilename)) return true;
	
	$filefrom = "http://www.top.dp.ua/img/p/".implode("/", str_split($filename))."/$filename.jpg";
	echo "<br>   - копирование файла $filefrom";
	if (copy($filefrom, $fullfilename)) return true; else return false;
}

function GETPICTURENAME($imagefile){
	//получим имяфайла картинки
	$PictereName="";
	if ($imagefile=="") return $PictereName;
	$pos1=strrpos($imagefile, "/");
	$pos2=strrpos($imagefile, ".");
	if ($pos1>0&&$pos2>0){
		$PictereName=substr($imagefile, $pos1+1, $pos2-$pos1-1);
	}
	return $PictereName;
}

/*
while ($image = mysql_fetch_array($result, MYSQL_BOTH)) {
	echo "<br>$image[id_product] $image[id_image] $image[cover]";
	$filename = "$image[id_image]";
	$filepath = "/img/p/";
	$filefullname = "$filepath".implode("/", str_split($filename))."/$filename.jpg";
	
	if (!file_exists("$_SERVER[DOCUMENT_ROOT]$filefullname")) {
		echo "$image[id_product]\r\n";
	}
	
}*/
?>