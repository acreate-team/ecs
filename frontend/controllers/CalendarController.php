<?php

    namespace frontend\controllers;

    use Yii;
    use yii\base\InvalidParamException;
    use yii\web\BadRequestHttpException;
    use yii\web\Controller;
    
    use app\models\Page;

    use frontend\assets\JUIAsset;
    use frontend\assets\CalendarAsset;
    use frontend\assets\CalendarBosAsset;

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
            CalendarBosAsset::register(Yii::$app->view);

            $this->view->title = 'ККС';

            $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);

            # Data
            $page = Page::find()->orderBy('numeric_calendar asc')->all();
            $pageOld = false;

            if(Yii::$app->session->getFlash('pageOld')) {
                $pageOld = Yii::$app->session->getFlash('pageOld');
            }

            return $this->render('_list', [
                'title' => $this->view->title,
                'page' => $page,
                'pageOld' => $pageOld          
            ]);
        }

        public function actionListProfile() {
            if(Yii::$app->user->isGuest) {
                return $this->redirect(['user/login-list']);
            }

            JUIAsset::register(Yii::$app->view);
            CalendarBosAsset::register(Yii::$app->view);

            $this->view->title = 'ККС';

            $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);

            # Data
            $page = Page::find()->orderBy('numeric_calendar asc')->all();
            $pageOld = false;

            if(Yii::$app->session->getFlash('pageOld')) {
                $pageOld = Yii::$app->session->getFlash('pageOld');
            }

            return $this->render('_listProfile', [
                'title' => $this->view->title,
                'page' => $page,
                'pageOld' => $pageOld          
            ]);
        }

        public function actionListAlphabet() {
            CalendarBosAsset::register(Yii::$app->view);

            $this->view->title = 'ККС';

            $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);

            # Data
            $page = Page::find()->orderBy('numeric_calendar asc')->all();
            $pageOld = false;

            if(Yii::$app->session->getFlash('pageOld')) {
                $pageOld = Yii::$app->session->getFlash('pageOld');
            }

            if(Yii::$app->request->get('q')) {
                $q = Yii::$app->request->get('q');
                $match = Page::find()->where('name LIKE "%'.$q.'%"')->all();

                foreach ($page as $p) {
                    foreach ($match as $m) {
                        if($p->id == $m->id) {
                            $p->match = true;
                        }
                    }
                }

                return $this->render('_listAlphabet', [
                    'title' => $this->view->title,
                    'page' => $page,
                    'pageOld' => $pageOld,
                    'match' => $match,
                    'q' => Yii::$app->request->get('q')
                ]);                
            } else {
                return $this->render('_listAlphabet', [
                    'title' => $this->view->title,
                    'page' => $page,
                    'pageOld' => $pageOld
                ]);
            }
        }

        public function actionListNumeric() {
            CalendarBosAsset::register(Yii::$app->view);

            $this->view->title = 'ККС';

            $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);

            # Data
            $page = Page::find()->orderBy('numeric_calendar asc')->all();
            $pageOld = false;

            if(Yii::$app->session->getFlash('pageOld')) {
                $pageOld = Yii::$app->session->getFlash('pageOld');
            }

            if(Yii::$app->request->get('q')) {
                $q = Yii::$app->request->get('q');
                $q = intval($q);
                $match = Page::find()->where('numeric_calendar LIKE "'.$q.'"')->all();

                foreach ($page as $p) {
                    foreach ($match as $m) {
                        if($p->id == $m->id) {
                            $p->match = true;
                        }
                    }
                }

                return $this->render('_listNumeric', [
                    'title' => $this->view->title,
                    'page' => $page,
                    'pageOld' => $pageOld,
                    'match' => $match,
                    'q' => Yii::$app->request->get('q')
                ]);                
            } else {
                return $this->render('_listNumeric', [
                    'title' => $this->view->title,
                    'page' => $page,
                    'pageOld' => $pageOld
                ]);
            }
        }

        public function actionSystems() {
            $this->view->title = 'БОС';

            $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);

            $pages = Page::find()->all();

            return $this->render('_systems', [
                'title' => $this->view->title,
                'pages' => $pages               
            ]);
        }

        public function actionSystem() {
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
            CalendarAsset::register(Yii::$app->view);
            
            $this->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('app.keywords')]);
            $this->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('app.description')]);     

            $page = false;

            if(Yii::$app->request->get('url') == 'gs-grigorianskaya') {
                $this->view->title = 'ГКС';
                $page = 'gks';
            } elseif(Yii::$app->request->get('url') == 'gs-sheteanskaya') {
                $this->view->title = 'ШКС';
                $page = 'shks';
            } elseif(Yii::$app->request->get('url') == 'gs-moiseanskaya') {
                $this->view->title = 'МКС';
                $page = 'mks';                
            }

            if(!$page) {
                $page = 'error';
                $this->redirect('/error');
            }

            return $this->render($page, [
                'title' => $this->view->title                
            ]);
        }             
    }
