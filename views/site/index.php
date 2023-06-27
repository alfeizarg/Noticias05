<?php

use yii\helpers\Html;

?>

<div class="noticia-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <h1 class="display-4"><?= isset($titulo) ? $titulo : "Noticias"   ?></h1>

    <div class="body-content">
        <div class="row">
            <?php
            foreach ($datos as $dato) {
            ?>


                <div class="col-lg-4 mb-3">
                    <h5><?= $dato->titular  ?></h5>

                    <p><?= $dato->textoCorto  ?></p>

                    <p><?= $dato->foto ?></p>


                    <div>


                        <?= Html::img(
                            "@web/imgs/{$dato->foto}",

                            [
                                "class" => 'col-lg-8'

                            ]


                        )

                        ?>

                    </div>


                    <div><?= Html::a(
                                "Ver Noticia completa",
                                [
                                    //'noticia/view',
                                    //'site/viewNoticia',
                                    'site/verNoticia',
                                    'idnoticia' => $dato->idnoticia,

                                ],

                                ["class" => "btn btn-primary"]

                            ) ?></div>


                </div>


            <?php };
            ?>