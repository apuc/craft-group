<?php

namespace frontend\modules\feedback;

/**
 * feedback module definition class
 */
class Feedback extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\feedback\controllers';

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
