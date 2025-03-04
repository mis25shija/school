<?php

namespace frontend\controllers;

use app\models\AdmissionFee;
use app\models\AdmissionFeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\filters\AccessControl;
/**
 * AdmissionFeeController implements the CRUD actions for AdmissionFee model.
 */
class AdmissionFeeController extends Controller
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
     * Lists all AdmissionFee models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new AdmissionFee();

        $searchModel = new AdmissionFeeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {


        if ($model->load(Yii::$app->request->post())) {

            $chk = AdmissionFee::find()->where(['new_student_adm_fee'=>$model->new_student_adm_fee])->andWhere(['old_student_adm_fee'=>$model->old_student_adm_fee])->andWhere(['class_info_id'=>$model->class_info_id])->andWhere(['session_id'=>$model->session_id])->one();

            if ($chk) {
                Yii::$app->session->setflash('error', 'Record already exists!');
                return $this->redirect(Yii::$app->request->referrer);
            }

            $model->created_by = Yii::$app->user->id;   
            if($model->save()){
                
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
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdmissionFee model.
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
     * Creates a new AdmissionFee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AdmissionFee();

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
     * Updates an existing AdmissionFee model.
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
     * Deletes an existing AdmissionFee model.
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
     * Finds the AdmissionFee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AdmissionFee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdmissionFee::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
