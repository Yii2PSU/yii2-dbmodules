<?php

namespace psudev\dbmodules;

use Yii;
use psudev\dbmodules\models\Module;

class MainModule extends \yii\base\Module
{
    public $controllerNamespace = 'psudev\dbmodules\controllers';

    public $activeModules;

    public function init()
    {
        parent::init();

        $this->setModules($this->activeModules());

        $this->setModule('settings', ['class' => 'psudev\dbmodules\modules\settings\SettingsModule']);

        //print_r($this->getModules());

        $this->layoutPath = Yii::getAlias('@psudev/dbmodules/views/layouts');
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
