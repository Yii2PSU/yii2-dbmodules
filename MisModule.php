<?php

namespace mymis;

use Yii;
use mymis\models\Module;

class MisModule extends \yii\base\Module
{
    public $controllerNamespace = 'mymis\controllers';

    public $activeModules;

    public function init()
    {
        parent::init();

        $this->setModules($this->activeModules());

        $this->setModule('settings', ['class' => 'mymis\modules\settings\SettingsModule']);

        //print_r($this->getModules());

        $this->layoutPath = Yii::getAlias('@mymis/views/layouts');
        $this->layout = 'main';

    }

    public function activeModules()
    {
      $this->activeModules = Module::findAllActive();

      $modules = [];
      foreach ($this->activeModules as $name => $module) {
        $settings = [];
        $modules[$name]['class'] = $module->class;
        if (!empty($module->settings)) {
          $settings = \yii\helpers\Json::decode($module->settings);
        }
        if(is_array($settings)){
          $modules[$name]['settings'] = $settings;
        }
      }

      return $modules;
    }
}
