<?php

namespace frontend\modules\about;

/**
 * about module definition class
 */
class about extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\about\controllers';

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
