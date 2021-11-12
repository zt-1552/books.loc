<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать книгу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'author',
//            'genre_id',
            [
                'attribute' => 'genre_id',
                'label' => 'Жанр',
                'value' => function($data) {
                    return $data->genre->genre;
                },
            ],
            'pages',
            //'visible',
            [
                'attribute' => 'visible',
                'label' => 'Видимость книг',
                'headerOptions' => ['style' => 'width:10%'],
                'value' => function($data){
                    return $data->visible ? '<span class="text-danger">Скрытая</span>' : '';
                },
                'format' => 'html',
            ],

            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:7%'],
                'header' => 'Действия',
                'template' => '{view} {update} {delete} {clone}',
                'buttons' => [
                    'clone' => function ($url, $model, $key) {

                        //Текст в title ссылки, что виден при наведении
                        $title = \Yii::t('yii', 'clone');

                        $options = [
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0',
                        ];
                        $url = Url::current(['create', 'cloneModel' => $key]);
                        $icon = Html::tag('span', '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="20px" height="20px">    <path d="M12,2C6.477,2,2,6.477,2,12s4.477,10,10,10s10-4.477,10-10S17.523,2,12,2z M16,13h-3v3c0,0.552-0.448,1-1,1h0 c-0.552,0-1-0.448-1-1v-3H8c-0.552,0-1-0.448-1-1v0c0-0.552,0.448-1,1-1h3V8c0-0.552,0.448-1,1-1h0c0.552,0,1,0.448,1,1v3h3 c0.552,0,1,0.448,1,1v0C17,12.552,16.552,13,16,13z"/></svg>', ['class' => "glyphicon glyphicon-plus"]);

                        return Html::a($icon, $url, $options);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
