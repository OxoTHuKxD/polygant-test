<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_log`.
 */
class m170203_134359_create_user_log_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%user_log}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'sign_on' => $this->dateTime(),
            'sign_off' => $this->dateTime()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_log}}');
    }
}
