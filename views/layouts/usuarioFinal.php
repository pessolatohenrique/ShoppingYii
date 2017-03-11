<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\UsuarioFinalAsset;
UsuarioFinalAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <header>
        <h1>
            <a href="index.php">
                <img src="img/morumbi_shopping.png" alt="Logotipo do Shopping">
            </a>
        </h1>
        <nav class="menu-principal">
            <ul class="servicos">
                <li><a href="cinema.php">Cinema</a></li>
                <li><a href="gastronomia.php">Gastronomia</a></li>
                <li><a href="lojas.php">Lojas</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li>
                    <span class="icone_localizado">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </span>
                    <a href="#">Localizado em<br>
                        <span class="localizacao-texto">São Paulo</span>
                    </a>
                </li>
            </ul>
        </nav>
        <nav class="menu-login">
            <ul>
                <li>
                    <a href="#">Login</a>
                </li>
                <li><a href="#">Busca</a></li>
            </ul>
        </nav>
    </header>
    <main class="container">
        <?= $content ?>
    </main>
    <footer class="rodape">
        <div class="referencias">
            <ul>
                <li><a href="#">Cinema</a></li>
                <li><a href="#">Gastronomia</a></li>
                <li><a href="#">Lazer</a></li>
                <li><a href="#">Lojas</a></li>
            </ul>
        </div>
        <div class="sobreShopping">
            <ul>
                <li><a href="#">Comodidades</a></li>
                <li><a href="#">Eventos</a></li>
                <li><a href="#">Promoções</a></li>
                <li><a href="#">O Shopping</a></li>
                <li><a href="#">A Rede</a></li>
            </ul>
        </div>
        <div class="trabalheConosco">
            <ul>
                <li><a href="#">Dicas e Novidades</a></li>
                <li><a href="#">Mapa</a></li>
                <li><a href="#">Trabalhe Conosco</a></li>
                <li><a href="#">Doações realizadas</a></li>
                <li><a href="#">Estatísticas</a></li>
            </ul>
        </div>
        <div class="newsLetter">
            <h4>Newsletter</h4>
            <p>
                Recebe novidades diariamente!
                <br><br><br>
                <a href="#" class="linkBotao">Cadastrar</a>
            </p>
            <div class="social">
                <h4>Redes Sociais</h4>
                <ul>
                    <li>
                        <a href="http://pessolatohenrique.esy.es/" target="_blank" data-tooltip="Acesse o meu site!">
                            <i class="fa fa-code fa-3x" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/pessolatohenrique" target="_blank" data-tooltip="Acesse o meu Github!">
                            <i class="fa fa-github fa-3x" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://br.linkedin.com/in/henrique-pessolato-436aba6a" target="_blank" data-tooltip="Acesse o meu Linkedin!">
                            <i class="fa fa-linkedin fa-3x" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
