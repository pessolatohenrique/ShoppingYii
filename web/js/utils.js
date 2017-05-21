function adicionaItemCombo(seletor,texto,valor){
	$(seletor).append($("<option>").text(texto).val(valor));
}