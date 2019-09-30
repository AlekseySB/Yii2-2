<?php

namespace backend\modules\profiles\models;


use yii\base\Model;

class ProfileCreateForm extends Model
{
    public $username;
    public $email;
    public $password;

    public const EVENT_USER_EXIST = 'event_user_exist';
    public function rules()
    {
        return[
          [['username','email','password'],'required'],
          ['email','email'],
          ['password','string','min'=> 5]
        ];
    }
}