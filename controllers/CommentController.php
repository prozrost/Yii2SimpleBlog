<?php


namespace app\controllers;


use app\models\Comment;
use yii\web\Controller;

class CommentController extends Controller
{
    public function actionCreate($id)
    {
        $model = new Comment();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->user_id = \Yii::$app->user->getId();
            $model->post_id = $id;
            $model->save();
            return $this->redirect(['site/blog']);
        } else {
            return $this->render('create',['model' => $model]);
        }
    }
    public function actionDelete($id)
    {
        $model = Comment::findOne($id);
        $model->delete();
        return $this->redirect(['site/blog']);
    }
    public function actionUpdate($id)
    {
        $model = Comment::findOne($id);
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->update();
            return $this->redirect(['site/blog']);
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

}