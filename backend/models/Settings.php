<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

class Settings extends ActiveRecord {
	public $title, $description, $keywords, $email;
	
	public function rules()
	{
		return [
			[['title', 'email'], 'required'],
			
			[['title', 'description', 'keywords'], 'string'],

            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
		];
	}
	
	public function fields() {
	        return ['title', 'description', 'keywords', 'email'];
	}
	
	public function attributes() {
	        return ['title', 'description', 'keywords', 'email'];
	}

    public function attributeLabels() { 
        return [
            'title' => 'Заголовок', 
            'description' => 'Описание',
            'keywords' => 'Ключевые слова',
            'email' => 'E-Mail администратора'
        ]; 
    }	

	public function saveSettings() {
        if (!$this->validate()) {
            return null;
        }	
        
        $settings = Yii::$app->settings;
		$settings->set('app.title', $this->title);
		$settings->set('app.description', $this->description);
		$settings->set('app.keywords', $this->keywords);
		$settings->set('email.admin', $this->email);
		$settings->clearCache();
    	Yii::$app->frontendCache->flush();

        return true;	
	}
}
