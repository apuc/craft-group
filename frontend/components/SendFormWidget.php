<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21.08.18
 * Time: 16:58
 */

namespace frontend\components;

use frontend\models\SendForm;

class SendFormWidget extends \yii\base\Widget
{

    public $subject;
    public $message;
    public $isLabels = false;

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub

        $model = new SendForm();
        $model->subject = $this->subject;

        if ($this->isLabels) $model->setRadioList();

        $message = $this->message;

        $isLabels = $this->isLabels;

        return $this->render('form', [
            'model' => $model,
            'isLabels' => $isLabels,
            'message' => $message
        ]);
    }
}