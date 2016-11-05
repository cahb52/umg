<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ImagenActvidad]].
 *
 * @see ImagenActvidad
 */
class ImagenActvidadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ImagenActvidad[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ImagenActvidad|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
