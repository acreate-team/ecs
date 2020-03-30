<?php

    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\filters\AccessControl;
    use yii\filters\VerbFilter;
    use yii\web\ForbiddenHttpException;

    use common\models\LoginForm;
    use common\models\User;

    class SiteController extends Controller
    {
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'except' => ['error'],
                    'rules' => [
                        [
                            'actions' => ['login', 'signup'],
                            'allow' => true,
                            'roles' => ['?'],
                        ],
                        [
                            'actions' => ['logout'],
                            'allow' => true,
                            'roles' => ['@']
                        ],
                        [
                            'actions' => ['index'],
                            'allow' => true,
                            'roles' => ['view']
                        ],
                        [
                            'actions' => ['images-get'],
                            'allow' => true,
                            'roles' => ['imageManager']
                        ],
                        [
                            'actions' => ['image-upload'],
                            'allow' => true,
                            'roles' => ['imageUpload']
                        ],
                        [
                            'actions' => ['files-get'],
                            'allow' => true,
                            'roles' => ['fileManager']
                        ],
                        [
                            'actions' => ['file-upload'],
                            'allow' => true,
                            'roles' => ['fileUpload']
                        ]                                                                              
                    ]
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'logout' => ['post'],
                    ],
                ],
            ];
        }

        public function actions()
        {
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ],             
                'image-upload' => [
                    'class' => 'vova07\imperavi\actions\UploadAction',
                    'url' => '/uploads/images/',
                    'path' => '@root/uploads/images/'
                ],
                'images-get' => [
                   'class' => 'vova07\imperavi\actions\GetAction',
                   'url' => '/uploads/images/',
                   'path' => '@root/uploads/images/',
                   'type' =>  \vova07\imperavi\actions\GetAction::TYPE_IMAGES
                ],
                'files-get' => [
                   'class' => 'vova07\imperavi\actions\GetAction',
                   'url' => '/uploads/files/',
                   'path' => '@root/uploads/files/',
                   'type' =>  \vova07\imperavi\actions\GetAction::TYPE_IMAGES
                ],
                'file-upload' => [
                   'class' => 'vova07\imperavi\actions\UploadAction',
                   'url' => '/uploads/files/',
                   'path' => '@root/uploads/files/',
                   'uploadOnlyImage' => false
                ]
            ];
        }

        public function actionIndex()
        {
            $settings = Yii::$app->settings;

            return $this->render('index', [
                'version' => $settings->get('cms.version'),
            ]);
        }

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

        public function actionLogout()
        {
            Yii::$app->user->logout();

            return $this->goHome();
        }                   
    }
