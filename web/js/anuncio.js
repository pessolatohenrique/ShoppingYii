function fechaAnuncio(){
	var anuncio = $("body").find(".anuncio");
	anuncio.fadeOut(1600,function(){
		anuncio.remove();
	});
}
function atualizaCronometro(){
	var tempo = $(".tempo").text();
	var cronometro = setInterval(function(){
		tempo--;
		$(".tempo").text(tempo);
		if(tempo == 0){
			clearInterval(cronometro);
			fechaAnuncio();
		}
	},1000);

}
$(document).ready(function(){
	$(".btnFecharAnuncio").on("click",fechaAnuncio);
	atualizaCronometro();
});