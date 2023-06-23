<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Noticias';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Noticias</h1>



    </div>

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
                                    'site/verNoticia',
                                    //'noticia/view',
                                    'idnoticia' => $dato->idnoticia,


                                ],
                                ["class" => "btn btn-primary"]

                            ) ?></div>


                </div>


            <?php };
            ?>


        </div>



    </div>