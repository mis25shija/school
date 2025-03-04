<?php

namespace frontend\controllers;

use app\models\WebsiteStaffDisplay;
use app\models\WebsiteStaffDisplaySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * WebsiteStaffDisplayController implements the CRUD actions for WebsiteStaffDisplay model.
 */
class WebsiteStaffDisplayController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['*'],
                'rules' => [
                    // [
                    //     'actions' => ['signup'],
                    //     'allow' => true,
                    //     'roles' => ['?'],
                    // ],
                    // [
                    //     'actions' => ['logout'],
                    //     'allow' => true,
                    //     'roles' => ['@'],
                    // ],

                    [

                        'allow' => true,

                        'actions' => ['login'],

                        'roles' => ['?'],

                    ],
                    [

                        'allow' => true,

                        // 'actions' => ['login'],

                        'roles' => ['@'],

                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all WebsiteStaffDisplay models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new WebsiteStaffDisplay();

        $searchModel = new WebsiteStaffDisplaySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post()) ) {
               
                $model->staff_name = strtoupper($model->staff_name);

                $time = time();
                $random= rand(10,100);
                $random_name= 'staffimg'.$random.$time;
                $model->created_by = Yii::$app->user->id;

                if($model->staffimg=UploadedFile::getInstance($model,'staffimg'))
                    { 
                        $model->staffimg=UploadedFile::getInstance($model,'staffimg');
                        
                        $model->staff_photo = $random_name.'.'.$model->staffimg->extension;
                    }

                if(!$model->save(false)){
                    // print_r($model->errors);die;
                    Yii::$app->session->setFlash('error', 'Failed to Add!');
                    return $this->redirect(Yii::$app->request->referrer);
                }else{
                        $model->staffimg->saveAs('docs/staffimg/'.$random_name.'.'.$model->staffimg->extension);
                    Yii::$app->session->setFlash('success', 'Successfully Added!');
                    return $this->redirect(Yii::$app->request->referrer);
                }


           
                
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single WebsiteStaffDisplay model.
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
     * Creates a new WebsiteStaffDisplay model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new WebsiteStaffDisplay();

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
     * Updates an existing WebsiteStaffDisplay model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $icn = $model->staff_photo;

        if ($model->load(Yii::$app->request->post()) ) {
                
                $time = time();
                // echo "<pre>"; print_r($time);die;
                $random= rand(10,100);
                $random_name= 'staffimg'.$random.$time;

                $model->created_by = Yii::$app->user->id;
                if($model->staffimg=UploadedFile::getInstance($model,'staffimg'))
                    { 
                        $model->staffimg=UploadedFile::getInstance($model,'staffimg');
                        $model->staffimg->saveAs('docs/staffimg/'.$random_name.'.'.$model->staffimg->extension);
                        $model->staff_photo = $random_name.'.'.$model->staffimg->extension;
                    }

                

                if(!$model->save(false)){
                    // print_r($model->errors);die;
                    Yii::$app->session->setFlash('danger', 'Failed to Update!');
                    return $this->redirect(Yii::$app->request->referrer);
                }else{
                    
                    unlink('docs/featureicon/'.$icn);   
                    Yii::$app->session->setFlash('success', 'Successfully Updated!');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WebsiteStaffDisplay model.
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
     * Finds the WebsiteStaffDisplay model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return WebsiteStaffDisplay the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WebsiteStaffDisplay::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
