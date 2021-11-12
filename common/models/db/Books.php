<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property int $genre_id
 * @property int $pages
 * @property int|null $visible
 *
 * @property Genre $genre
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'author', 'genre_id', 'pages'], 'required', 'message' => 'Поле "{attribute}" должно быть заполнено'],
            [['genre_id'], 'integer'],
            [['visible'], 'boolean'],
            [['pages'], 'integer', 'message' => 'Страниц должно быть целое число'],
            [['title', 'author'], 'string', 'max' => 255],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::class, 'targetAttribute' => ['genre_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::class, ['id' => 'genre_id']);
    }
}
