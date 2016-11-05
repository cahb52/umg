<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "Act_Proy".
 *
 * @property integer $idAct_Proy
 * @property string $NombreActividad
 * @property string $DescripcionActividad
 * @property string $FechaPublicacion
 * @property integer $TipoAp
 * @property integer $EstadoAP
 * @property string $RutaArchivo
 * @property integer $carrera_idcarrera
 * @property integer $ciclo_idciclo
 * @property integer $curso_idciclo
 *
 * @property Carrera $carreraIdcarrera
 * @property Ciclo $cicloIdciclo
 * @property Cusos $cursoIdciclo
 * @property Comentario[] $comentarios
 * @property ImagenActvidad[] $imagenActvidads
 */

class ActProy extends \yii\db\ActiveRecord
{
    public $checkbox;
    public $imagen;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Act_Proy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NombreActividad', 'DescripcionActividad', 'FechaPublicacion', 'TipoAp', 'carrera_idcarrera', 'ciclo_idciclo', 'curso_idciclo'], 'required'],
            [['DescripcionActividad'], 'string'],
            [['FechaPublicacion'], 'safe'],
            [['TipoAp', 'EstadoAP', 'carrera_idcarrera', 'ciclo_idciclo', 'curso_idciclo'], 'integer'],
            [['NombreActividad'], 'string', 'max' => 45],
            [['RutaArchivo'], 'string', 'max' => 150],
            [['imagen'],'file','skipOnEmpty'=>true,'extensions'=>'png,jpg,gif,pdf,xls,xlsx,doc,docx,ppt,pptx'],
            [['carrera_idcarrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['carrera_idcarrera' => 'idcarrera']],
            [['ciclo_idciclo'], 'exist', 'skipOnError' => true, 'targetClass' => Ciclo::className(), 'targetAttribute' => ['ciclo_idciclo' => 'idciclo']],
            [['curso_idciclo'], 'exist', 'skipOnError' => true, 'targetClass' => Cusos::className(), 'targetAttribute' => ['curso_idciclo' => 'idcusos']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAct_Proy' => 'Id Act  Proy',
            'NombreActividad' => 'Nombre Actividad',
            'DescripcionActividad' => 'Descripcion Actividad',
            'FechaPublicacion' => 'Fecha Publicacion',
            'TipoAp' => 'Tipo Aplicación',
            'EstadoAP' => 'Estado de la aplicación',
            'RutaArchivo' => 'Ruta del Archivo',
            'carrera_idcarrera' => 'Carrera',
            'ciclo_idciclo' => 'Ciclo',
            'curso_idciclo' => 'Curso',
            'imagen'=>'Cargar imagen o PDF',
            'checkbox'=>'',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarreraIdcarrera()
    {
        return $this->hasOne(Carrera::className(), ['idcarrera' => 'carrera_idcarrera']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCicloIdciclo()
    {
        return $this->hasOne(Ciclo::className(), ['idciclo' => 'ciclo_idciclo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursoIdciclo()
    {
        return $this->hasOne(Cusos::className(), ['idcusos' => 'curso_idciclo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['APid' => 'idAct_Proy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagenActvidads()
    {
        return $this->hasMany(ImagenActvidad::className(), ['actividad_idactividad' => 'idAct_Proy']);
    }

    /**
     * @inheritdoc
     * @return ActProyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActProyQuery(get_called_class());
    }

    public function upload(){
        if($this->validate()){
            $this->imagen->saveAs('uploads/'.$this->imagen->basename.'.'.$this->imagen->extension);
            return true;
        } else {
            return false;
        }

    }
}
