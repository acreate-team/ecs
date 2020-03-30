<?php

    namespace common\components\rbac;

    use Yii;
    use yii\rbac\Rule;
    use yii\helpers\ArrayHelper;
    use common\models\User;
    
    class UserGroupRule extends Rule
    {
        public $name = 'userRole';
        
        public function execute($user, $item, $params)
        {
            if (!\Yii::$app->user->isGuest) {
                $role = \Yii::$app->user->identity->role;

                if ($item->name === 'admin') {
                    return $role == User::ROLE_ADMIN;
                } elseif ($item->name === 'editor') {
                    //editor является потомком admin, который получает его права
                    return $role == User::ROLE_ADMIN || $role == User::ROLE_EDITOR;
                } 
                elseif ($item->name === 'user') {
                    return $role == User::ROLE_ADMIN || $role == User::ROLE_EDITOR
                    || $role == User::ROLE_USER;
                }
            }
            return false;
        }
    }