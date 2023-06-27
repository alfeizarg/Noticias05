<?php

use yii\helpers\Html;
?>
<div class="col-lg-4 mb-3">
    <h5><?= $dato->titular ?></h5>
    <br>
    <p><?= $dato->textoCorto ?></p>
    <br>
    <div><?= Html::img(
                "@web/imgs/{$dato->foto}", // ruta  + nombre
                [
                    "class" => 'col-lg-8'
                ] // atributos html
            )
            ?></div>
    <br>
    <div><?= Html::a(
                "Ver noticia completa", // texto del enlace
                [
                    //'site/viewnoticia', // controlador/accion
                    'site/verNoticia', // controlador/accion
                    'idnoticia' => $dato->idnoticia // parametro a enviar por URL
                ],
                [
                    "class" => "btn btn-primary" // atributos
                ]
            ) ?></div>
</div>