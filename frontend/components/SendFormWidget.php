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
    public $messageLabel;
    public $messagePlaceholder = 'Ваше соощение';
    public $textButton = 'Отправить бриф';
    public $isLabels = false;
    public $idForm = 'send_vacancy';
    public $fileExtension = "jpg, jpeg, png, gif, zip, rar, pdf, doc, xls";

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub

        $model = new SendForm();
        $model->subject = $this->subject;

        if ($this->isLabels) $model->setRadioList();

        return $this->render('form', [
            'model' => $model,
            'widget' => $this,
        ]);
    }
}