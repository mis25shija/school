<?php

namespace frontend\controllers;

use app\models\AcademicFee;
use app\models\AcademicFeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\filters\AccessControl;
/**
 * AcademicFeeController implements the CRUD actions for AcademicFee model.
 */
class AcademicFeeController extends Controller
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
     * Lists all AcademicFee models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new AcademicFee();

        $searchModel = new AcademicFeeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost) {


        if ($model->load(Yii::$app->request->post())) {

            $chk = AcademicFee::find()->where(['academic_fee_name'=>$model->academic_fee_name])->andWhere(['academic_fee_amount'=>$model->academic_fee_amount])->andWhere(['class_info_id'=>$model->class_info_id])->andWhere(['session_id'=>$model->session_id])->one();

            if ($chk) {
                Yii::$app->session->setflash('error', 'Record already exists!');
                return $this->redirect(Yii::$app->request->referrer);
            }

            $model->academic_fee_name = strtoupper($model->academic_fee_name);
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
            
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single AcademicFee model.
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
     * Creates a new AcademicFee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AcademicFee();

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
     * Updates an existing AcademicFee model.
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
     * Deletes an existing AcademicFee model.
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
     * Finds the AcademicFee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AcademicFee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AcademicFee::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
