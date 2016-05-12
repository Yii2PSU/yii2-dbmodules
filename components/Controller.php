<?php

namespace mymis\components;

use Yii;

class Controller extends \yii\web\Controller
{
	public function init()
	{
		parent::init();

		if(Yii::$app->user->isGuest){
			echo 'Please login.';
			//$this->redirect(['/site/index']);
		}
	}
}
