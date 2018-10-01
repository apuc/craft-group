<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.09.18
 * Time: 17:45
 */

namespace frontend\modules\myths\models;
class Myths extends \common\models\Myths
{
	public function getText()
	{
		if (!empty($this->description)) return $this->description;
		return iconv_substr($this->content, 0, 750, 'UTF-8') . '...';
	}
}