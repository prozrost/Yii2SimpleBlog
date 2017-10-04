<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m171004_100626_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string(50),
            'text' => $this->text(),
            'image' => $this->string(255),
            'user_id' => $this->integer(),
            'created_at' => $this->date(),
            'comments_on' => $this->smallInteger()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('post');
    }
}
