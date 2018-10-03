<?php

namespace frontend\modules\landing\controllers;

use backend\modules\landing\models\LandingAsset;
use backend\modules\landing\models\LpOption;
use yii\web\Controller;
use frontend\modules\landing\models\LangingPage;

/**
 * Default controller for the `landing` module
 */
class DefaultController extends Controller
{

    public function actionIndex($slug,$utm_term)
    {

       $page = LangingPage::findOne(['slug'=>$slug]);

       $html = $this->addCss($page->content);
       $html = $this->addJS($html);
       $html = $this->replaceVariables($page->id,$utm_term,$html);

       return $this->render('index',['content'=>$html]);
    }

    private function replaceVariables($id,$metka,$html)
    {
        $vars = LpOption::find()->where('lp_id='.$id)->andWhere('metka="'.$metka.'"')->all();

        if(empty($vars))
        {
           $html = preg_replace("/{{([a-z])*\|/","",$html);
           return preg_replace("/}}/","",$html);
        }

       $html = preg_replace("/\|(.)*}}/","}}",$html);

       foreach ($vars as $var)
       {
          $html = str_replace("{{".$var->key."}}",$var->value,$html);
       }

       return $html;
    }

    private function addCss($html)
    {
        $cssAssets = LandingAsset::find()->where('type=1')->all();
        $links = "";

        foreach ($cssAssets as $link)
        {
            $links.= "<link rel='stylesheet' type='text/css' href='".$link->path."'>";
        }

        return str_replace("{{css}}",$links,$html);
    }

    private function addJS($html)
    {
        $jsAssets = LandingAsset::find()->where('type=0')->all();
        $scripts = "";

        foreach ($jsAssets as $script)
        {
            $scripts.= "<script src='".$script->path."'></script>";
        }

        return str_replace("{{js}}",$scripts,$html);
    }

}
