/**
	*adiciona uma etique visual no painel de subcategorias
	*@param: categoria_id: ID da categoria relacionada
	*@param: subcategoria_nome: String a ser salva, com o nome da subcategoria
*/
function adicionaSubcategoria(categoria_id,subcategoria_nome){
	var action = "index.php?r=subcategoria/adiciona";
	var params = {"categoria_id":categoria_id,"nome":subcategoria_nome};
	$.post(action,params,function(data){
		if(data == '999'){
			alert("Subcategoria já existente! Por favor verifique");
		}
		$("#modalAddSubcategoria").modal('hide');
	}).error(function(){
		alert("Erro ao adicionar subcategoria! Contate o desenvolvedor!");
	})
}
function adicionaEtiqueta(id,nome,link){
	var painel = $(link).parent();
	console.log(painel);
	var elementoUL = painel.find("ul");
	var elementoLI = $("<li>");
	var icone = $("<i>").addClass("fa").addClass("fa-times").attr("aria-hidden",true);
	var span = $("<span>").text(nome);
	var hidden = $("<input>").attr("type","hidden").attr("name","subcategoria_id").attr("id","subcategoria_id").val(id);
	elementoLI.append(hidden);
	elementoLI.append(span);
	elementoUL.prepend(elementoLI);
	console.log(elementoUL.html());
}
/*adiciona no servidor uma categoria para um produto.
Exemplo: "Eletrodoméstico"
Essa categoria será, conforme uso do site, vinculada a uma loja*/
function adicionaCategoriaProduto(categoria_nome){
	var action = "index.php?r=categoria_produto/create";
	var dados = {"categoria_nome":categoria_nome};
	$.post(action,dados,function(data){
		adicionaItemCombo("#categoria_id",categoria_nome,data)
		$("#modalCategoria").modal('hide');
	}).error(function(){
		alert("Erro ao adicionar categoria. Contate o desenvolvedor!");
	})
}
/*adiciona subcategorias na combobox*/
function percorreSubcategorias(vetor){
	$("#subcategoria_vinculo option").remove();
	if(vetor == "" || vetor == null){
		alert("Não existe subcategorias vinculadas a esta categoria!");
	}
	$.each(vetor,function(chave,valor){
		adicionaItemCombo("#subcategoria_vinculo",valor.nome,valor.id);
	});
}
/*busca todas as subcategorias relacionadas a uma categoria.
Exemplo: todas as subcategorias da categoria "Celular e Telefone"*/
function buscaSubcategorias(categoria_id){
	var action = "index.php?r=subcategoria/lista&categoria_id="+categoria_id;
	var dados = {};
	$.getJSON(action,dados,function(data){
		percorreSubcategorias(data);
	}).error(function(){
		alert("Erro ao buscar subcategorias. Contate o desenvolvedor!");
	})
}
/*adiciona um painel de categoria, dinamicamente via jQuery*/
function adicionaPainelCategoria(){
	var categoria_nome = $("#categoria_id option:selected").text();
	var section = $(".categorias_produtos");
	var panel = $("<div>").addClass("panel").addClass("panel-primary");
	var panel_heading = $("<div>").addClass("panel-heading").text(categoria_nome);
	var panel_body = $("<div>").addClass("panel-body").text("Sem subcategorias vinculadas");
	panel.append(panel_heading);
	panel.append(panel_body);
	section.prepend(panel);
}
/**
	*realiza uma requisição para o servidor, vinculando uma categoria a uma loja
	*exemplo: a loja Saraiva terá a categoria "Livros"
	*@param loja_id: ID da loja
	@param categoria_id: ID da categoria
*/
function vinculaLojaCategoria(loja_id,categoria_id){
	var url_ajax = "index.php?r=categoria_produto/vincula_categoria";
	var dados = {"loja_id":loja_id,"categoria_id":categoria_id};
	$.post(url_ajax,dados,function(data){
		adicionaPainelCategoria();
	}).error(function(){
		alert("Erro ao realizar requisição. Contate o desenvolvedor!");
	})
}
/**
	exclui o vínculo entre loja e categoria.
	*Exemplo: a loja Saraiva não venderá mais a categoria "Papelaria"
	*@param loja_id: ID da loja
	*@param categoria_id: ID da categoria
*/
function excluiVinculo(loja_id,categoria_id,link){
	var url_ajax = "index.php?r=categoria_produto/delete";
	var dados = {"loja_id":loja_id,"categoria_id":categoria_id};
	$.post(url_ajax,dados,function(data){
		var painel = $(link).parent().parent();
		painel.fadeOut(700,function(){
			painel.remove();
		})
	}).error(function(){
		alert("Erro ao realizar requisição. Contate o desenvolvedor!");
	})
}
/**
	*realiza o vínculo entre loja e subcategoria
	*exemplo: a loja Saraiva terá a subcategoria "Literatura estrangeira"
	*@param loja_id: ID da loja
	*@param subcategoria_id: ID da subcategoria
*/
function vinculaSubcategoriaLoja(loja_id,subcategoria_id,link){
	var action = "index.php?r=subcategoria/create";
	var dados = {"loja_id":loja_id,"subcategoria_id":subcategoria_id};
	$.post(action,dados,function(data){
		$("#modalSubcategoria").modal('hide');
		var subcategoria_nome = $("#subcategoria_vinculo option:selected").text();
		adicionaEtiqueta(subcategoria_id,subcategoria_nome,link);
	}).error(function(){
		alert("Erro ao realizar requisição. Contate o desenvolvedor!");
	})
}
function mainSubcategoria(){
	var link_painel = "";
	$("#vincular_categoria").on("click",function(){
		var loja_id = $("#loja_id").val();
		var categoria_id = $("#categoria_id").val();
		vinculaLojaCategoria(loja_id,categoria_id);
	});
	$(".linkModalSub").on("click",function(){
		link_painel = $(this);
	});
	$("#salvar_dialog").on("click",function(){
		var categoria_nome = $("#categoria_dialog").val();
		adicionaCategoriaProduto(categoria_nome);
	});
	$(".excluirVinculo").on("click",function(event){
		event.preventDefault();
		var link = $(this);
		var loja_id = $("#loja_id").val();
		var categoria_id = $(this).siblings("#categoria_painel_id").val();
		excluiVinculo(loja_id,categoria_id,link);
	});
	$(".minimizarPainel").on("click",function(event){
		event.preventDefault();
		var link = $(this);
		minimizaPainel(link);
	});
	$("#categoria_vinculo").on("change",function(){
		var categoria_id = $(this).val();
		buscaSubcategorias(categoria_id);
	});
	$("#salvar_dialog_sub").on("click",function(){
		var link = $(this);
		var loja_id = $("#loja_id").val();
		var subcategoria_id = $("#subcategoria_vinculo option:selected").val();
		vinculaSubcategoriaLoja(loja_id,subcategoria_id,link_painel);
	});
	$("#salvar_dialog_sub_add").on("click",function(){
		var categoria_id = $("#categoria_vinculo_add").val();
		var subcategoria_nome = $("#subcategoria_vinculo_add").val();
		adicionaSubcategoria(categoria_id,subcategoria_nome);
	});
}
$(document).ready(function(){
	mainSubcategoria();
});