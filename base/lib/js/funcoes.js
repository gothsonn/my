function xcall (c,f,d,d2,options) {
	options = options || {};
	options.idbtn = options.ajaxloader || false;
	options.idbtn = options.idajaxloader || '';
	var loader=$('<img src="images/ajax-loader.gif"/>');


	var error=false;

	xajax.call('call', { parameters:[c,f,d,d2],
		onRequest: function() {

			createLoadDialog();
			//oculta o btn e adiciona loading.gif
			if (options.ajaxloader) {
				$(options.idajaxloader).hide().after(loader);
			};

		},
		onFailure: function() {
			error=true;
			createLoadDialog('Erro - Servidor nao responde','erro');
			if (options.ajaxloader) {
				$(options.idajaxloader).show()
				$(loader).remove();
			};
			},
		onComplete: function(){
			if (options.ajaxloader) {
				$(loader).remove();
				$(options.idajaxloader).show();
			};
			if(!error){removeLoadDialog();}
			}
	}); return false;

}

function createLoadDialog (msg,t) {
	var c='bgy';
	if (t=='ok') {
		c='bgg';
	};
	if (t=='erro') {
		c='bgr';
	};

	var str='<div id="load_dialog_body" >';
			str += '<table border="0" cellspacing="0" cellpadding="0" align="center">';
			str += '<tr><td><div class="msg '+c+'">';
			if (msg) {
				str += msg;
			}else{
				str += 'Carregando...';
			};
			str += '</div>';
			str += '<div class="b '+c+'" style="margin:0 1px"></div>';
			str += '<div class="b '+c+'" style="margin:0 2px"></div>';
			str += '</td></tr>';
			str += '</table>';

			str += '</div>';
	if ($('#load_dialog_body').length > 0) {
		removeLoadDialog();
	}

	$('#geral').before(str);
}
function loadImg(id){
	$(id).html('<img src="images/loading.gif" align="absmiddle"/>');
}
function removeLoadDialog(){
	$('#load_dialog_body').remove();
}
/*
msg=Mensagem
t=tipo (e=error,w=warning,c=confirm)
p=prepend to elemento
f=fadeout em segundos
*/
function writeMessage (msg,t,p,f) {
	//alert('s');
		//cria se ele nao existir
		var str='<table style="width:100%;margin-bottom:10px" id="tb_message"><tr><td>'+
				'<div id="div_message" class="message warning" style="display:none">'+
				'<div class="icon"></div>'+
				'<div class="msg"></div>'+
				'<div class="close" onclick="$(\'#div_message\').hide(\'slow\')">X</div>'+
				'</div>'+
				'</td></tr></table>';

		//se existir entao remove para garantir q ele nao exista no lugar incorreto	como por exemplo existe em listar e está com o riwabox aberto e precisa aparecer la
		if ($('#tb_message').length> 0 && p) {
			$('#tb_message').remove();
		};

		if ($('#tb_message').length<1 && p) {
			$('#'+p).before(str);
		};

		var _class='message warning';
		if (t=='c') {
			var _class='message confirm';//()verde
		};
		if (t=='w') {
			var _class='message warning';//()amarelo
		};
		if (t=='e') {
			var _class='message error';//()vermelho
		};

		$('#div_message').attr('class',_class).fadeIn('slow');
		$('#div_message .msg').html(msg);

		if(f){
			f= (f*1000);//multiplica para aplicar em milisegundos
			setTimeout(function(){ $('#div_message').fadeOut('slow'); }, f);
		}


}

//c = class
//fs= funcao de salvar
//fc= funcao de cancelar
//form = nome do formulario
//d = dados adicionais
function formAdd (c,fc,fs,form,d,path) {

	//	$.datepicker.formatDate('dd-mm-yy');
	//disableInputEnter('input');
	if (!path) var path='';

	if ($.browser.msie) {
		var _buttonImage = path + 'images/form/calendar_ie.gif';
	}else{
		var _buttonImage = path + 'images/form/calendar.gif';
	}


	$('#'+form+' .inputTex_calendar').datepicker(
		{showOn: 'both',
		buttonImage: _buttonImage,
		buttonImageOnly: true,
		buttonText: 'Clique para exibir o calend&aacute;rio-',
		showOn: 'button',
		autoSize: true,
		showButtonPanel: true,
		altFormat: 'dd/mm/yy',
		dateFormat: 'dd/mm/yy'
	});


	//replace style
	$('#'+form+' select').each(function(){
		if ($(this).css('display') != 'none' && $(this).attr('disabled') != true && $.browser.msie) {
			$(this).sSelect();
		};

	});


	if (fc) {
		$('#'+form+' #btnFormCancel').bind('click',function(){
			var error=false;

			var f=fc;
			var d=null;
			var d2=null;
			xajax.call('call', { parameters:[c,f,d,d2],
				onRequest: function() {
					createLoadDialog();
					var _c = c.split('.');
					$('#'+form+'#div_message').fadeOut('slow');
				},
				onFailure: function() {
					error=true;
					createLoadDialog('Erro - Servidor nao responde','erro');
				},
				onComplete: function(){
					if(!error){removeLoadDialog();}
				}
			}); return false;
		});
	};
	//fechar riwa box
	$('#'+form+' #btnFormFecharRB').bind('click',function(){
		$().rmRiwaBox();
	});


	$('#'+form+' .salvar > button').bind('click',function(){
		//fecha alguma mensagem q esteja aberto do anterior
		$('#tb_message').remove();
		var error=false;

		var f=fs;
		var d=xajax.getFormValues(form);
		var d2=null;
		xajax.call('call', { parameters:[c,f,d,d2],
			onRequest: function() {
				createLoadDialog();
				$('#'+form+' .salvar > button').html('<u>S</u>alvando&nbsp;<img align="absmiddle" src="images/ajax-loader-line.gif">').attr('disabled','disabled');
				$('#'+form+' #btnFormCancel').attr('disabled','disabled');
				$('#'+form+' #div_message').fadeOut('slow');
				$('#'+form).fadeTo('slow',0.33);
			},
			onFailure: function() {
				error=true;
				createLoadDialog('Erro - Servidor nao responde','erro');
			},
			onComplete: function(){
				$('#'+form+' .salvar > button').html('<u>S</u>alvar&nbsp;<img align="absmiddle" src="images/btn/save2.png">').removeAttr('disabled');
				$('#'+form+' #btnFormCancel').removeAttr('disabled');
				$('#'+form).fadeTo('slow',1);
				if(!error){removeLoadDialog();}
			}
		}); return false;
	});

}