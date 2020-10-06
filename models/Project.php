<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Project extends Model
{

    public $userId;
    public $title;
    public $price;
    public $startDate;
    public $endDate;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%projects}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $array_rule = [
            ['title', 'required'],
            ['title', 'string', 'min' => 2, 'max' => 255],
            ['price', 'required'],
            ['price', 'integer'],
            ['startDate', 'required'],
            ['startDate', 'string'],
            ['endDate', 'required'],
            ['endDate', 'string'],
        ];
        return $array_rule;
    }

    /**
     * @return array filter form labels
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'price' => 'Цена',
            'startDate' => 'Дата начала',
            'endDate' => 'Дата сдачи',
        ];
    }

    public function projectCreate()
    {
        Yii::$app->db->createCommand()->insert('projects', [
            'user_id' => Yii::$app->user->getId(),
            'title' => $this->title,
            'price' => $this->price,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
        ])->execute();
    }

    /**
     * @return array
     * @throws \yii\db\Exception
     */
    public function getProjectsList()
    {
        $id = Yii::$app->user->getId();
        $sql = 'SELECT * FROM projects WHERE user_id = ' . $id . '';
        $userList = \Yii::$app->getDb()->createCommand($sql)->queryAll();

        return $userList;
    }

    /**
     * @return array
     * @throws \yii\db\Exception
     */
    public function getAllProjectsList()
    {
        $id = Yii::$app->user->getId();
        $sql = 'SELECT * FROM projects';
        $userList = \Yii::$app->getDb()->createCommand($sql)->queryAll();

        return $userList;
    }

    /**
     * @return array
     * @throws \yii\db\Exception
     */
    public function projectUpdate($title, $price, $startDate, $endDate, $id)
    {

        return Yii::$app->db->
        createCommand()
            ->update('projects',
                ['title' => $title,
                    'price' => $price,
                    'start_date' => $startDate,
                    'end_date' => $endDate],
                'id = ' . $id . '')
            ->execute();

    }

    /**
     * @return array
     * @throws \yii\db\Exception
     */
    public function projectDelete($id)
    {

        return Yii::$app->db->createCommand()->delete('projects', 'id = "' . $id . '"')->execute();
    }

    /**
     * @return array
     * @throws \yii\db\Exception
     */
    public function getProjectInfo($id)
    {
        $sql = 'SELECT * FROM projects WHERE id = "' . $id . '"';
        $info = \Yii::$app->getDb()->createCommand($sql)->queryOne();

        return $info;
    }
}

