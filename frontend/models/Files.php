<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 24.08.18
 * Time: 14:40
 */

namespace frontend\models;


class Files extends \common\models\Files
{
    const ORDER = 1;
    const FEEDBACK = 2;
    const VACANCY_ORDER = 3;

    /**
     * @param number $extension
     * @param number $value
     */
    public function setExtensionId($extension, $value)
    {
        if ($extension == self::ORDER) $this->order_id = $value;
        if ($extension == self::FEEDBACK) $this->feedback_id = $value;
        if ($extension == self::VACANCY_ORDER) $this->vacancy_order_id = $value;
    }

}