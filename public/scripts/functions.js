
/**
 *  Função para envio de ajax
 *  
 */
function Ajax(settings)
{
	//objeto que vai receber dados a serem enviados
	var dados = {};
	//link que vai receber a requisição ajax
	if(!settings.link)
        {
		settings.link = "index.php?option=com_stoledo_ajax";
        }
        
        if(settings.tmpl)
            settings.link += "&tmpl="+settings.tmpl;
        if(settings.acao)
            settings.link += "&acao="+settings.acao;
        if(settings.moduleId)
            settings.link += "&moduleId="+settings.moduleId;
        if(settings.modulePosition)
            settings.link += "&modulePosition="+settings.modulePosition;
        
	//referencia para uso de preloader
	if(!settings.preloader)
		settings.preloader = "#preloader";
	//função chamada quando se recebe um retorno do ajax
	if(!settings.callback)
		settings.callback     = function(dado)
				{

				};
	//evento chamado quando se inicia um evento ajax
	if(!settings.ajaxStart)
		settings.ajaxStart     = function()
				{  
					$(settings.preloader).show();  
				};
	//evento chamado quando se termina um evento ajax
	if(!settings.ajaxStop)
		settings.ajaxStop     = function()
				{  
					$(settings.preloader).hide();  
				};

	this.setDado = function(nome, valor)
	{
		dados[nome] = valor;
	}

	$('body').ajaxStart
	(
		function()
		{
			settings.ajaxStart();
		 }
	);

	this.enviar = function()
	{
		$.post
		(
			settings.link, 
			dados,
			settings.callback
		);
	}

	$('body').ajaxStop(
		function()
		{
			settings.ajaxStop();
		}
	);

}


/**
 * Função para só permitir números nos inputs dos forms
 * 
 * Ex:
 *            <input maxlength="9" onkeydown="javascript:return numeros(event); " onkeypress="formatar(this, '#####-###'); " name="cep">
 */
function numeros(event){
   var tecla = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;

   if ((tecla >= 48 && tecla <= 57) || (tecla >= 96 && tecla <= 105) || tecla == 8 ||  tecla == 9){
       return  true;
   }else{
       return  false;
   }
}

/**
 * Formata o número double em formato real
 *
 */
function formatReal(num) {

   x = 0;

   if(num<0) {
      num = Math.abs(num);
      x = 1;
   }
   if(isNaN(num)) num = "0";
      cents = Math.floor((num*100+0.5)%100);

   num = Math.floor((num*100+0.5)/100).toString();

   if(cents < 10) cents = "0" + cents;
      for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
         num = num.substring(0,num.length-(4*i+3))+'.'
               +num.substring(num.length-(4*i+3));
   ret = num + ',' + cents;
   if (x == 1) ret = ' - ' + ret;
   
   return ret;
}


/**
 * Função para mascara de entrada de dados
 * 
 * 
 * Ex;
 *            <input maxlength="9" onkeydown="javascript:return numeros(event); " onkeypress="formatar(this, '#####-###'); "  name="cep">
 */
function formatar(src, mask) {
	   var i = src.value.length;
	   var saida = mask.substring(0,1);
	   var texto = mask.substring(i)
	   if (texto.substring(0,1) != saida) {
	      src.value += texto.substring(0,1);
	   }
}

/**
 *  Função para limpar campo de texto
 *  
 *   Ex::  <input type="text" onfocus="limpaCampo(this)" onblur="originalCampo(this, 'Seu nome')" value="Seu Nome" name="nomePratoDia">
 */
function limpaCampo(object)
{
	$(object).val('');
}

/**
 * Função para colocar texto em um campo se ele for fazio
 * 
 *   Ex::  <input type="text" onfocus="limpaCampo(this)" onblur="originalCampo(this, 'Seu nome')" value="Seu Nome" name="nomePratoDia">
 */
 function originalCampo(object, value)
 {
	 if(!$(object).val())
	{
		 $(object).val(value);
	}
 }
 
 /**
  * Função para validação de email
  * 
  * Ex:: $.validateEmail('fulano@email.com.br');
  * 
  */
 $.validateEmail = function (email)
{
	er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
	if(er.exec(email))
		return true;
	else
		return false;
};



/**
 * Extensão do jquery para carregar o site por partes
 * 
 * var map =
	{
		0 : {pg:'pagina_0', fn:main_pg_0},
		1 : {pg:'pagina_1', fn:main_pg_1},
		2 : {pg:'pagina_9', fn:main_pg_9},
		3 : {pg:'pagina_2', fn:main_pg_2},
		4 : {pg:'pagina_4', fn:main_pg_4},
		5 : {pg:'pagina_5', fn:main_pg_5},
		6 : {pg:'pagina_3', fn:main_pg_3},
		7 : {pg:'pagina_6', fn:main_pg_6},
		8 : {pg:'pagina_7', fn:main_pg_7},
		9 : {pg:'pagina_8', fn:main_pg_8}
	};

	$.modules(map, 'index.php?option=com_content&view=category&layout=blog&id=2&Itemid=101&');
 
 
	var map =
	{
		0 : {pg:'docentes', fn:function(){alert("asdf")}}
	};

	$.modules(map, '');
 
 
 * 
 */
(function($){
	$.extend
	({
		    module: function(id)
		    {
				function addHtml(dado)
				{
					$('body').html(dado);
				}

				var ajax = new Ajax
				(
					{
						callback   :addHtml
					}
				);

					ajax.setDado('moduleId', id);	
					ajax.enviar();
		    },
		    modules: function(map, link)
		    {
					var map         = map;
					var tamanho = -1;
					var i                 = 0;

					$.each(map, function(key, value) { 
						tamanho++;
					});

					if(tamanho >= 0)
						enviar();

					function addHtml(dado)
					{

						//$('#meio').append(dado);
						$('#'+map[i].pg).html(dado);
						if(map[i].fn)
							map[i].fn();
						i++;
						enviar();
					}


					function enviar()
					{
						if(i <= tamanho)
						{
							var ajax = new Ajax
							(
								{
									link : link,
									callback  :addHtml
								}
							);
							ajax.setDado('modulePosition', map[i].pg);
							ajax.enviar();
						}
						//else
						//	main();
					}
		    }
	});
})($);


/* Menu Mobile */
$(document).ready(function(){
	$(".btn-menu-mob").click(function() {
		// alert("abrir");
		$("#menu-mob").animate({right: "0"});
	});

	$("#menu-mob .fechar").click(function(){
		$("#menu-mob").animate({right: "-100%"});
	});
});
