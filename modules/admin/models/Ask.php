<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%ask}}".
 *
 * @property integer $id
 * @property string $label
 * @property integer $quest_id
 * @property string $type
 *
 * @property Quests $quest
 * @property AskReplies[] $askReplies
 * @property Reply[] $replies
 */
class Ask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ask}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'quest_id', 'type'], 'required'],
            [['quest_id'], 'integer'],
            [['label', 'type'], 'string', 'max' => 255],
            [['quest_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quests::className(), 'targetAttribute' => ['quest_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Название вопроса',
            'quest_id' => 'Id анкеты',
            'type' => 'Тип вопроса',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuest()
    {
        return $this->hasOne(Quests::className(), ['id' => 'quest_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAskReplies()
    {
        return $this->hasMany(AskReplies::className(), ['ask_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Reply::className(), ['id' => 'reply_id'])->viaTable('{{%ask_replies}}', ['ask_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AskQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AskQuery(get_called_class());
    }
}
