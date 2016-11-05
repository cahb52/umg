<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cusos".
 *
 * @property integer $idcusos
 * @property string $codigoCurso
 * @property string $nombreCurso
 * @property integer $idciclo
 * @property integer $estadoCurso
 *
 * @property ActProy[] $actProys
 * @property CursoCatedratico[] $cursoCatedraticos
 * @property Ciclo $idciclo0
 * @property Planificacion[] $planificacions
 */
class Cursos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cusos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigoCurso', 'nombreCurso', 'idciclo', 'estadoCurso'], 'required'],
            [['idciclo', 'estadoCurso'], 'integer'],
            [['codigoCurso', 'nombreCurso'], 'string', 'max' => 45],
            [['idciclo'], 'exist', 'skipOnError' => true, 'targetClass' => Ciclo::className(), 'targetAttribute' => ['idciclo' => 'idciclo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcusos' => 'Idcusos',
            'codigoCurso' => 'Codigo Curso',
            'nombreCurso' => 'Nombre Curso',
            'idciclo' => 'Idciclo',
            'estadoCurso' => 'Estado Curso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActProys()
    {
        return $this->hasMany(ActProy::className(), ['curso_idciclo' => 'idcusos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoCatedraticos()
    {
        return $this->hasMany(CursoCatedratico::className(), ['idcurso' => 'idcusos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdciclo0()
    {
        return $this->hasOne(Ciclo::className(), ['idciclo' => 'idciclo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanificacions()
    {
        return $this->hasMany(Planificacion::className(), ['idcurso' => 'idcusos']);
    }

    /**
     * @inheritdoc
     * @return CusosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CusosQuery(get_called_class());
    }
}
