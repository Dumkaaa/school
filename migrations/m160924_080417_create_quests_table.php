<?php

use yii\db\Migration;

/**
 * Handles the creation for table `quests`.
 */
class m160924_080417_create_quests_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%quests}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull()->comment('Название анкеты'),
            'description' => $this->string(255)->notNull()->comment('Описание анкеты'),
            'active' => $this->smallInteger(1)->notNull()->comment('Активность анкеты'),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица со списком пользователей\'');
        $this->createIndex('title_index', '{{%quests}}', 'title');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%quests}}');
    }
}
