<?php


namespace app\models;


use yii\db\ActiveRecord;

class Comment extends ActiveRecord
{
    public function getPost()
    {
        return $this->hasOne(Post::className(),['id' => 'post_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(),['id' => 'user_id']);
    }
    public function rules()
    {
        return [
            [[ 'text'], 'required'],
        ];
    }
}