<?php

namespace backend\controllers;

class UserController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest() {
        return $this->render('test');
    }

}
