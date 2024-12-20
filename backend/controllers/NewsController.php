<?php

namespace backend\controllers;

use common\models\News;
use common\models\NewsSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\base\Component;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post())) {
            $uploadedFile = UploadedFile::getInstance($model, 'photo_path');

            if ($uploadedFile) {
                $uploadPath = Yii::getAlias('@frontend/web/uploads/img/');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $fileName = uniqid() . '.' . $uploadedFile->extension;
                $filePath = $uploadPath . $fileName;

                if ($uploadedFile->saveAs($filePath)) {
//                    echo 1;
                    $model->photo_path = 'uploads/img/' . $fileName;
                }
            }
            $model->author = Yii::$app->user->id;
            $model->created_at = time();
            $model->updated_at = time();
            $model->views_count = 0;
//            echo "<pre>"; print_r($model);

//            foreach (Yii::$app->request->post('News') as $key => $value) {
//                echo $key . ' => ' . $value . '<br>';
//            } exit();

            // Modelning barcha xususiyatlari va qiymatlari
//            $attributes = $model->attributes;

            // Natijani chop etish
//            print_r($attributes);
//            exit();
//            echo $model->photo_path;exit();
//            print_r($model->save());exit();


            if ($model->save()) {

                Yii::$app->session->setFlash('success', 'Ma\'lumot saqlandi!');
//                echo $model->id;exit();
                return $this->redirect(['view', 'id' => $model->id]);
            }
//            Yii::error($model->errors); // Model xatolarini loglash
//            print_r($model->errors);exit();
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }



    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->updated_at = time();

        if ($this->request->isPost && $model->load($this->request->post())) {

            $uploadedFile = UploadedFile::getInstance($model, 'photo_path');

            if ($uploadedFile) {
//                $oldFilePath = Yii::getAlias('@frontend/web/' . $model->photo_path);
//                if (file_exists($oldFilePath)) {
//                    unlink($oldFilePath);
//                }

                $fileName = uniqid() . '.' . $uploadedFile->extension;
                $filePath = Yii::getAlias('@frontend/web/uploads/img/') . $fileName;

                if ($uploadedFile->saveAs($filePath)) {
                    $model->photo_path = 'uploads/img/' . $fileName;
                }
            }

            $changedAttributes = $model->getDirtyAttributes();

            if ($model->save(false, array_keys($changedAttributes))) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $filePath = Yii::getAlias('@frontend/web/uploads/img/') . $model->photo_path;

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $model->delete();

        return $this->redirect(['index']);
    }



    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
