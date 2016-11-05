<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ActProy */

$this->title = 'Update Act Proy: ' . $model->idAct_Proy;
$this->params['breadcrumbs'][] = ['label' => 'Act Proys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAct_Proy, 'url' => ['view', 'id' => $model->idAct_Proy]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="act-proy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
