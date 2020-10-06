<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m200204_134901_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(32)->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'fio' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->insert('{{%user}}', [
            'username' => 'admin',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'fio' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'created_at' => strtotime("now"),
            'updated_at' => strtotime("now"),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
