<div id="yak5">
<?php echo $description_9; ?>
<script>
$(document).ready(function(){
    $(".open_modal").click(function(){
        $("#modal").modal();
    });
	
	$("#contactForm").submit(function(event){
    // отменяет отправку данных формы
    event.preventDefault();
    submitForm();
	});
});
</script>
<div id="modal" class="modal-div open" style="display: none;">
			<div class="question">
        <a  title="Закрити" class="close" data-dismiss="modal">X</a>
        <div role="form" class="wpcf7" id="wpcf7-f637-o1" lang="ru-RU" dir="ltr">
<div class="screen-reader-response"></div>
<form  role="form" id="contactForm" data-toggle="validator" class="shake">
<div style="display: none;">
</div>
<p class="help-form">Онлайн помощь</p>
<p> <span class="wpcf7-form-control-wrap text-422"><input id="name" type="text" name="text-422" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required name-text" aria-required="true" aria-invalid="false" placeholder="Ваше имя" required data-error="NEW ERROR MESSAGE"></span> </p>
<p><span class="wpcf7-form-control-wrap tel-693"><input id="tel" type="tel" name="tel-693" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel phone-for-form" aria-required="true" aria-invalid="false" placeholder="Ваш номер" required data-error="NEW ERROR MESSAGE"></span></p>
<p><span class="wpcf7-form-control-wrap textarea-711"><textarea id="message" name="textarea-711" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required text-message" aria-required="true" aria-invalid="false" placeholder="Ваше сообщение" required data-error="NEW ERROR MESSAGE"></textarea></span> </p>
<p><input type="submit"  value="Отправить" class="wpcf7-form-control wpcf7-submit btn-for-contact-form"></p>
<div id="msgSubmit" class="h3 text-center hidden"></div>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>   
      </div>
		</div>
<div id="modal1" class="modal-div open">
<div class="container">
<a title="Закрыть" class="close" data-dismiss="modal">X</a>
<div class="row">
		<?php if($locations){
				foreach($locations as $location){
				if($location["comment"] != ''){
				$linkes = explode("|", $location["comment"]);
					foreach($linkes as $linke){
				?>
					<div class="col-md-3 col-sm-6 col-xs-12">
<div class="shop_wrap">
<h3 class="shop_link">
 <a rel="nofollow" href="<?php echo $linke;?>"><?php  echo explode('/',explode('//',$linke)[1])[0];
 //$adr = pathinfo($linke); if(strlen($adr["dirname"]) > 7){ echo $adr["dirname"];}else{ echo $adr["basename"];}  /*if(isset(parse_url($linke)['host'])){ echo parse_url($linke)['host'];}else{echo pathinfo($linke)["dirname"];}*/?></a>
</h3>
<p class="shop_city">
<?php echo $location['name']?>
</p>
<img src="/image/city_logo.png" alt="" class="shop_logo">
</div>
</div>
				<?php	}
					}
				}
			}?>
</div>
</div>
</div>		
</div>

	<!-- Modal HTML -->

<div id="myModal" class="modal fade">
    <div class="modal-dialog">

        <div class="modal-content">
<a title="Закрыть" class="close" data-dismiss="modal">X</a>
         
            <div class="modal-body">
              <form id="send-form">
  <div class="form-group">
    <input id="exampleInputName" name="form_name" type="text" class="form-control" placeholder="<?php echo $tab_02; ?>">
  </div>
    <div class="form-group">
    <input id="exampleInputEmail" type="text" class="form-control" placeholder="<?php echo $tab_03; ?>">
  </div>
    <div class="form-group">
    <textarea id="exampleInputText" name="form_mail" class="form-control" placeholder="<?php echo $tab_04; ?>" rows="3"></textarea>
  </div>
  
  <button type="submit" class="button_shop2"><a><?php echo $tab_05; ?></a></button>
</form>

            </div>

           

        </div>

    </div>
<script>
    
    $( "#send-form" ).submit(function( event ) {
      event.preventDefault();
        var name = $("#exampleInputName"),
        email = $("#exampleInputEmail"),
        text = $("#exampleInputText"),
        id = "<?php echo $product_id; ?>";
        
        if(name.val().length < 2){
          name.css("background-color", "#ffd3d7");  
        }
        if(email.val().length < 2){
          email.css("background-color", "#ffd3d7");  
        }
        if(text.val().length < 2){
          text.css("background-color", "#ffd3d7");  
        }
        
        if(name.val().length > 2 && email.val().length > 2 && text.val().length > 2){
                $.ajax({
                    url: 'index.php?route=information/contact/oneclick',
                    type: 'post',
                    data: 'name=' + name.val() + '&email=' + email.val() + '&text=' + text.val() + '&id=' + id ,
                    dataType: 'json',
                    success: function(json) {
                        if (json['success']) {
                            $("#myModal .modal-content").html(json['success']);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            	
		}else{
            console.log("error");     
        }
        
    });
    
    
    

</script>
</div>
		
			
</body>
<script type="text/javascript" src="catalog/view/javascript/validator.min.js"></script>
<script type="text/javascript" src="catalog/view/javascript/form-scripts.js"></script>
</html>