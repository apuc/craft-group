<?php

namespace frontend\modules\myths;

/**
 * myths module definition class
 */
class Myths extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\myths\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->layout = 'service';
        $this->layoutPath = '@frontend/views/layouts';

        // custom initialization code goes here
    }
}
