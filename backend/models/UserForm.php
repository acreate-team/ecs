<?php

    namespace backend\models;

    use Yii;
    use yii\base\Model;
    use yii\imagine\Image;
    use Imagine\Gd;
    use Imagine\Image\Box;
    use Imagine\Image\BoxInterface;
    use yii\web\UploadedFile;

    use common\models\User;

    class UserForm extends Model
    {
        public $username;
        public $email;
        public $password;
        public $passwordRepeat;
        public $role = 10;

        public function rules()
        {
            return [
                [['username', 'email', 'role'], 'trim'],
                [['username', 'email', 'role'], 'required'],
                ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Это имя пользователя уже занято.', 'on' => 'add'],
                [['username'], 'string', 'min' => 2, 'max' => 255],

                ['email', 'email'],
                ['email', 'string', 'max' => 255],
                ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Этот адрес электронной почты уже занят.', 'on' => ['add','edit']],

                ['password', 'required', 'on'=>'add'],
                ['password', 'string', 'min' => 6, 'tooShort' => 'Минимальная длина пароля 6 символов.', 'on'=>'add'],

                ['passwordRepeat', 'compare', 'compareAttribute'=> 'password', 'skipOnEmpty' => false, 'message'=> 'Пароли не совпадают.'],
            ];
        }

        public function attributeLabels()
        {
            return [
                'username' => 'Логин',
                'email' => 'E-Mail',
                'password' => 'Пароль',
                'passwordRepeat' => 'Повторите пароль',
                'role' => 'Роль'
            ];
        } 

        public function add()
        {
            if (!$this->validate()) {
                return null;
            }
            
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->role = $this->role;
        
            $user->setPassword($this->password);
            $user->generateAuthKey();
        
            return $user->save() ? $user : null;

            $auth = Yii::$app->authManager;
            $authorRole = $auth->getRole('admin');
            $auth->assign($authorRole, $user->getId());            
        }

        public function edit($id) {
            if (!$this->validate()) {
                return null;
            }

            $user = User::findIdentity($id);
            $user->username = $this->username;
            $user->email = $this->email;
            $user->role = $this->role;

            return $user->update() ? $user : null;
        }
    }