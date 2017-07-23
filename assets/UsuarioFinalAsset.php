<?php
namespace app\assets;
use yii\web\AssetBundle;
/**
 * @author Henrique Pessolato
 * @version 2.0
 * Chamada de arquivos CSS e JS com páginas para o usuário final
 */
class UsuarioFinalAsset extends AssetBundle{
	public $basePath = "@webroot";
	public $baseUrl = "@web";
	public $css = [
		'css/reset.css', 'https://fonts.googleapis.com/css?family=Open+Sans', 'css/main.css',
		'css/lojas.css', 'css/filmes_adm.css','css/cinema.css', 'css/gastronomia.css', 'css/contato.css', 'css/anuncio.css',
		'css/formulario.css'
	];
	public $js = [
		'https://use.fontawesome.com/b17cc3a995.js','js/utils.js','js/anuncio.js', 'js/abasCinema.js','js/gastronomia.js','js/lojas.js'
	];
	public $depends = [
		'yii\web\JqueryAsset'
	];
}