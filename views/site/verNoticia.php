<?php

use yii\helpers\Html;
?>
<div>
    <?= $dato->titular ?>
</div>
<div>
    <?= $dato->textoLargo ?>
</div>
<div>
    <?= Html::img(
        "@web/imgs/{$dato->foto}",
        [
            "class" => "col-lg-6"
        ]
    ) ?>
</div>
<div>
    <?= $dato->autor ?> - <?= $dato->fecha ?>
</div>
<div>
    <?= $dato->seccion ?>
</div>