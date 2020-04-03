<?php

    namespace frontend\controllers;

    use Yii;
    use yii\base\InvalidParamException;
    use yii\web\BadRequestHttpException;
    use yii\web\Controller;
    
    use app\models\Page;

    use frontend\assets\BannerAsset;

    class SiteController extends Controller
    {
        public function actions()
        {
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ]                        
            ];
        }

        public function actionIndex()
        {
            BannerAsset::register(Yii::$app->view);
            $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);            
            return $this->render('home');
        }

        public function actionPage()
        {
            if(!$page = Page::findOne(['url' => Yii::$app->request->get('url')])) {
                $this->redirect('/error');         
            }   

            $this->view->title = $page->name;
            $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
            $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description]);

            return $this->render('page', [
                'page' => $page,
                'title' => $this->view->title                
            ]);             
        }

        public function actionCalendar() {
            $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);     

            if(Yii::$app->request->get('url') == 'gks') {
                $this->view->title = 'ГКС';
                $page = 'gks';
            } elseif(Yii::$app->request->get('url') == 'shks') {
                $this->view->title = 'ШКС';
                $page = 'shks';
            } else {
                $this->redirect('/error');
            }

            return $this->render($page, [
                'title' => $this->view->title                
            ]);
        }             
    }
