<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;

class MainController extends Controller
{

    public function actionIndex() {
        return $this->render('index');
    }
}