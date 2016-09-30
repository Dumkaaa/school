<?php

use yii\db\Migration;

/**
 * Handles the creation for table `reply`.
 */
class m160924_081512_create_reply_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%reply}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(10)->notNull()->comment('Id пользователя'),
            'quest_id' => $this->integer(10)->notNull()->comment('Id анкеты'),
            'date' => $this->dateTime()->notNull()->comment('Дата ответа'),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица со списком пользователей\'');

        $this->createIndex('user_id_index', '{{%reply}}', 'user_id');
        $this->createIndex('quest_id_index', '{{%reply}}', 'quest_id');
        $this->addForeignKey('FK_reply_user', '{{%reply}}', 'user_id', '{{%user}}', 'id');
        $this->addForeignKey('FK_reply_quests', '{{%reply}}', 'quest_id', '{{%quests}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%reply}}');
    }
}
