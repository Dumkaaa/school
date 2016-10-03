<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%quests}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $active
 *
 * @property Ask[] $asks
 * @property Reply[] $replies
 */
class Quests extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%quests}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'active'], 'required'],
            [['active'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название анкеты',
            'description' => 'Описание анкеты',
            'active' => 'Активность анкеты',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsks()
    {
        return $this->hasMany(Ask::className(), ['quest_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReplies()
    {
        return $this->hasMany(Reply::className(), ['quest_id' => 'id']);
    }

    /**
     * @param $asks
     */
    /*public function setAsks($asks)
    {
        $this->populateRelation('asks', $asks);
    }*/


    /**
     * @param bool $true
     * @param array $changedAttributes
     */
   /* public function afterSave($true, $changedAttributes)
    {
        parent::afterSave($true, $changedAttributes);

        $relatedRecords = $this->getRelatedRecords();
        if (isset($relatedRecords['asks'])) {
            foreach ($relatedRecords['asks'] as $ask) {
                $this->link('asks', $ask);
            }
        }
    }*

    /**
     * @inheritdoc
     * @return QuestsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuestsQuery(get_called_class());
    }
}
