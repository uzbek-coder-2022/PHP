<?php

namespace frontend\controllers;

use yii\web\Controller;

class UserController extends Controller
{
    public function actionIndex() {
        return $this->render(1);
    }
}