<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m160924_074640_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->comment('Имя пользователя'),
            'lastname' => $this->string(255)->notNull()->comment('Фамилия пользователя'),
            'email' => $this->string(255)->notNull()->comment('Почта/Логин пользователя'),
            'password' => $this->string(255)->notNull()->comment('Пароль пользователя'),
        ], 'ENGINE=InnoDb DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT \'Таблица со списком пользователей\'');

        $this->createIndex('email_index', '{{%user}}', 'email');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
