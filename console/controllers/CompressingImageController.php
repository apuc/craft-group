<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13.09.18
 * Time: 16:08
 */

namespace console\controllers;


use common\models\BlogSlider;
use Yii;
use yii\console\Controller;

class CompressingImageController extends Controller
{
	public function actionIndex()
	{
		$articles = BlogSlider::find()->where(['compressing_image' => BlogSlider::COMPRESSING_ON])->all();
		foreach ($articles as $article) {
			/**
			 * @var BlogSlider $article
			 */
			$images = $this->getImage($article);
			echo 'Соединяюсь' . PHP_EOL;
			\Tinify\setKey("BBHX7sqDKEUF67Ty4WhQsliTRlXsvGAh");
			echo 'Нарезаю картинки' . PHP_EOL;
			foreach ($images as $image) {
				if (file_exists($this->getPath($image))) {
					$source = \Tinify\fromFile($this->getPath($image));
					$source->toFile($this->getPath($image));
					echo 'Сжато ' . $this->getPath($image) . PHP_EOL;
				}
			}
			$article->compressing_image = BlogSlider::COMPRESSING_OFF;
			$article->update();
		}
	}

	/**
	 * @param BlogSlider $article
	 * @return array
	 */
	private function getImage(BlogSlider $article)
	{
		$regex = '#<img.*src="(.*)".*>#isU';
		$txt = strip_tags($article->description, '<img>');
		preg_match_all($regex, $txt, $matches);
		$images = $matches[1];
		$images[] = $article->file;
		return $images;
	}

	private function getPath(string $image)
	{
		return Yii::getAlias('@frontend/web' . $image);
	}
}