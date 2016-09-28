<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%reply}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $quest_id
 * @property string $date
 */
class Reply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%reply}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'quest_id', 'date'], 'required'],
            [['user_id', 'quest_id'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Id пользователя',
            'quest_id' => 'Id анкеты',
            'date' => 'Дата ответа',
        ];
    }

    /**
     * @inheritdoc
     * @return ReplyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReplyQuery(get_called_class());
    }
}
