function mostraFilmesAba(event){
	var seletorDia = $(".menuNavCinema li > a");
	$(seletorDia).on("click",function(event){
		event.preventDefault();
		var diaSplit = $(this).text().split(" ");
		var diaSemana = diaSplit[1];
		console.log(diaSemana);
		$(".filmesCartaz").css("display","none");
		$("#filme"+diaSemana).css("display","block");
		seletorDia.parent().removeClass("abaAtiva");
		$(this).parent().addClass("abaAtiva");
	});
}
$(document).ready(function(){

	mostraFilmesAba();
});
