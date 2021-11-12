<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Books */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="books-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить книгу?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'author',
            [
                'attribute' => 'genre_id',
                'label' => 'Жанр',
                'value' => function($data) {
                    return $data->genre->genre;
                },
            ],
            'pages',
            [
                'attribute' => 'visible',
                'label' => 'Видимость книги',
                'value' =>  $model->visible ? '<span class="text-danger">Скрытая</span>' : '<span class="text-success">Видимая</span>',
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
