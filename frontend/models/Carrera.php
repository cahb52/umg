<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrera".
 *
 * @property integer $idcarrera
 * @property string $codCarrera
 * @property string $descripicionCarrera
 * @property integer $estadoCarrera
 * @property string $anio
 *
 * @property ActProy[] $actProys
 * @property Ciclo[] $ciclos
 */
class Carrera extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carrera';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcarrera', 'codCarrera', 'descripicionCarrera', 'estadoCarrera', 'anio'], 'required'],
            [['idcarrera', 'estadoCarrera'], 'integer'],
            [['anio'], 'safe'],
            [['codCarrera'], 'string', 'max' => 45],
            [['descripicionCarrera'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcarrera' => 'Idcarrera',
            'codCarrera' => 'Cod Carrera',
            'descripicionCarrera' => 'Descripicion Carrera',
            'estadoCarrera' => 'Estado Carrera',
            'anio' => 'Anio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActProys()
    {
        return $this->hasMany(ActProy::className(), ['carrera_idcarrera' => 'idcarrera']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiclos()
    {
        return $this->hasMany(Ciclo::className(), ['idcarrera' => 'idcarrera']);
    }

    /**
     * @inheritdoc
     * @return CarreraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarreraQuery(get_called_class());
    }
}
