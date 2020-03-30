<?php


    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap\ActiveForm;
    
    use vova07\imperavi\Widget;

?>
<ul class="breadcrumb">
    <li class="active"><?= $title ?></li>
</ul>

<div class="form">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

        <div class="cols-2 uppercase">
            <div class="col">
                <?= $form->field($model, 'name_calendar')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'numeric_calendar')->textInput() ?>
            </div>
            <div class="clear"></div>
        </div>

        <?= $form->field($model, 'url')->textInput() ?>        

        <?= $form->field($model, 'short_content')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 150,
                    'maxHeight' => 350,
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'imageManagerJson' => Url::to(['/site/images-get']),
                    'fileManagerJson' => Url::to(['/site/files-get']),
                    'fileUpload' => Url::to(['/site/file-upload']),         
                    'plugins' => [
                        'fullscreen',
                        'imagemanager',
                        'filemanager',
                        'source'
                    ]
                ]
            ]);
        ?>

        <?= $form->field($model, 'content')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 300,
                    'maxHeight' => 500,
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'imageManagerJson' => Url::to(['/site/images-get']),
                    'fileManagerJson' => Url::to(['/site/files-get']),
                    'fileUpload' => Url::to(['/site/file-upload']),         
                    'plugins' => [
                        'fullscreen',
                        'imagemanager',
                        'filemanager',
                        'source'
                    ]
                ]
            ]);
        ?>

        <?= $form->field($model, 'content_structure')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 300,
                    'maxHeight' => 500,
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'imageManagerJson' => Url::to(['/site/images-get']),
                    'fileManagerJson' => Url::to(['/site/files-get']),
                    'fileUpload' => Url::to(['/site/file-upload']),         
                    'plugins' => [
                        'fullscreen',
                        'imagemanager',
                        'filemanager',
                        'source'
                    ]
                ]
            ]);
        ?>

        <?= $form->field($model, 'content_actual')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 300,
                    'maxHeight' => 500,
                    'imageUpload' => Url::to(['/site/image-upload']),
                    'imageManagerJson' => Url::to(['/site/images-get']),
                    'fileManagerJson' => Url::to(['/site/files-get']),
                    'fileUpload' => Url::to(['/site/file-upload']),         
                    'plugins' => [
                        'fullscreen',
                        'imagemanager',
                        'filemanager',
                        'source'
                    ]
                ]
            ]);
        ?>

        <?= $form->field($model, 'keywords')->textInput() ?>

        <?= $form->field($model, 'description')->textInput() ?>

        <div class="form-group submit">
            <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => 'save']) ?>
            <a href="<?php echo Url::toRoute(['index']); ?>" class="back"><?= $model->isNewRecord ? 'Назад' : 'Отмена' ?></a>
        </div>

    <?php ActiveForm::end(); ?>
</div>