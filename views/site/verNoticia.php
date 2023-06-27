<?php

use yii\helpers\Html;
?>
<div>
    <h4>
        <?= $dato->titular ?></h4>
</div>
<div>
    <?= $dato->textoLargo ?>
</div>
<div>
    <style>
        .rounded-circle {
            height: 40px;
            width: 60px
        }
    </style>
    <?= Html::img(
        "@web/imgs/{$dato->foto}",
        [
            "class" => "col-lg-6"
        ]
    ) ?>
</div>
<div class="col-lg-6 row">

    <?= Html::img(
        "@web/imgs/autores/{$dato->autor0->foto}",
        [
            "class" => "col-lg-1 arc rounded-circle"
        ]
    ) ?>
    <?= $dato->autor0->nombre ?>
</div>

<?= $dato->fecha ?>

<div>
    <?= "Seccion: " . $dato->seccion0->nombre ?>
</div>