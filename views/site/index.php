<?php

use yii\helpers\Html;

?>



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



                <div><a href="#">Ver noticia completa</a></div>

                <div><?= Html::a("Ver Noticia completa", [
                            //'noticia/view',
                            'site/verNoticia',
                            'idnoticia' => $dato->idnoticia
                        ]) ?></div>


            </div>


        <?php };
        ?>