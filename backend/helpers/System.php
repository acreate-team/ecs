<?php  

    namespace backend\helpers;

    use Yii;
    use backend\assets\NotificationAsset;

    class System {
        public static function notification($status, $text) {
			$view = Yii::$app->getView();
            NotificationAsset::register($view);
	
	        if($status == 'successSettings') $js = "$('#content').append('<div class=\"success successSettings\">" . $text ."</a></div>'); $('.success').slideDown(800, 'easeInOutExpo').delay(4000).slideUp(1200, 'easeInOutExpo')";
            else $js = "$('#content').append('<div class=\"success\">" . $text ."</a></div>'); $('.success').slideDown(800, 'easeInOutExpo').delay(4000).slideUp(1200, 'easeInOutExpo')";
	        $view->registerJs($js);            
        }
    }