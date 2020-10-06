<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SignupForm;
use app\models\User;

class UserController extends Controller
{
    public function actionSignup()
    {
        $model = new SignupForm;

        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {

                Yii::$app->session->setFlash('success', 'Новый пользователь ' . $model->username . ' создан!');

                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'что-то пошло не так!');
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionUsers()
    {
        $model = new User;
        $userList = $model->getUserList();

        return $this->render('users', [
            'model' => $model,
            'userList' => $userList,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = new SignupForm;
        $modelUser = new User;
        $info = $modelUser->getUserInfo($id);
        if ($model->load(Yii::$app->request->post())) {
            $username = $model->username;
            if ($username == $info['username']) {
                Yii::$app->session->setFlash('error', 'Пользователь с таким логином уже существует!');
            } else {
                if ($model->passwordUpdate) {
                    $password = Yii::$app->security->generatePasswordHash($model->passwordUpdate);
                } else {
                    $password = '';
                }
                $fio = $model->fio;
                $modelUser->userUpdate($username, $password, $fio, $id);
                Yii::$app->session->setFlash('success', 'Данные пользователя обновлены!');

                return $this->refresh();
            }
        }


        return $this->render('update', [
            'model' => $model,
            'info' => $info,
        ]);
    }

    public function actionDelete($id)
    {
        $model = new SignupForm;
        $modelUser = new User;
        $info = $modelUser->getUserInfo($id);
        if ($model->load(Yii::$app->request->post())) {
            $username = $model->username;
            $modelUser->userDelete($username);
            $userList = $modelUser->getUserList();
            Yii::$app->session->setFlash('success', 'Пользователь ' . $model->username . ' Удален!');

            return $this->refresh();
        }

        return $this->render('delete', [
            'model' => $model,
            'info' => $info,
        ]);
    }
}
