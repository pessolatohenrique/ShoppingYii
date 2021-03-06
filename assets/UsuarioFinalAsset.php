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
		'css/reset.css', 'https://fonts.googleapis.com/css?family=Open+Sans', 'css/main.css','css/main_tablet.css','css/main_phone.css','css/main_smallphone.css',
		'css/lojas.css', 'css/lojas_tablet.css','css/lojas_phone.css','css/lojas_smallphone.css','css/filmes_adm.css','css/cinema.css', 'css/gastronomia.css', 'css/gastronomia_phone.css','css/cinema_tablet.css','css/cinema_phone.css','css/contato.css', 'css/anuncio.css',
		'css/formulario.css'
	];
	public $js = [
		'https://use.fontawesome.com/b17cc3a995.js','js/utils.js','js/anuncio.js', 'js/abasCinema.js','js/gastronomia.js','js/lojas.js','js/ajustes_video.js'
	];
	public $depends = [
		'yii\web\JqueryAsset'
	];
}