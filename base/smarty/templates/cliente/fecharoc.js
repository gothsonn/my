$(function(){
	$("form[name=rfid_form]").submit(function(){
		if($("#rfid").val().length > 0){
			$("#div_message").remove();
			$("#form_oc").show();			
			xcall('index.cliente', 'formrfid', xajax.getFormValues('rfid_form'));
		}else{
			alert("O Campo RFID deve ser preenchido!");
		}
		return false;
	})
});