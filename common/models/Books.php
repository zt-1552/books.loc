<?php


namespace common\models;

use common\models\db\Books as baseBooks;

class Books extends baseBooks
{

    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                [['pages'], 'number', 'min' => 1, 'max' => 999, 'tooSmall' => '{attribute} должно быть не менее 1' , 'tooBig' => '{attribute} должно быть не более 999'],
            ]
        );
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'author' => 'Автор',
            'genre_id' => 'Жанр',
            'pages' => 'Страниц',
            'visible' => 'Скрыть книгу',
        ];
    }

}