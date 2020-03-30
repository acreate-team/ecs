<?php

    namespace console\controllers;

    use Yii;
    use yii\console\Controller;
    use common\components\rbac\UserGroupRule;

    class RbacController extends Controller {
        public function actionInit() {
            $auth = Yii::$app->authManager;
            
            $auth->removeAll();
            
            // Создадим роли
            $admin = $auth->createRole('admin');
            $editor = $auth->createRole('editor');
            $user = $auth->createRole('user');
            
            $rule = new UserGroupRule();
            $auth->add($rule);         

            $admin->ruleName = $rule->name;
            $editor->ruleName = $rule->name;
            $user->ruleName = $rule->name;   

            // запишем их в БД
            $auth->add($admin);
            $auth->add($editor);
            $auth->add($user);
  
            // Разрешения
            $viewDashboard = $auth->createPermission('viewDashboard');
            
            $viewUser = $auth->createPermission('viewUser');
            $deleteUser = $auth->createPermission('deleteUser');
            $editUser = $auth->createPermission('editUser');
            $addUser = $auth->createPermission('addUser');
            $changeUserStatus = $auth->createPermission('changeUserStatus');

            $imageUpload = $auth->createPermission('imageUpload');
            $imageManager = $auth->createPermission('imageManager');
            $fileUpload = $auth->createPermission('fileUpload');
            $fileManager = $auth->createPermission('fileManager');            

            $viewPage = $auth->createPermission('viewPage');
            $deletePage = $auth->createPermission('deletePage');
            $editPage = $auth->createPermission('editPage');
            $addPage = $auth->createPermission('addPage');

            // Запишем эти разрешения в БД
            $auth->add($viewDashboard);

            $auth->add($viewUser);
            $auth->add($deleteUser);
            $auth->add($editUser);
            $auth->add($addUser);
            $auth->add($changeUserStatus);

            $auth->add($viewPage);
            $auth->add($deletePage);
            $auth->add($editPage);
            $auth->add($addPage);

            $auth->add($imageUpload);
            $auth->add($imageManager);
            $auth->add($fileUpload);
            $auth->add($fileManager);            

            // Разрешения редактора
            $auth->addChild($editor, $viewDashboard);
            $auth->addChild($editor, $viewUser);
            $auth->addChild($editor, $viewPage);
            $auth->addChild($editor, $addPage);
            $auth->addChild($editor, $editPage);
            $auth->addChild($editor, $fileManager);
            $auth->addChild($editor, $imageManager);
            $auth->addChild($editor, $imageUpload);

            // Разрешения админа
            $auth->addChild($admin, $editor); // наследование от редактора
            $auth->addChild($admin, $deleteUser);
            $auth->addChild($admin, $editUser);
            $auth->addChild($admin, $fileUpload);
            $auth->addChild($admin, $addUser);
            $auth->addChild($admin, $deletePage);
            $auth->addChild($admin, $changeUserStatus);

            // Назначаем роль admin
            $auth->assign($admin, 1); 
            //$auth->assign($editor, 2);

            echo 'RBAC install done...';
            exit();
        }
    }