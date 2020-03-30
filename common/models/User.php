<?php

    namespace common\models;

    use Yii;
    use yii\base\NotSupportedException;
    use yii\behaviors\TimestampBehavior;
    use yii\db\ActiveRecord;
    use yii\web\IdentityInterface;
    use yii\db\Query;

    class User extends ActiveRecord implements IdentityInterface
    {
        const STATUS_DELETED = 0;
        const STATUS_ACTIVE = 10;
        const ROLE_USER = 1;
        const ROLE_EDITOR = 5;
        const ROLE_ADMIN = 10;        
        
        public $authKey;
        public $isBusy = false;
        public $rating = 0;

        public static function tableName()
        {
            return '{{%user}}';
        }

        public function behaviors()
        {
            return [
                TimestampBehavior::className(),             
            ];
        }

        public function rules()
        {
            return [
                ['status', 'default', 'value' => self::STATUS_ACTIVE],
                ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            ];
        }

        public static function findIdentity($id) {
            return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
        }

        public static function findIdentityFromDelete($id) {
            return static::findOne(['id' => $id]);
        }

        public static function findIdentityByAccessToken($token, $type = null)
        {
            throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
        }

        public static function findByUsername($username)
        {
            return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
        }

        public static function findByPasswordResetToken($token)
        {
            if (!static::isPasswordResetTokenValid($token)) {
                return null;
            }

            return static::findOne([
                'password_reset_token' => $token,
                'status' => self::STATUS_ACTIVE,
            ]);
        }

        public static function isPasswordResetTokenValid($token)
        {
            if (empty($token)) {
                return false;
            }

            $timestamp = (int) substr($token, strrpos($token, '_') + 1);
            $expire = Yii::$app->params['user.passwordResetTokenExpire'];
            return $timestamp + $expire >= time();
        }

        public function getId()
        {
            return $this->getPrimaryKey();
        }

        public function getAuthKey()
        {
            return $this->auth_key;
        }

        public function validateAuthKey($authKey)
        {
            return $this->getAuthKey() === $authKey;
        }

        public function validatePassword($password)
        {
            return Yii::$app->security->validatePassword($password, $this->password_hash);
        }

        public function setPassword($password)
        {
            $this->password_hash = Yii::$app->security->generatePasswordHash($password);
        }

        public function generateAuthKey()
        {
            $this->auth_key = Yii::$app->security->generateRandomString();
        }

        public function generatePasswordResetToken()
        {
            $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
        }

        public function removePasswordResetToken()
        {
            $this->password_reset_token = null;
        }

        public static function afterLogin($event)
        {
            self::lastRequestTimeUpdate();
        }

        public static function lastRequestTimeUpdate() {
            $model = self::findIdentity(Yii::$app->user->identity->id);
            $model->last_request_time = time();
            $model->save();
        }     

        public static function removeUser($id) {
            $model = self::findIdentityFromDelete($id);
            $model->delete();
        }                     
    }
