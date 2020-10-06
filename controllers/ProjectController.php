<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Project;

class ProjectController extends Controller
{
    public function actionCreate()
    {
        $model = new Project;

        if ($model->load(Yii::$app->request->post())) {
            $startDate = $model->startDate;
            $endDate = $model->endDate;
            if (strtotime($startDate) > strtotime($endDate)) {
                Yii::$app->session->setFlash('error', 'Дата начала должна быть раньше даты конца!!!');

                return $this->render('create', [
                    'model' => $model,
                ]);
            } else {
                $model->projectCreate();
                Yii::$app->session->setFlash('success', 'Новый проект создан!');

                return $this->refresh();
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionProjects()
    {
        $model = new Project;
        $projectList = $model->getProjectsList();

        return $this->render('projects', [
            'model' => $model,
            'projectList' => $projectList,
        ]);
    }

    public function actionAllProjects()
    {
        $model = new Project;
        $projectList = $model->getAllProjectsList();

        return $this->render('projects', [
            'model' => $model,
            'projectList' => $projectList,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = new Project;
        $info = $model->getProjectInfo($id);
        if ($model->load(Yii::$app->request->post())) {
            $title = $model->title;
            $price = $model->price;
            $startDate = $model->startDate;
            $endDate = $model->endDate;
            if (strtotime($startDate) > strtotime($endDate)) {
                Yii::$app->session->setFlash('error', 'Дата начала должна быть раньше даты конца!!!');

                return $this->render('update', [
                    'model' => $model,
                    'info' => $info,
                ]);
            }
            $model->projectUpdate($title, $price, $startDate, $endDate, $id);
            Yii::$app->session->setFlash('success', 'Данные проекта обновлены!');

            return $this->refresh();
        }


        return $this->render('update', [
            'model' => $model,
            'info' => $info,
        ]);
    }

    public function actionDelete($id)
    {
        $model = new Project;
        $info = $model->getProjectInfo($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->projectDelete($id);
            Yii::$app->session->setFlash('success', 'Проект удален!');

            return $this->refresh();
        }

        return $this->render('delete', [
            'model' => $model,
            'info' => $info,
        ]);
    }
}

