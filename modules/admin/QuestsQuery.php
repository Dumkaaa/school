<?php

namespace app\modules\admin;

/**
 * This is the ActiveQuery class for [[Quests]].
 *
 * @see Quests
 */
class QuestsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Quests[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Quests|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
