<?php

    namespace backend\controllers;

    use Yii;
    use yii\data\Pagination;
    use yii\data\Sort;
    use yii\web\Controller;
    use yii\filters\AccessControl;

    use common\models\User;

    use backend\helpers\System;
    use backend\models\UserForm;

    class UserController extends Controller
    {
        public $roleList = [
            ['id' => 1, 'name' => 'пользователь'],
            ['id' => 5, 'name' => 'редактор'],
            ['id' => 10, 'name' => 'администратор']
        ];

        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'actions' => ['index', 'view'],
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
                ]
            ];
        }

        public function actionIndex()
        {
            $model = User::find();
            $pagination = new Pagination([
                'defaultPageSize'   => 10,
                'totalCount'        => $model->count(),
            ]);

            $sort = new Sort([
                'attributes' => [
                    'created_at' => [
                        'label' => 'Дата регистрации'
                    ],
                    'last_request_time' => [
                        'label' => 'Последние посещение'
                    ],
                    'id' => [
                        'label' => 'ID'
                    ],  
                    'email' => [
                        'label' => 'E-Mail'
                    ],                                                                                                                      
                    'username' => [
                        'label' => 'Логин'
                    ],
                    'status' => [
                        'label' => 'Роль'
                    ]                                    
                ],
            ]);

            if(!$sort->orders) {
                $items = $model->orderBy('ID desc');
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

            $this->view->title = 'Пользователи';
            $this->view->params['breadcrumbs'][] = $this->view->title;
            return $this->render(
                'index',
                [
                    'model' => $model,
                    'items' => $items,
                    'pagination' => $pagination,
                    'sort' => $sort,
                    'title' => $this->view->title
                ]
            );
        }

        public function actionAdd()
        {
            $model = new UserForm();
            $model->setScenario('add');

            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->add()) {
                    Yii::$app->session->setFlash('successMessage', 'Добавлено');
                    return $this->redirect('index');
                }
            }

            $this->view->title = 'Добавить пользователя';
            $this->view->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['/user']];
            $this->view->params['breadcrumbs'][] = $this->view->title;
            return $this->render('add', [
                'model' => $model,
                'title' => $this->view->title,
                'roleList' => $this->roleList
            ]);
        }    

        public function actionEdit()
        {
            if(!$user = User::findOne(Yii::$app->request->get('id'))) {
                $this->redirect('index');         
            }

            $model = new UserForm;
            $model->username = $user['username'];
            $model->email = $user['email'];
            $model->role = $user['role'];

            if ($model->load(Yii::$app->request->post())) {
                if($user->email != $model->email) {
                    $model->setScenario('edit');
                }

                if($model->edit($user->id)) {
                    Yii::$app->session->setFlash('successMessage', 'Сохранено');
                    return $this->redirect('index');
                }
            }

            $this->view->title = 'Редактировать пользователя';
            return $this->render('edit', [
                'model' => $model,
                'title' => $this->view->title,
                'roleList' => $this->roleList              
            ]);
        }

        public function actionDelete() {
            User::removeUser(Yii::$app->request->get('id'));

            return $this->redirect(Yii::$app->request->referrer);
        }             
    }
