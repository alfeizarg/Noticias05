<?php

use yii\helpers\Html;


?>
<div class="row">
    <?php
    foreach ($secciones as $seccion) {
    ?>
        <div class="col-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title"><?= $seccion->nombre ?></h5>

                    <div>
                        <?= Html::img(
                            "@web/imgs/secciones/{$seccion->foto}",
                            [
                                "class" => 'col-lg-8'

                            ]
                        )
                        ?>
                    </div>

                    <?= Html::a('ver noticias', ['site/seccion', 'id' => $seccion->id], ['class' => 'btn btn-light']) ?>

                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>