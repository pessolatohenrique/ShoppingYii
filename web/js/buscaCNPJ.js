		function buscaPorCNPJ(cnpj,captcha,cookie){
			var action = "<?php echo  Yii::$app->request->baseUrl;?>/index.php?r=categoria/pesquisa";
			var dados = {cnpj:cnpj,captcha:captcha,cookie:cookie};
			$.post(action,dados,function(data){
				console.log(data);
			});
			// var dados = {"cnpj":cnpj};
			// $.post("buscaCNPJ.php",dados,function(data){
			// 	console.log("Requisição funcionou");
			// });
		}
		function disparaEventosCNPJ(){
			$("#validaCNPJ").on("click",function(){
				var cnpj = $("#cnpj").val();
				var captcha = $("#captcha").val();
				var cookie = $("#cookie").val();
				buscaPorCNPJ(cnpj,captcha,cookie);
			});
		}
		$(document).ready(function(){
			disparaEventosCNPJ();
		})