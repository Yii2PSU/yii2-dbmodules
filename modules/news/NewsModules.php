<?php

namespace mymis\modules\news;

class NewsModules extends \yii\base\Module
{
    public $controllerNamespace = 'mymis\modules\news\controllers';

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
