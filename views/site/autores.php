<?php

use yii\helpers\Html;


?>


<div class="jumbotron">Autores</div>


<div class="row">
    <?php
    foreach ($autores as $autor) {
    ?>
        <div class="col-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title"><?= $autor->nombre ?></h5>

                    <div>
                        <?= Html::img(
                            "@web/imgs/autores/{$autor->foto}",
                            [
                                "class" => 'col-lg-4'

                            ]
                        )
                        ?>
                    </div>

                    <?= Html::a('ver noticias', ['site/autor', 'id' => $autor->id], ['class' => 'btn btn-light']) ?>

                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>