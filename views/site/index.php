<?php
use yii\helpers\Url;
$this->title = 'Shopping | Página Inicial';
?>
<div class="anuncio">
    <button class="btnFecharAnuncio">X</button>
    <p>
        <em>O anúncio será fechado em <span class="tempo">10</span> segundos</em>
    </p>
    <figure>
        <img src="img/saraiva_logotipo.jpg" alt="Logotipo da Saraiva">
    </figure>
    <p>
        Conheça a nova loja da livraria Saraiva. <br>
        No mês de inauguração, promoções para os box de
        <strong>Desventuras em Série</strong> e <strong>Harry Potter</strong>
    </p>
</div>

<section class="lojas">
    <h2>Nossas Lojas</h2>
    <a href="lojas.php" class="verTodas space-content">Ver Todas</a>
    <ul>
        <li>
            <a href="#">
                <figure>
                    <img src="img/tvz.png" alt="Imagem da Loja TVZ" class="primeiroDestaque">
                </figure>
            </a>
        </li>           
        <li>
            <a href="#">
                <figure>
                    <img src="img/umPlus.png" alt="Imagem da Loja 1+1" class="fotoDestaque">
                </figure>
            </a>
        </li>           
        <li>
            <a href="#">
                <figure>
                    <img src="img/opaque.png" alt="Imagem da Loja Opaque" class="fotoDestaque">
                </figure>
            </a>
        </li>                   
        <li>
            <a href="#">
                <figure>
                    <img src="img/cns.png" alt="Imagem da Loja CNS" class="fotoDestaque">
                </figure>
            </a>
        </li>
        <li>
            <a href="#">
                <figure>
                    <img src="img/saraiva.png" alt="Imagem da Loja Saraiva" class="ultimaLoja">
                </figure>
            </a>
        </li>
    </ul>
</section>
<section class="cinema">
    <h2>Cinema</h2>
    <a href="cinema.php" class="verTodas space-content">Ver Filmes</a>
    <ul>
        <li>
            <a href="#">
                <figure>
                    <img src="img/filme1.png" alt="Filme: Beleza Oculta">
                    <figcaption>Beleza Oculta</figcaption>
                </figure>
            </a>
        </li>                   
        <li>
            <a href="#">
                <figure>
                    <img src="<?=Url::base()?>/arquivos/homemaranhadevoltaaolar.jpg" alt="Filme: Homem-Aranha">
                    <figcaption>Homem-Aranha</figcaption>
                </figure>
            </a>
        </li>        
        <li>
            <a href="#">
                <figure>
                    <img src="<?=Url::base()?>/arquivos/carros3.jpg" alt="Filme: Carros 3">
                    <figcaption>Carros 3</figcaption>
                </figure>
            </a>
        </li>                   
        <li>
            <a href="#">
                <figure>
                    <img src="<?=Url::base()?>/arquivos/piratas_caribe.jpg" alt="Filme: Piratas do Caribe">
                    <figcaption>Piratas do Caribe</figcaption>
                </figure>
            </a>
        </li>
                <li>
            <a href="#">
                <figure>
                    <img src="<?=Url::base()?>/arquivos/mulher_maravilha.jpg" alt="Filme: Mulher Maravilha">
                    <figcaption>Mulher Maravilha</figcaption>
                </figure>
            </a>
        </li>
    </ul>
</section>
<section class="gastronomia">
    <h2>Gastronomia</h2>
    <a href="gastronomia.php" class="verTodas space-content">Ver Todas</a>
    <ul>
        <li>
            <a href="#">
                <figure>
                    <img src="img/gastronomia1.jpg" alt="The Fifties">
                    <figcaption>The Fifties</figcaption>
                </figure>
            </a>
        </li>                   
        <li>
            <a href="#">
                <figure>
                    <img src="img/gastronomia2.jpg" alt="PizzaHut">
                    <figcaption>PizzaHut</figcaption>
                </figure>
            </a>
        </li>                   
        <li>
            <a href="#">
                <figure>
                    <img src="img/gastronomia3.jpg" alt="Outback">
                    <figcaption>Outback</figcaption>
                </figure>
            </a>
        </li>                   
        <li class="ultimaGastronomia">
            <a href="#">
                <figure>
                    <img src="img/gastronomia4.jpg" alt="Little Tokio">
                    <figcaption>Little Tokio</figcaption>
                </figure>
            </a>
        </li>
    </ul>
</section>
<section class="contato">
    <div class="endereco">
        <h3>Endereço</h3>
        <p>
            Alameda dos Designers, 504, Bairro HTML<br>
            São Caetano do Sul,SP<br>
            CEP: 01235-900<br>
            <a href="#">Como Chegar</a>
        </p>
    </div>
    <div class="funcionamento">
        <h3>Funcionamento</h3>
        <p>
            De Segunda à sabado: das 09:00 às 23:00<br>
            Domingos e feriados: das 14:00 às 23:00<br><br>
            <a href="#">Todos os horários</a>
        </p>
    </div>
    <div class="telefones">
        <h3>Telefones</h3>
        <p>
            Geral: (11)4234-4351; (11)3254-3254<br>
            Achados e Perdidos: (11)4351-3453<br><br>
            <a href="#">Outros contatos</a>
        </p>
    </div>
</section>