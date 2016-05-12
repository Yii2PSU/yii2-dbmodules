<?php

namespace psudev\dbmodules\modules\news;

class NewsModules extends \yii\base\Module
{
    public $controllerNamespace = 'psudev\dbmodules\modules\news\controllers';

    public $settings = [];

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        if(\Yii::$app->user->isGuest && !$this->settings['allowGuest'])
        {
          throw new \yii\web\HttpException(403, 'ไม่อนุญาต จ่ะ');
        }
    }
}
