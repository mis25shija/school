<?php

namespace frontend\controllers;

use app\models\SchoolDetail;
use app\models\SchoolDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\web\UploadedFile;
use app\models\AcademicSession;
use app\models\AcademicSessionSearch;
use app\models\ClassInfo;
use app\models\ClassInfoSearch;
use app\models\Section;
use app\models\SectionSearch;
use app\models\Subject;
use app\models\SubjectSearch;
/**
 * SchoolDetailController implements the CRUD actions for SchoolDetail model.
 */
class SchoolDetailController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all SchoolDetail models.
     *
     * @return string
     */
    public function actionIndex()
    {
        
        $searchModel = new SchoolDetailSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $modelsession = new AcademicSession();
        $searchModelSession = new AcademicSessionSearch();
        $dataProviderSession = $searchModelSession->search($this->request->queryParams);

        $modelclass = new ClassInfo();
        $searchModelClass = new ClassInfoSearch();
        $dataProviderClass = $searchModelClass->search($this->request->queryParams);

        $modelsec = new Section();
        $searchModelSec = new SectionSearch();
        $dataProviderSec = $searchModelSec->search($this->request->queryParams);

        $modelsub = new Subject();
        $searchModelSub = new SubjectSearch();
        $dataProviderSub = $searchModelSub->search($this->request->queryParams);

        $model = SchoolDetail::find()->one();
       

        if (!$model) {

            $model = new SchoolDetail();
        }

        $log = $model->school_photo;

        if ($this->request->isPost) {


            if ($model->load(Yii::$app->request->post())) {

                $time = time();
                // echo "<pre>"; print_r($time);die;
                $random= rand(10,100);
                $random_name= 'logo'.$random.$time;
                
                if($model->simg=UploadedFile::getInstance($model,'simg'))
                    { 
                        $model->simg=UploadedFile::getInstance($model,'simg');

                        $model->simg->saveAs('docs/logo/'.$random_name.'.'.$model->simg->extension);
                        
                        $model->school_photo = $random_name.'.'.$model->simg->extension;


                    }

                    $model->school_name = strtoupper($model->school_name);
                    $model->created_by = Yii::$app->user->id;

            if($model->save(false)){

                if ($log != NULL ) {
                    unlink('docs/logo/'.$log);
                }
                
                Yii::$app->session->setflash('success', 'Record Successfully Added !');
                return $this->redirect(Yii::$app->request->referrer);
            } else{
                
                
                Yii::$app->session->setflash('error', 'Failed to add record!');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }


        if ($modelsession->load(Yii::$app->request->post())) {

            $chk = AcademicSession::find()->where(['session_name'=>$modelsession->session_name])->one();

            if ($chk) {
                Yii::$app->session->setflash('error', 'Record already exists!');
                return $this->redirect(Yii::$app->request->referrer);
            }

            $modelsession->created_by = Yii::$app->user->id;   
            if($modelsession->save()){
                
                Yii::$app->session->setflash('success', 'Record Successfully Added !');
                return $this->redirect(Yii::$app->request->referrer);
            } else{
                
                
                Yii::$app->session->setflash('error', 'Failed to add record!');
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'model' => $model,
            'modelsession' => $modelsession,

            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModelSession' => $searchModelSession,
            'dataProviderSession' => $dataProviderSession,
            
        ]);
    }

    /**
     * Displays a single SchoolDetail model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SchoolDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SchoolDetail();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SchoolDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SchoolDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SchoolDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SchoolDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SchoolDetail::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
