<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%projects}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m200205_134035_create_projects_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%projects}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'price' => $this->integer(20)->notNull(),
            'start_date' => $this->string(25)->notNull(),
            'end_date' => $this->string(25)->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-projects-user_id}}',
            '{{%projects}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-projects-user_id}}',
            '{{%projects}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-projects-user_id}}',
            '{{%projects}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-projects-user_id}}',
            '{{%projects}}'
        );

        $this->dropTable('{{%projects}}');
    }
}
