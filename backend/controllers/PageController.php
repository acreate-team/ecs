<?php

    namespace backend\controllers;

    use Yii;
    use yii\data\Pagination;
    use yii\data\Sort;    
    use yii\web\Controller;
    use yii\filters\AccessControl;

    use app\models\Page;

    use backend\helpers\System;
    use backend\helpers\Tools;

    class PageController extends Controller
    {
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['index', 'addpack'],
                            'allow' => true,
                            'roles' => ['view']
                        ], 
                        [
                            'actions' => ['delete'],
                            'allow' => true,
                            'roles' => ['delete']
                        ],  
                        [
                            'actions' => ['add'],
                            'allow' => true,
                            'roles' => ['add']
                        ],                           
                        [
                            'actions' => ['edit'],
                            'allow' => true,
                            'roles' => ['edit']
                        ]                                                                                                
                    ]
                ],
            ];
        }

        public function actionIndex()
        {
            $model = Page::find();

            $pagination = new Pagination([
                'defaultPageSize'   => 15,
                'totalCount'        => $model->count(),
            ]);

            $sort = new Sort([
                'attributes' => [
                    'date_create' => [
                        'label' => 'дата создания'
                    ],
                    'date_update' => [
                        'label' => 'дата обновления'
                    ],
                    'id' => [
                        'label' => 'ID'
                    ],  
                    'numeric_calendar' => [
                        'label' => '1-9'
                    ],                                                                                 
                    'name' => [
                        'label' => 'название'
                    ], 
                    'url' => [
                        'label' => 'ссылка'
                    ],                     
                    'name_calendar' => [
                        'label' => 'А-Я'
                    ],                            
                    'status' => [
                        'label' => 'статус'
                    ],                  
                ],
            ]);

            if(!$sort->orders) {
                $items = $model->orderBy('numeric_calendar asc');
            } else {
                $items = $model->orderBy($sort->orders);
            }

            $items = $items->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all(); 

            $session = Yii::$app->session;
            if($session->getFlash('successMessage')) {
                System::notification('success', $session->getFlash('successMessage'));
            }

            $this->view->title = 'Календари';
            return $this->render(
                'index',
                [
                    'model' => $model,
                    'items'       => $items,
                    'pagination'    => $pagination,
                    'sort' => $sort,
                    'title' => $this->view->title
                ]
            );
        }

        public function actionAdd()
        {
            $model = new Page();

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if(!$model->url) {
                    $model->url = Tools::translit2url($model->name);
                }

                if($model->save(false)) {
                    Yii::$app->session->setFlash('successMessage', 'Добавлено');
                    return $this->redirect('index');
                }
            }

            $this->view->title = 'Добавить календарь';
            return $this->render('_form', [
                'model' => $model,
                'title' => $this->view->title
            ]);            
        }

        public function actionEdit()
        {
            if(!$model = Page::findOne(Yii::$app->request->get('id'))) {
                $this->redirect('index');         
            }

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if(!$model->url) {
                    $model->url = Tools::translit2url($model->name);
                }

                if($model->update(false)) {
                    Yii::$app->session->setFlash('successMessage', 'Сохранено');
                    return $this->redirect('index');
                }
            }

            $this->view->title = 'Редактировать календарь';
            return $this->render('_form', [
                'model' => $model,
                'title' => $this->view->title                
            ]);
        }

        public function actionDelete() {
            if($model = Page::findOne(Yii::$app->request->get('id'))) {       
                $model->delete();
            }

            return $this->redirect(Yii::$app->request->referrer);
        }           
    }
