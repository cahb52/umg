<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Comentario".
 *
 * @property integer $idComentario
 * @property integer $EstadoComentario
 * @property string $DescripcionComentario
 * @property string $TipoComentario
 * @property integer $APid
 *
 * @property ActProy $aP
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Comentario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idComentario', 'EstadoComentario', 'DescripcionComentario', 'TipoComentario', 'APid'], 'required'],
            [['idComentario', 'EstadoComentario', 'APid'], 'integer'],
            [['DescripcionComentario'], 'string', 'max' => 200],
            [['TipoComentario'], 'string', 'max' => 45],
            [['APid'], 'exist', 'skipOnError' => true, 'targetClass' => ActProy::className(), 'targetAttribute' => ['APid' => 'idAct_Proy']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idComentario' => 'Id Comentario',
            'EstadoComentario' => 'Estado Comentario',
            'DescripcionComentario' => 'Descripcion Comentario',
            'TipoComentario' => 'Tipo Comentario',
            'APid' => 'Apid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAP()
    {
        return $this->hasOne(ActProy::className(), ['idAct_Proy' => 'APid']);
    }

    /**
     * @inheritdoc
     * @return ComentarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ComentarioQuery(get_called_class());
    }
}
