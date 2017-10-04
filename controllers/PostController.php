<?php

namespace app\controllers;


use app\models\Post;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\UploadedFile;

class PostController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create,update,delete'],
                'rules' => [
                    [
                        'actions' => ['create','update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }
    public function actionCreate()
    {
        $model = new Post();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->user_id = \Yii::$app->user->getId();
            $model->created_at = \Yii::$app->formatter->asDate('now', 'php:Y-m-d');
            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->image && $model->upload()) {
                $model->image = ('/images/' . $model->image->baseName . '.' . $model->image->extension);
            }
            $model->save();
            return $this->redirect(['site/blog']);
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }
    public function actionDelete($id)
    {
        $model = Post::findOne($id);
        $model->delete();
        return $this->redirect(['site/blog']);
    }
    public function actionUpdate($id)
    {
        $model = Post::findOne($id);
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->image && $model->upload()) {
                $model->image = ('/images/' . $model->image->baseName . '.' . $model->image->extension);
            }
            $model->update();
            return $this->redirect(['site/blog']);
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }
}