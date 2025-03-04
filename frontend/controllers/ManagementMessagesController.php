<?php

namespace frontend\controllers;

use app\models\ManagementMessages;
use app\models\ManagementMessagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * ManagementMessagesController implements the CRUD actions for ManagementMessages model.
 */
class ManagementMessagesController extends Controller
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
     * Lists all ManagementMessages models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new ManagementMessages();

        $searchModel = new ManagementMessagesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post()) ) {
                
                $time = time();
                // echo "<pre>"; print_r($time);die;
                $random= rand(10,100);
                $random_name= 'admin'.$random.$time;

                $model->created_by = Yii::$app->user->id;
                if($model->management=UploadedFile::getInstance($model,'management'))
                    { 
                        $model->management=UploadedFile::getInstance($model,'management');
                        
                        $model->photo = $random_name.'.'.$model->management->extension;
                    }

                if(!$model->save(false)){
                    // print_r($model->errors);die;
                    Yii::$app->session->setFlash('danger', 'Failed to Add!');
                    return $this->redirect(Yii::$app->request->referrer);
                }else{
                        $model->management->saveAs('docs/message/'.$random_name.'.'.$model->management->extension);
                        
                    Yii::$app->session->setFlash('success', 'Successfully Added!');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [

            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ManagementMessages model.
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
     * Creates a new ManagementMessages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ManagementMessages();

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
     * Updates an existing ManagementMessages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $web = $model->photo;

        if ($model->load(Yii::$app->request->post()) ) {
                
                $time = time();
                // echo "<pre>"; print_r($time);die;
                $random= rand(10,100);
                $random_name= 'admin'.$random.$time;

                $model->created_by = Yii::$app->user->id;
                if($model->management=UploadedFile::getInstance($model,'management'))
                    { 
                        $model->management=UploadedFile::getInstance($model,'management');
                        $model->management->saveAs('docs/message/'.$random_name.'.'.$model->management->extension);
                        $model->photo = $random_name.'.'.$model->management->extension;
                    }


                if(!$model->save(false)){
                    // print_r($model->errors);die;
                    Yii::$app->session->setFlash('danger', 'Failed to Update!');
                    return $this->redirect(Yii::$app->request->referrer);
                }else{
                    
                    unlink('docs/message/'.$web);
                    Yii::$app->session->setFlash('success', 'Successfully Updated!');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ManagementMessages model.
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
     * Finds the ManagementMessages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ManagementMessages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ManagementMessages::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
