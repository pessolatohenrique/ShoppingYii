<?php 
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Busca por CNPJ</title>
</head>
<body>
	<img src="data:image/png;base64,<?php echo $params['captchaBase64']; ?>" /><br />
	<?php $form = ActiveForm::begin([
        'action' => Url::base()."/index.php?r=categoria/pesquisa",
        'id' => 'formulario'
    ])?>
		<label for="cnpj">CNPJ</label>
	    <input type="text" name="cnpj" id="cnpj">
	    <label for="captcha">Captcha</label>
	    <input type="text" name="captcha" id="captcha"/>
	    <input type="hidden" name="cookie" id="cookie" value="<?php echo $params['cookie']; ?>">
	    <button type="button" id="validaCNPJ">Valida CNPJ</button>
	    <input type="submit" />
	<?php ActiveForm::end() ?>
</body>
</html>
