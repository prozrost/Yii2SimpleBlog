<?php

namespace app\models;


class User extends \dektrium\user\models\User
{

    public function getPosts()
    {
        return $this->hasMany(Post::className(),['user_id' =>'id']);
    }

}
