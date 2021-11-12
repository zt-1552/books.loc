<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Books */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genre_id')->dropdownList(
        \common\models\Genre::find()->select(['genre', 'id'])->indexBy('id')->column(),
        ['prompt'=>'Выберите название жанра'])->label('Жанр'); ?>

    <?= $form->field($model, 'pages')->textInput() ?>

    <?= $form->field($model, 'visible')->checkbox(array('value'=>1, 'uncheckValue'=>0)) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
