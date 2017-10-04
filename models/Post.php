<?php


namespace app\models;


use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public function rules()
    {
        return [
            [['title', 'text','comments_on'], 'required'],
            [['image'], 'file',  'extensions' => 'png, jpg'],

        ];
    }
    public function upload()
    {
        if ($this->image->saveAs(\Yii::getAlias('@app') .'\web\images\\' . $this->image->baseName . '.' . $this->image->extension))
            return true;
        else {
            return false;
        }
    }
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(),['id' => 'user_id']);
    }
}