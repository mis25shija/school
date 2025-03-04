<?php

namespace frontend\controllers;

use app\models\Carousel;
use app\models\CarouselSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * CarouselController implements the CRUD actions for Carousel model.
 */
class CarouselController extends Controller
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
     * Lists all Carousel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Carousel();

        $searchModel = new CarouselSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post()) ) {
                
                $time = time();
                // echo "<pre>"; print_r($time);die;
                $random= rand(10,100);
                $random_name= 'web'.$random.$time;

                $random1= rand(10,100);
                $random1_name = 'mobile'.$random1.$time;

                $model->created_by = Yii::$app->user->id;
                if($model->web=UploadedFile::getInstance($model,'web'))
                    { 
                        $model->web=UploadedFile::getInstance($model,'web');
                        
                        $model->desktop_format = $random_name.'.'.$model->web->extension;
                    }

                if($model->mobile=UploadedFile::getInstance($model,'mobile'))
                    { 
                        $model->mobile=UploadedFile::getInstance($model,'mobile');
                        
                        $model->mobile_format = $random1_name.'.'.$model->mobile->extension;
                    }

                if(!$model->save(false)){
                    // print_r($model->errors);die;
                    Yii::$app->session->setFlash('danger', 'Failed to Add!');
                    return $this->redirect(Yii::$app->request->referrer);
                }else{
                        $model->web->saveAs('docs/banner/'.$random_name.'.'.$model->web->extension);
                        $model->mobile->saveAs('docs/banner/'.$random1_name.'.'.$model->mobile->extension);
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
     * Displays a single Carousel model.
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
     * Creates a new Carousel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Carousel();

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
     * Updates an existing Carousel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $web = $model->desktop_format;
        $mobile = $model->mobile_format;

        if ($model->load(Yii::$app->request->post()) ) {
                
                $time = time();
                // echo "<pre>"; print_r($time);die;
                $random= rand(10,100);
                $random_name= 'web'.$random.$time;

                $random1= rand(10,100);
                $random1_name = 'mobile'.$random1.$time;

                $model->created_by = Yii::$app->user->id;
                if($model->web=UploadedFile::getInstance($model,'web'))
                    { 
                        $model->web=UploadedFile::getInstance($model,'web');
                        $model->web->saveAs('docs/banner/'.$random_name.'.'.$model->web->extension);
                        $model->desktop_format = $random_name.'.'.$model->web->extension;
                    }

                if($model->mobile=UploadedFile::getInstance($model,'mobile'))
                    { 
                        $model->mobile=UploadedFile::getInstance($model,'mobile');
                        $model->mobile->saveAs('docs/banner/'.$random1_name.'.'.$model->mobile->extension);
                        $model->mobile_format = $random1_name.'.'.$model->mobile->extension;
                    }

                if(!$model->save(false)){
                    // print_r($model->errors);die;
                    Yii::$app->session->setFlash('danger', 'Failed to Update!');
                    return $this->redirect(Yii::$app->request->referrer);
                }else{
                    
                    unlink('docs/banner/'.$web);
                    unlink('docs/banner/'.$mobile);   
                    Yii::$app->session->setFlash('success', 'Successfully Updated!');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Carousel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $web = $model->desktop_format;
        $mobile = $model->mobile_format;

        unlink('docs/banner/'.$web);
        unlink('docs/banner/'.$mobile);

        $model->delete();

        Yii::$app->session->setflash('error', 'Record Deleted !');
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Carousel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Carousel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Carousel::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
