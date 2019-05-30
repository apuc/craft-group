<?php
/**
 * Created by PhpStorm.
 * User: kirill
 * Date: 29.05.19
 * Time: 14:21
 */
namespace frontend\components;
use yii\jui\Widget;

class WorksWidget extends Widget
{
    public $portfolio;

    public function run()
    {
        parent::run();
        if(isset($this->portfolio))
        return $this->render('works/works',['portfolio' => $this->portfolio]);
    }
}