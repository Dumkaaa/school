<?php

namespace app\modules\admin\controllers;

use app\models\Ask;
use Yii;
use app\models\Quests;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuestsController implements the CRUD actions for Quests model.
 */
class QuestsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Quests models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Quests::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Quests model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $asks = $model->asks;
        return $this->render('view', [
            'model' => $model,
            'asks' => $asks,
        ]);
    }

    /**
     * Creates a new Quests model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Quests();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Quests model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $asks = $model->asks;

        $post = Yii::$app->request->post();

        if ($model->load($post) && $model->validate()) {

            $post_asks = null;

            foreach ($post['Ask'] as $post_ask) {

                if(!isset($post_ask['id'])) {
                    $ask = new Ask();
                }
                else {
                    $ask = Ask::findOne($post_ask['id']);
                }

                $ask->load($post_ask, '');
                $model->link('asks', $ask);
            }

            $model->save();

            return $this->redirect(['index']);
        }
        else {
            return $this->render('update', [
                'model' => $model,
                'asks' => $asks,
            ]);
        }
    }

    /**
     * Deletes an existing Quests model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    /**
     * Finds the Quests model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quests the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quests::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
