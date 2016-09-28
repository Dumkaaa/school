<?php

use yii\db\Migration;

/**
 * Handles the creation for table `ask`.
 */
class m160924_081007_create_ask_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%ask}}', [
            'id' => $this->primaryKey(),
            'label' => $this->string(255)->notNull()->comment('Название вопроса'),
            'quest_id' => $this->integer(10)->notNull()->comment('Id анкеты'),
            'type' => $this->string(255)->notNull()->comment('Тип вопроса'),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица со списком пользователей\'');

        $this->createIndex('quest_id_index', '{{%ask}}', 'quest_id');
        $this->createIndex('label_index', '{{%ask}}', 'label');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%ask}}');
    }
}
