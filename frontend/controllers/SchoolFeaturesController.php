<?php

namespace frontend\controllers;

use app\models\SchoolFeatures;
use app\models\SchoolFeaturesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
/**
 * SchoolFeaturesController implements the CRUD actions for SchoolFeatures model.
 */
class SchoolFeaturesController extends Controller
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
     * Lists all SchoolFeatures models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new SchoolFeatures();

        

        

        $searchModel = new SchoolFeaturesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post()) ) {

                $chk = SchoolFeatures::find()->count('id');
                // echo "<pre>"; print_r($chk);die;
                if ($chk == 4) {

                       Yii::$app->session->setFlash('error', 'Maximum records reached !');
                        return $this->redirect(Yii::$app->request->referrer); 
                    }else{

                        $time = time();
                        // echo "<pre>"; print_r($time);die;
                        $random= rand(10,100);
                        $random_name= 'icon'.$random.$time;

                        $model->created_by = Yii::$app->user->id;
                        if($model->icn=UploadedFile::getInstance($model,'icn'))
                            { 
                                $model->icn=UploadedFile::getInstance($model,'icn');
                                
                                $model->icon = $random_name.'.'.$model->icn->extension;
                            }

                        if(!$model->save(false)){
                            // print_r($model->errors);die;
                            Yii::$app->session->setFlash('error', 'Failed to Add!');
                            return $this->redirect(Yii::$app->request->referrer);
                        }else{
                                $model->icn->saveAs('docs/featureicon/'.$random_name.'.'.$model->icn->extension);
                            Yii::$app->session->setFlash('success', 'Successfully Added!');
                            return $this->redirect(Yii::$app->request->referrer);
                        }


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
     * Displays a single SchoolFeatures model.
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
     * Creates a new SchoolFeatures model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SchoolFeatures();

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post()) ) {
                
                $time = time();
                // echo "<pre>"; print_r($time);die;
                $random= rand(10,100);
                $random_name= 'icon'.$random.$time;

                $model->created_by = Yii::$app->user->id;
                if($model->icn=UploadedFile::getInstance($model,'icn'))
                    { 
                        $model->icn=UploadedFile::getInstance($model,'icn');
                        
                        $model->icon = $random_name.'.'.$model->icn->extension;
                    }

                if(!$model->save(false)){
                    // print_r($model->errors);die;
                    Yii::$app->session->setFlash('error', 'Failed to Add!');
                    return $this->redirect(Yii::$app->request->referrer);
                }else{
                        $model->icn->saveAs('docs/featureicon/'.$random_name.'.'.$model->icn->extension);
                    Yii::$app->session->setFlash('success', 'Successfully Added!');
                    return $this->redirect(Yii::$app->request->referrer);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SchoolFeatures model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $icn = $model->icon;

        if ($model->load(Yii::$app->request->post()) ) {
                
                $time = time();
                // echo "<pre>"; print_r($time);die;
                $random= rand(10,100);
                $random_name= 'icon'.$random.$time;

                $model->created_by = Yii::$app->user->id;
                if($model->icn=UploadedFile::getInstance($model,'icn'))
                    { 
                        $model->icn=UploadedFile::getInstance($model,'icn');
                        $model->icn->saveAs('docs/featureicon/'.$random_name.'.'.$model->icn->extension);
                        $model->icon = $random_name.'.'.$model->icn->extension;
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
     * Deletes an existing SchoolFeatures model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $icon = $model->icon;

        unlink('docs/featureicon/'.$icon);

        $model->delete();

        Yii::$app->session->setflash('error', 'Record Deleted !');
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the SchoolFeatures model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SchoolFeatures the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SchoolFeatures::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
