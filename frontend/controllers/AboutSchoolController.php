<?php

namespace frontend\controllers;

use app\models\AboutSchool;
use app\models\AboutSchoolSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * AboutSchoolController implements the CRUD actions for AboutSchool model.
 */
class AboutSchoolController extends Controller
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
     * Lists all AboutSchool models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AboutSchoolSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AboutSchool model.
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
     * Creates a new AboutSchool model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = AboutSchool::find()->one();
       

        if (!$model) {

            $model = new AboutSchool();
        }

        if ($this->request->isPost) {
            if ($model->load(Yii::$app->request->post()) ) {
                
                $model->created_by = Yii::$app->user->id;
                

                if(!$model->save()){
                    // print_r($model->errors);die;
                    Yii::$app->session->setFlash('error', 'Failed to Submit !');
                    return $this->redirect(Yii::$app->request->referrer);
                }else{

                    Yii::$app->session->setFlash('success', 'Successfully Submited!');
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
     * Updates an existing AboutSchool model.
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
     * Deletes an existing AboutSchool model.
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
     * Finds the AboutSchool model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AboutSchool the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AboutSchool::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
