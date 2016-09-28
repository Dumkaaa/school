<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%ask}}".
 *
 * @property integer $id
 * @property string $label
 * @property integer $quest_id
 * @property string $type
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
     * @inheritdoc
     * @return AskQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AskQuery(get_called_class());
    }
}
