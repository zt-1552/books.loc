<?php

use yii\widgets\ListView;

?>
<div class="row">

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_list',
        'options' => ['class' => 'list-view row'],
        'pager' => [
            'maxButtonCount' => 3, // максимум 3 кнопки
            'options' => ['class' => 'pagination pagination-sm m-0 float-right'], // прикручиваем собственный дизайн не касаясь основного.
            'linkContainerOptions' => ['class' => 'page-item'],
            'linkOptions' => ['class' => 'page-link'],
            'disabledPageCssClass' => ['class' => 'page-link'],
        ],
    ]);
    ?>

</div>