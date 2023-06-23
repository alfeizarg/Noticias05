<?php

use yii\helpers\Html;

$this->title = 'Noticias';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Noticias</h1>


    </div>

    <div class="col-lg-4 mb-3">
        <p><?= $datos->seccion  ?></p>


        <h5><?= $datos->titular  ?></h5>

        <p><?= $datos->textoCorto  ?></p>

        <div class="body-content">
            <div class="row">

                <div>

                    <?= Html::img(
                        "@web/imgs/{$dato->foto}",

                        [
                            "class" => 'col-lg-8'

                        ]


                    )



                    ?>
                </div>

                <p><?= $datos->textoLargo ?></p>

            </div>

        </div>