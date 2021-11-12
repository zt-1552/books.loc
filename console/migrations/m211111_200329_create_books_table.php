<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m211111_200329_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->notNull(),
            'author'=>$this->string()->notNull(),
            'genre_id'=>$this->integer()->notNull(),
            'pages'=>$this->integer()->unsigned()->notNull(),
            'visible'=>$this->boolean()->defaultValue(0),
        ]);

        // add foreign key for table `genre`
        $this->addForeignKey(
            'fk-books-genre_id',
            'books',
            'genre_id',
            'genre',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
    }
}
