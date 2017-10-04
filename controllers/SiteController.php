<?php

namespace app\controllers;

use app\models\Post;
use app\models\User;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout', 'blog'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Post::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);

        $posts = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('index',['posts' => $posts, 'pagination' => $pagination]);
    }

    public function actionBlog()
    {
        $user_id = \Yii::$app->user->getId();
        $posts = User::findOne($user_id)->posts;
        return $this->render('blog/blog',['posts' => $posts]);
    }
}