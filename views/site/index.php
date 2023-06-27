<?php

/** @var yii\web\View $this */


use yii\helpers\Html;

$this->title = 'Noticias';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h3 class="display-4"><?= isset($titulo) ? $titulo : "Noticias" ?></h3>
    </div>

    <div class="body-content">
        <div class="row">
            <?php
            foreach ($datos as $dato) {
                echo $this->render("_noticia", [
                    "dato" => $dato
                ]);
            }
            ?>
        </div>
    </div>
</div>