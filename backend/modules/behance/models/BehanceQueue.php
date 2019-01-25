<?php

namespace backend\modules\behance\models;

use Yii;

class BehanceQueue extends \common\models\BehanceQueue
{
   public function getWork()
   {
       return $this->hasOne(BehanceWork::className(),['id'=>'work_id']);
   }
}
