<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ActproySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="act-proy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idAct_Proy') ?>

    <?= $form->field($model, 'NombreActividad') ?>

    <?= $form->field($model, 'DescripcionActividad') ?>

    <?= $form->field($model, 'FechaPublicacion') ?>

    <?= $form->field($model, 'TipoAp') ?>

    <?php // echo $form->field($model, 'EstadoAP') ?>

    <?php // echo $form->field($model, 'RutaArchivo') ?>

    <?php // echo $form->field($model, 'carrera_idcarrera') ?>

    <?php // echo $form->field($model, 'ciclo_idciclo') ?>

    <?php // echo $form->field($model, 'curso_idciclo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
