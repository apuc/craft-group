<?php

namespace frontend\modules\service;

/**
 * service module definition class
 */
class Service extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\service\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->layout = 'service';
        $this->layoutPath = '@frontend/views/layouts';

        // custom initialization code goes here
    }
}
