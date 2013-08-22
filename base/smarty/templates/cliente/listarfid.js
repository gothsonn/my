$(function(){
	$('#form_listar .geraTabelaRelatorio .editar').each(function(){
		$(this).append('<img src="images/btn/edit.png"/>');
		var _id = $(this).attr('rel');
		$(this).click(function(){
			$("#form_oc").show();
			xcall('index.cliente','formrfid', _id,_id);
		})
	});
	$('#form_listar .geraTabelaRelatorio .deletar').each(function(){
		$(this).append('<img src="images/btn/close2.png"/>').css("cursor", "pointer");
		var _id = $(this).attr('rel');
		$(this).click(function(){
			if(confirm("Deseja Realmente Apagar o RFID de Número "+_id+" ?")){
				xcall('index.cliente','deletar', _id);
				alert("RFID excluido com sucesso!");
			}
		})
	});
	$('#btnNavFirst, #btnNavBward, #btnNavFward, #btnNavLast').unbind('click').click(function() {
		xcall('{$class}', 'listar', '', $(this).attr('rel'), { 'ajaxloader': true, 'idajaxloader': $(this) });
	});

})