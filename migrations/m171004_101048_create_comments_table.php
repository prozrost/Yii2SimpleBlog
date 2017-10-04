<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m171004_101048_create_comments_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer(),
            'text' => $this->text(),
            'user_id' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('comments');
    }
}
