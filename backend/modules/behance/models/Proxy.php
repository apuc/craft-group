<?php

namespace backend\modules\behance\models;

use Yii;
use yii\db\Command;


class Proxy extends \common\models\Proxy
{
  public function FillProxyTable($data)
  {
      Yii::$app->db->createCommand()->batchInsert('proxy_ip', ['ip'], $data)->execute();
  }
}
