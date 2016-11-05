<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ImagenActvidad".
 *
 * @property integer $idImagenesActvidades
 * @property string $DescripcionImagen
 * @property string $RutaImagen
 * @property integer $actividad_idactividad
 *
 * @property ActProy $actividadIdactividad
 */
class ImagenActvidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ImagenActvidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idImagenesActvidades', 'DescripcionImagen', 'RutaImagen', 'actividad_idactividad'], 'required'],
            [['idImagenesActvidades', 'actividad_idactividad'], 'integer'],
            [['DescripcionImagen', 'RutaImagen'], 'string', 'max' => 45],
            [['actividad_idactividad'], 'exist', 'skipOnError' => true, 'targetClass' => ActProy::className(), 'targetAttribute' => ['actividad_idactividad' => 'idAct_Proy']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idImagenesActvidades' => 'Id Imagenes Actvidades',
            'DescripcionImagen' => 'Descripcion Imagen',
            'RutaImagen' => 'Ruta Imagen',
            'actividad_idactividad' => 'Actividad Idactividad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividadIdactividad()
    {
        return $this->hasOne(ActProy::className(), ['idAct_Proy' => 'actividad_idactividad']);
    }

    /**
     * @inheritdoc
     * @return ImagenActvidadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImagenActvidadQuery(get_called_class());
    }
}
