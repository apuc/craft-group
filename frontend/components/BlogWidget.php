<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.08.18
 * Time: 16:23
 */

namespace frontend\components;


use common\models\BlogSlider;
use yii\base\Widget;
use yii\db\Expression;

class BlogWidget extends Widget
{
	public $curr_blog = NULL;
	public $rand = NULL;
	
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub
        $b_cur = BlogSlider::find()->where(['h1' => 'current'])->one();
	    $blog = BlogSlider::find()->where(['!=', 'h1', 'current'])->andWhere(['!=', 'slug', $this->curr_blog])->orderBy(new Expression('rand()'), ['date' => SORT_DESC])->limit(5)->orderBy('date desc')->all();
        return $this->render('blog/blog', [
            'b_cur' => $b_cur,
            'blog' => $blog
        ]);
    }

}