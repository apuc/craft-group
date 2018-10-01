<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 14.09.18
 * Time: 10:48
 */

namespace console\components;


use common\models\BlogSlider;
use common\models\Portfolio;
use Yii;
use yii\base\Component;

class CompressingImageComponent extends Component
{
	const COMPRESSING_ON = 1;
	const COMPRESSING_OFF = 0;

	/**
	 * @param BlogSlider[]|Portfolio[] $articles
	 */
	public function compressing(array $articles)
	{
		foreach ($articles as $article) {
			if ($article instanceof BlogSlider || $article instanceof Portfolio) {
				/**
				 * @var BlogSlider|Portfolio $article
				 */
				$images = $this->getImage($article);
				echo 'Соединяюсь с апи' . PHP_EOL;
				\Tinify\setKey("BBHX7sqDKEUF67Ty4WhQsliTRlXsvGAh");
				echo 'Сжатие картинок началось' . PHP_EOL;
				foreach ($images as $image) {
					if (file_exists($this->getPath($image))) {
						$source = \Tinify\fromFile($this->getPath($image));
						$source->toFile($this->getPath($image));
						echo 'Сжато ' . $this->getPath($image) . PHP_EOL;
					}
				}
				$article->compressing_image = self::COMPRESSING_OFF;
				echo 'Картинки в посте ' . $article->id . ' обновлены' . PHP_EOL;
				$save = $article->save();
				if (!$save) {
					var_dump($article->errors);
				}
				echo 'Обновление картинок в посте отключено' . PHP_EOL;
			} else {
				echo 'Ошибка в посте ' . $article->id . PHP_EOL;
			}
		}
	}

	public function getCompressingOn()
	{
		return self::COMPRESSING_ON;
	}

	public function getCompressingOff()
	{
		return self::COMPRESSING_OFF;
	}

	/**
	 * @param BlogSlider|Portfolio $article
	 * @return array
	 */
	private function getImage($article)
	{
		$regex = '#<img.*src="(.*)".*>#isU';
		$txt = strip_tags($article->description, '<img>');
		preg_match_all($regex, $txt, $matches);
		$images = $matches[1];
		$images[] = $article->file;
		return $this->urlDecode($images);
	}

	/**
	 * @param string $image
	 * @return bool|string
	 */
	private function getPath(string $image)
	{
		return Yii::getAlias('@frontend/web' . $image);
	}

	/**
	 * @param array $images массив урлов с картинками
	 * @return array
	 */
	private function urlDecode(array $images)
	{
		foreach ($images as $key => $image) {
			$images[$key] = rawurldecode($image);
		}
		return $images;
	}
}