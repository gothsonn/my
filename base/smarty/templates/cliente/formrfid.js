$(function(){
	$("form[id=crfid]").submit(function(){
		xcall('index.cliente', 'inserir', xajax.getFormValues('crfid'));
		setTimeout( function(){
			$("#form_oc").hide();
		}, 3000);
		return false;
	})
});