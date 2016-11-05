<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Ciclo]].
 *
 * @see Ciclo
 */
class CicloQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Ciclo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Ciclo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
