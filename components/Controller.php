<?php

namespace psudev\dbmodules\components;

use Yii;

class Controller extends \psudev\dbmudules\components\Controller
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
