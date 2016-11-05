<?php

namespace frontend\controllers;

use Yii;
use app\models\ActProy;
use app\models\ActproySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadForm;
use yii\web\UploadedFile;

/**
 * ActproyController implements the CRUD actions for ActProy model.
 */
class ActproyController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ActProy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ActproySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);



        //-------------Lo mio
    }

    /**
     * Displays a single ActProy model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ActProy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ActProy();
        //var_dump($_FILES);
        if(isset($_POST['ActProy'])){
            $_POST['ActProy']['RutaArchivo'] = $_FILES['ActProy']['name']['imagen'];
            $model->RutaArchivo = $_FILES['ActProy']['name']['imagen'];
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->imagen = UploadedFile::getInstance($model,'imagen');
            if($model->upload()){
                //var_dump($_FILES);
                return $this->redirect(['view', 'id' => $model->idAct_Proy]);
            } else {
                echo "error";
            }
        } else {
           return $this->render('create', [
             'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ActProy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(isset($_POST['ActProy'])){
            if($_POST['ActProy']['checkbox']==1){
                echo $_FILES['ActProy']['name']['imagen'];
                $model->RutaArchivo = "";
                $_POST['ActProy']['RutaArchivo'] = $_FILES['ActProy']['name']['imagen'];
                $model->RutaArchivo = $_FILES['ActProy']['name']['imagen'];
                $model->save();
                    $model->imagen = UploadedFile::getInstance($model,'imagen');
                    if($model->upload()){   
                        return $this->redirect(['view', 'id' => $model->idAct_Proy]);
                    }
                  
            } else {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->idAct_Proy]);
                 }
            }
 
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ActProy model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ActProy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ActProy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ActProy::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
