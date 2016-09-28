<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ask_replies".
 *
 * @property integer $id
 * @property integer $ask_id
 * @property integer $reply_id
 * @property string $value
 */
class AskReplies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ask_replies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ask_id', 'reply_id', 'value'], 'required'],
            [['ask_id', 'reply_id'], 'integer'],
            [['value'], 'string'],
            [['ask_id', 'reply_id'], 'unique', 'targetAttribute' => ['ask_id', 'reply_id'], 'message' => 'The combination of Id вопроса and Id ответа has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ask_id' => 'Id вопроса',
            'reply_id' => 'Id ответа',
            'value' => 'Ответ пользователя',
        ];
    }

    /**
     * @inheritdoc
     * @return AskRepliesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AskRepliesQuery(get_called_class());
    }
}
