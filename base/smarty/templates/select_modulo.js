$(function(){
	$("select[name=modulo] option").each(function(){
		$(this).click(function(){
			var modulo= $(this).val();
			if(modulo ==0){
				alert('Selecione um módulo válido');
			}else if(modulo =='cliente'){
				xcall('index.cliente', 'home');
			}else if(modulo =='armazem'){

			}else if(modulo =='enderecamento'){

			}

		})
	})
});