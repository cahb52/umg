<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ActProy */

$this->title = 'Create Act Proy';
$this->params['breadcrumbs'][] = ['label' => 'Act Proys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-proy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
