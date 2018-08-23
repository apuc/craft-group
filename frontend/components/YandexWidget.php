<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 23.08.18
 * Time: 11:55
 */

namespace frontend\components;


use backend\models\KeyValue;
use yii\base\Widget;

class YandexWidget extends Widget
{
    public $isView;

    public function beforeRun()
    {
        $this->isView = KeyValue::getValue('isViewMetrics');

        return parent::beforeRun(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub
        
        return $this->render('yandex/yandex', [
            'widget' => $this
        ]);
    }

}