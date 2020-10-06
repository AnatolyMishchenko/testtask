<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{

    public $username;
    public $fio;
    public $password;
    public $passwordUpdate;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $array_rule = [

            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Логин занят.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['fio', 'required'],
            ['fio', 'string', 'min' => 2, 'max' => 255],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['passwordUpdate', 'string', 'min' => 6],
        ];
        return $array_rule;
    }

    /**
     * @return array filter form labels
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'fio' => 'ФИО',
            'password' => 'Пароль',
            'passwordUpdate' => 'Пароль',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if (!$this->validate()) {

            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->fio = $this->fio;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}
