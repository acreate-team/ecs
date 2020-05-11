<?php

    namespace frontend\controllers;

    use Yii;
    use yii\base\InvalidParamException;
    use yii\web\BadRequestHttpException;
    use yii\web\Controller;
    
    use app\models\Page;
    use app\models\CalendarGS;

    use frontend\assets\JUIAsset;
    use frontend\assets\CalendarListAsset;
    use frontend\assets\CalendarSystemAsset;

    class CalendarController extends Controller
    {
        public $layout = 'calendar';

        public function actions()
        {
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ]                        
            ];
        }

        public function actionList() {
            JUIAsset::register(Yii::$app->view);
            CalendarListAsset::register(Yii::$app->view);

            $this->view->title = 'ККС';

            $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);

            # Data
            $pageOld = false;
            $pageAlphabet = [];

            $page = Page::find()->orderBy('numeric_calendar asc')->all();
            $pageAlphabet = Page::find()->orderBy('name asc')->all();

            if(Yii::$app->session->getFlash('pageOld')) {
                $pageOld = Yii::$app->session->getFlash('pageOld');
            }

            return $this->render('_list', [
                'title' => $this->view->title,
                'page' => $page,
                'pageAlphabet' => $pageAlphabet,
                'pageOld' => $pageOld          
            ]);
        }

        public function actionSystem() {
            CalendarSystemAsset::register(Yii::$app->view);

            $page = Page::find()->where(['url' => Yii::$app->request->get('url')])->one();
            $this->view->title = $page->name;

            if(!$page->keywords) {
                $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            } else {
                $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
            }

            if($page->description) {
                $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);
            } else {
                $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description]);
            }

            Yii::$app->session->setFlash('pageOld', $page['id']);

            return $this->render('_system', [
                'title' => $this->view->title,
                'page' => $page            
            ]);
        }

        public function actionSystemHistory() {
            CalendarSystemAsset::register(Yii::$app->view);

            $page = Page::find()->where(['url' => Yii::$app->request->get('url')])->one();
            $this->view->title = $page->name;

            if(!$page->keywords) {
                $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            } else {
                $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
            }

            if($page->description) {
                $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);
            } else {
                $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description]);
            }

            Yii::$app->session->setFlash('pageOld', $page['id']);

            return $this->render('_history', [
                'title' => $this->view->title,
                'page' => $page            
            ]);
        }

        public function actionSystemStructure() {
            CalendarSystemAsset::register(Yii::$app->view);

            $page = Page::find()->where(['url' => Yii::$app->request->get('url')])->one();
            $this->view->title = $page->name;

            if(!$page->keywords) {
                $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            } else {
                $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
            }

            if($page->description) {
                $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);
            } else {
                $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description]);
            }

            Yii::$app->session->setFlash('pageOld', $page['id']);

            return $this->render('_structure', [
                'title' => $this->view->title,
                'page' => $page            
            ]);
        }

        public function actionSystemActual() {
            CalendarSystemAsset::register(Yii::$app->view);
            
            $page = Page::find()->where(['url' => Yii::$app->request->get('url')])->one();
            $this->view->title = $page->name;

            if(!$page->keywords) {
                $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            } else {
                $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
            }

            if($page->description) {
                $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);
            } else {
                $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description]);
            }

            Yii::$app->session->setFlash('pageOld', $page['id']);

            return $this->render('_actual', [
                'title' => $this->view->title,
                'page' => $page            
            ]);
        }

        public function actionView() {     
            $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);     

            $page = false;
            $gs = new CalendarGS;
            $calendars = false;
            $currentYear = date('Y');

            if(!Yii::$app->request->get('yga')) {
            	$yga = $currentYear / 4;
            } else {
            	$yga = Yii::$app->request->get('yga');
            }

            if(Yii::$app->request->get('url') == 'gs-grigorianskaya') {
                $this->view->title = 'ГКС';
                $page = 'list/gs/gks';
                $calendars = $gs->generateGKS($yga);
            } elseif(Yii::$app->request->get('url') == 'gs-sheteanskaya') {
                $this->view->title = 'ШКС';
                $page = 'list/gs/shks';
            } elseif(Yii::$app->request->get('url') == 'gs-moiseanskaya') {
                $this->view->title = 'МКС';
                $page = 'list/gs/mks';             
            }

            if(!$page) {
                $page = 'error';
                $this->redirect('/error');
            }

            $weeks = [
            	1 => 'пн',
            	2 => 'вт',
            	3 => 'ср',
            	4 => 'чт',
            	5 => 'пт',
            	6 => 'сб',
            	7 => 'вс'
            ];

            $month = [
            	1 => 'янв',
            	2 => 'фев',
            	3 => 'мар',
            	4 => 'апр',
            	5 => 'маи',
            	6 => 'июн',
            	7 => 'июл',
            	8 => 'авг',
            	9 => 'сен',
            	10 => 'окт',
            	11 => 'ноя',
            	12 => 'дек'
            ];

            return $this->render($page, [
            	'weeks' => $weeks,
            	'month' => $month,
                'title' => $this->view->title,
                'calendars' => $calendars,
                'currentYear' => $currentYear,
                'yga' => $yga
            ]);
        }             
    }
