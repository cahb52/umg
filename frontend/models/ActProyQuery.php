<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ActProy]].
 *
 * @see ActProy
 */
class ActProyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ActProy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ActProy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
