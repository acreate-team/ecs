<?php

    namespace backend\controllers;

    use Yii;  
    use yii\web\Controller;
    use yii\filters\AccessControl; 
    use backend\models\Settings;
    use backend\helpers\System;

    class SettingsController extends Controller
    {
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['index'],
                            'allow' => true,
                            'roles' => ['edit']
                        ]                                                                                             
                    ]
                ]
            ];
        }

        public function actionIndex()
        {
            $settings = Yii::$app->settings;

            $model = new Settings();
            $model->title = $settings->get('app.title');
            $model->description = $settings->get('app.description');
            $model->keywords = $settings->get('app.keywords');
            $model->email = $settings->get('email.admin');

            if ($model->load(Yii::$app->request->post()) && $model->saveSettings()) {
                System::notification('successSettings', 'Сохранено');
            }

            $this->view->title = 'Настройки';
            return $this->render(
                '_form',
                [
                    'title' => $this->view->title,
                    'model' => $model
                ]
            );
        }    
    }
