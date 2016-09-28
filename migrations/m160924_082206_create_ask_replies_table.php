<?php

use yii\db\Migration;

/**
 * Handles the creation for table `ask_replies`.
 */
class m160924_082206_create_ask_replies_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%ask_replies}}', [
            'id' => $this->primaryKey(),
            'ask_id' => $this->integer(10)->notNull()->comment('Id вопроса'),
            'reply_id' => $this->integer(10)->notNull()->comment('Id ответа'),
            'value' => $this->text()->notNull()->comment('Ответ пользователя'),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица с ответами на вопросы\'');

        $this->createIndex('ask_reply_index', '{{%ask_replies}}', ['ask_id', 'reply_id'], true);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%ask_replies}}');
    }
}
