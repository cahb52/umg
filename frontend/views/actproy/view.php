<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Carrera;
use app\models\Ciclo;
use app\models\Cusos;

/* @var $this yii\web\View */
/* @var $model app\models\ActProy */

$this->title = $model->idAct_Proy;
$this->params['breadcrumbs'][] = ['label' => 'Act Proys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-proy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idAct_Proy], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idAct_Proy], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php 

function mifuncion($tipo) {
    if($tipo == 1) { $tipo = "Actividad";  } else { $tipo = "Proyecto";}
    return $tipo;
}
function estado($tipo) {
    if($tipo == 1) { $tipo = "Habilitado";  } else { $tipo = "Inhabilitado";}
    return $tipo;
}
function carrera($idcarrera){
    $carrera = "";
    $carrera = Carrera::find()
                ->select('descripicionCarrera')
                ->where('idcarrera = :idcarrera', [':idcarrera'=>$idcarrera])
                ->one();
    return $carrera;
}
function ciclo ($idciclo){
    $ciclo = "";
    $ciclo = Ciclo::find()
            //->select('nombreCiclo')
            ->where('idciclo = :idciclo',[':idciclo'=>$idciclo])
            ->one();
    return $ciclo;
}
function cursociclo ($idcursociclo){
    $cursociclo = "";
    $ciclo = cusos::find()
            ->select('nombreCurso')
            ->where('idcusos = :idcursos',[':idcursos'=>$idcursociclo])
            ->one();
    return $ciclo;
}

?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idAct_Proy',
            'NombreActividad',
            'DescripcionActividad:ntext',
            'FechaPublicacion',
            [                      // the owner name of the model
            'label' => 'TipoAp',
            'value' => mifuncion($model->TipoAp),
                
        ],
            [                      // the owner name of the model
            'label' => 'Estado de la aplicacion',
            'value' => estado($model->EstadoAP),
                
        ],
            'RutaArchivo',
             [                      // the owner name of the model
            'label' => 'Carrera',
            'value' => carrera($model->carrera_idcarrera)['descripicionCarrera'],
                
        ],
        [                      // the owner name of the model
            'label' => 'Ciclo',
            'value' => ciclo($model->ciclo_idciclo)['nombreCiclo'],
                
        ],
        [                      // the owner name of the model
            'label' => 'Curso',
            'value' => cursociclo($model->curso_idciclo)['nombreCurso'],
                
        ],
        ],
    ]) ?>

</div>
