<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\SignupForm; // Модель для формы регистрации
use app\models\LoginForm; // Модель для формы авторизации

class ProfileController extends  Controller
{
    // Показ профиля
    public function actionIndex()
    {
        return $this->render('index');
    }

    // Регистрация профиля view
    public function actionRegistration()
    {
        $model = new SignupForm();

        if( $model->load(Yii::$app->request->post())) {
            if ( $user = $model->signup() ) {
                if( Yii::$app->getUser()->login($user) ) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('registration', [
            'model' => $model,
        ]);
    }

    // Авторизация профиля
    public function actionLogin()
    {
        if( !Yii::$app->user->isGuest) {
            return $this->redirect('/profile/index');
        }

        $model = new LoginForm();
        if( $model->load(Yii::$app->request->post()) && $model->login() ) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    // Выход из аккаунта
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}