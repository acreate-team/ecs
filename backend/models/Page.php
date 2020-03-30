<?php

namespace app\models;

use Yii;

class Page extends \yii\db\ActiveRecord {
    public function rules()
    {
        return [
            [['name', 'short_content'], 'required'],
            [['date_update', 'date_create', 'numeric_calendar'], 'integer'],
            [['url', 'name', 'name_calendar'], 'string', 'max' => 255],
            [['keywords', 'description', 'short_content', 'content', 'content_structure', 'content_actual'], 'string'],
            [['url', 'numeric_calendar'], 'unique']
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ],
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'numeric_calendar' => '1-9',
            'url' => 'ссылка',
            'name' => 'название',
            'name_calendar' => 'А-Я',
            'content' => 'история',
            'content_structure' => 'структура',
            'content_actual' => 'актуальность',
            'short_content' => 'превью',
            'keywords' => 'ключевые слова',
            'description' => 'описание',
            'date_update' => 'дата обновления',
            'date_create' => 'дата создания',
            'status' => 'статус'
        ];
    } 
}
