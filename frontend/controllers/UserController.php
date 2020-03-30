<?php

    namespace frontend\controllers;

    use Yii;
    use yii\web\Controller;

    use common\models\LoginForm;    

    class UserController extends Controller
    {
        public function actionLogin()
        {
            if (!Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            $model = new LoginForm();

            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goBack();
            } else {
                return $this->render('login', [
                    'model' => $model
                ]);
            }
        }

        public function actionLoginList()
        {
            if (!Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            $model = new LoginForm();

            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->redirect(['calendar/list-profile']);
            } else {
                return $this->render('login-list', [
                    'model' => $model
                ]);
            }
        }

        public function actionLogout()
        {
            Yii::$app->user->logout();

            return $this->goHome();
        }       
    }
