<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css', 'css/custom.css','css/filmes_adm.css','https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css'
    ];
    public $js = [
        'https://use.fontawesome.com/b17cc3a995.js','js/geral.js','js/utils.js','js/buscaCNPJ.js','js/gastronomia.js','js/lojas.js','js/subcategoria.js','js/filmes.js','js/genero.js','js/distribuidora.js',
        'js/bootstrap.min.js','https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset'
    ];
}
