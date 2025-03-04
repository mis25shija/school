<?php

namespace frontend\controllers;

use app\models\Achievement;
use app\models\AchievementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * AchievementController implements the CRUD actions for Achievement model.
 */
class AchievementController extends Controller
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
     * Lists all Achievement models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Achievement();

        $searchModel = new AchievementSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post()) ) {

                $time = time();
                $random= rand(10,100);
                $random_name= 'achieve'.$random.$time;
                $model->created_by = Yii::$app->user->id;

                if($model->achieveimg=UploadedFile::getInstance($model,'achieveimg'))
                    { 
                        $model->achieveimg=UploadedFile::getInstance($model,'achieveimg');
                        
                        $model->photo = $random_name.'.'.$model->achieveimg->extension;
                    }

                if(!$model->save(false)){
                    // print_r($model->errors);die;
                    Yii::$app->session->setFlash('error', 'Failed to Add!');
                    return $this->redirect(Yii::$app->request->referrer);
                }else{
                        $model->achieveimg->saveAs('docs/achieve/'.$random_name.'.'.$model->achieveimg->extension);
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
     * Displays a single Achievement model.
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
     * Creates a new Achievement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Achievement();

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
     * Updates an existing Achievement model.
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
     * Deletes an existing Achievement model.
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
     * Finds the Achievement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Achievement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Achievement::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
