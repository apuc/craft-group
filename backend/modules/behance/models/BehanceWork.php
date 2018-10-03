<?php

namespace backend\modules\behance\models;

use Yii;


class BehanceWork extends \common\models\BehanceWork
{
    public function getAccount() {
        return $this->hasOne(BehanceAccount::className(), ['id' => 'account_id']);
    }
}
