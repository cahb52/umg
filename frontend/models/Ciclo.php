<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciclo".
 *
 * @property integer $idciclo
 * @property string $nombreCiclo
 * @property integer $estadoCiclo
 * @property integer $idcarrera
 *
 * @property ActProy[] $actProys
 * @property AlumnoColaboracion[] $alumnoColaboracions
 * @property Carrera $idcarrera0
 * @property Cusos[] $cusos
 */
class Ciclo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ciclo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreCiclo', 'estadoCiclo', 'idcarrera'], 'required'],
            [['estadoCiclo', 'idcarrera'], 'integer'],
            [['nombreCiclo'], 'string', 'max' => 45],
            [['idcarrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['idcarrera' => 'idcarrera']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idciclo' => 'Idciclo',
            'nombreCiclo' => 'Nombre Ciclo',
            'estadoCiclo' => 'Estado Ciclo',
            'idcarrera' => 'Idcarrera',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActProys()
    {
        return $this->hasMany(ActProy::className(), ['ciclo_idciclo' => 'idciclo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnoColaboracions()
    {
        return $this->hasMany(AlumnoColaboracion::className(), ['idciclo' => 'idciclo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcarrera0()
    {
        return $this->hasOne(Carrera::className(), ['idcarrera' => 'idcarrera']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCusos()
    {
        return $this->hasMany(Cusos::className(), ['idciclo' => 'idciclo']);
    }

    /**
     * @inheritdoc
     * @return CicloQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CicloQuery(get_called_class());
    }
}
