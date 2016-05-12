<?php

namespace mymis\models;

use Yii;

/**
 * This is the model class for table "web_modules".
 *
 * @property integer $id
 * @property string $name
 * @property string $class
 * @property string $title
 * @property string $icon
 * @property string $settings
 * @property integer $status
 * @property integer $order_num
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'web_modules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'class', 'title', 'status', 'order_num'], 'required'],
            [['settings'], 'string'],
            [['status', 'order_num'], 'integer'],
            [['name', 'class', 'title', 'icon'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Module ID',
            'name' => 'ชื่อโมดูล',
            'class' => 'คลาส',
            'title' => 'ชื่อที่แสดง',
            'icon' => 'ไอค่อน',
            'settings' => 'ตั้งค่า',
            'status' => 'สถานะ',
            'order_num' => 'เรียง',
        ];
    }


    public static function findAllActive()
    {
      $result = [];
      foreach (self::find()->where(['status' => 1])->orderBy('order_num')->all() as $module) {
        $result[$module->name] = (object)$module->attributes;
      }

      return $result;
    }
}
