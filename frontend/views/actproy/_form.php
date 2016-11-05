<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Carrera;
use app\models\Ciclo;
use app\models\Cusos;
use yii\helpers\ArrayHelper;
use kartik\datetime\DateTimePicker;
use kartik\file\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ActProy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="act-proy-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ; ?>

    <?= $form->field($model, 'NombreActividad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DescripcionActividad')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'FechaPublicacion')->widget(DateTimePicker::classname(), [
    'options' => ['placeholder' => 'Fecha de publicación ...'],
    'language'=>'es',
    'pluginOptions' => [
        'startDate' => '2016-Mar-01',
        'todayHighlight' => true,
        'autoclose' => true
    ]
]);
     ?>
    <?= $form->field($model, 'TipoAp')->dropDownList(['1'=>'Actividad','2'=>'Proyecto']) ?>

    <?= $form->field($model, 'EstadoAP')->dropDownList(['1'=>'Activo','2'=>'No Activo'],['prompt'=>'Seleccione una opción']) ?>


<?php
function crear($model){

echo '<label class="control-label">Agregar Adjunto</label>';
echo FileInput::widget([
    'model' => $model,
    'attribute' => 'imagen',
    'options' => ['multiple' => false],
    //'pluginOptions' => [
      //  'uploadUrl' => Url::to(['/uploads/']),
       // 'uploadExtraData' => [
        //    'album_id' => 20,
         //   'cat_id' => 'Nature'
        //],
        //'maxFileCount' => 10
    //]
]);

}
function actualizar($model,$form){
echo $form->field($model,'checkbox')->checkBox()->label('Cambiar imagen'); 
echo $form->field($model, 'RutaArchivo')->textInput();

echo '<label class="control-label">Agregar Adjunto</label>';
echo FileInput::widget([
    'model' => $model,
    'attribute' => 'imagen',
    'options' => ['multiple' => false],
]);
}
echo $model->isNewRecord ? crear($model) : actualizar($model,$form);

?>

    <?php 
    $modelo2 = Carrera::find()->all();
    $listData=ArrayHelper::map($modelo2,'idcarrera','descripicionCarrera');
    echo $form->field($model, 'carrera_idcarrera')->dropDownList($listData,['prompt'=>'Seleccionar']); 

    $modelo2 = Ciclo::find()->all();
    $listData=ArrayHelper::map($modelo2,'idciclo','nombreCiclo');
    echo $form->field($model, 'ciclo_idciclo')->dropDownList($listData,['prompt'=>'Seleccionar']); 

    $modelo2 = Cusos::find()->all();
    $listData=ArrayHelper::map($modelo2,'idcusos','nombreCurso');
    echo $form->field($model, 'curso_idciclo')->dropDownList($listData,['prompt'=>'Seleccionar']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
