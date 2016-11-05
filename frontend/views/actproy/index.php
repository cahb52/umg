<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActproySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actividades o proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-proy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear una actividad o proyecto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idAct_Proy',
            'NombreActividad',
            'DescripcionActividad:ntext',
            'FechaPublicacion',
            [
                'attribute'=>'TipoAp',
                'label' =>'Tipo',
                'value' => function($model){
                    if($model->TipoAp == 1){
                        return "Actividad";
                    }else{
                        return "Proyecto";
                    }
                },
                'filter'=>array("1"=>"Actividad","2"=>"Proyecto"),
            ],
             [
                'attribute'=>'EstadoAP',
                'label' =>'Estado de la actividad',
                'value' => function($model){
                    if($model->EstadoAP == 0){
                        return "No Activo";
                    }else{
                        return "Activo";
                    }
                },
                'filter'=>array("0"=>"No Activo","1"=>"Activo"),
            ],
           // 'RutaArchivo',
            [
                'attribute'=>'Imagen',
                'label'=>'Image',
                'format'=>'html',

                'value' => function ($model) {
                //$url = \Yii::getAlias('web/uploads/').$model['RutaArchivo'];
                $url = Yii::$app->request->baseUrl.'/uploads/'.$model['RutaArchivo'];
                    //echo $url;
                return Html::img($url, ['alt'=>'portadaAct','width'=>'100','height'=>'80']);
         }
         ],
            // 'carrera_idcarrera',
            // 'ciclo_idciclo',
            // 'curso_idciclo',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {upload}',
            'buttons' => [
                'upload'=>function ($url, $model){
                return "<a href='index.php?r=upload&id=".$model->idAct_Proy."'>Upload</a>";
                },
            ],

            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
