<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 17.04.2018
 * Time: 11:40
 */
/**
* @var $service array
 * @var $portfolio array
 * @var $feedback array
 * @var $match array
 */

use  yii\helpers\Url;

$this->title =  $service['title'];
$img = Url::to('@web/img/');
?>
<!-- start content-service-corp.html-->
<main class="main-service">
	<section class="blog blog__single blog_about">
		<div class="container">
			
			<p class="paragraph">Услуги</p>

			<nav class="broadcrumbs">
				<a class="broadcrumbs__link" href="<?=Url::to('/')?>">Главная</a>
				<span class="broadcrumbs__divider"> / </span>
				<a class="broadcrumbs__link" href="<?=Url::to('/service')?>">Услуги</a>
				<span class="broadcrumbs__divider"> / </span>
				<span class="broadcrumbs__curr"><?=$service['title']?></span>
			</nav>
			
			<div class="wrap">
				<div class="tittle">
					<span>наши услуги</span>
					<h2><?=$service['title']?></h2>
				</div>
				
				<div class="store__desc">
						<p class="store__desc-text"><?=$service['description']?></p>
				</div>
				<?php preg_match_all('|<div class="after">(.*?)</div>|isU', $service['file'], $match);
				      $service['file'] = preg_replace('|<div class="after">(.*?)</div>|isU', '', $service['file']);
				      $service['file'] = str_replace('<ul', '<ul class="store__adv-list"', $service['file']);
				      $service['file'] = str_replace('<li', '<li class="store__adv-elem"', $service['file']);
				      
				?>
				<?php if($portfolio):?>
					<div class="store">
						<?=$service['file'];?>
						
						<div class="store__gallery">
							<div class="store__gallery-row">
								<div class="store__gallery-item store__gallery-item_portfolio store__gallery-item_bigger">
									<img class="store__gallery-img" src="<?=$img?>services-img.jpg" alt="">
									<a class="gallery__block-link" href="<?= Url::to(['/portfolio'])?>">Посмотреть все работы</a>
								</div>
								<?php $i = 0; foreach ( $portfolio as $key => $value ):?>
									<?php if($i < 2):?>
										<div class="store__gallery-item store__gallery-item_smaller">
											<a href="<?= Url::to(['/portfolio/'.$value['slug']])?>">
												<img class="store__gallery-img" src="<?=$value['file']?>">
											</a>
										</div>
									<?php endif;?>
									<?php $i++; endforeach;?>
							</div>
							
							<div class="store__gallery-row">
								<?php $n = 0; foreach ( $portfolio as $key => $value ):?>
									<?php if($n > 1):?>
										<div class="store__gallery-item store__gallery-item_smaller">
											<a href="<?=Url::to(['/portfolio/'.$value['slug']])?>">
												<img class="store__gallery-img" src="<?=$value['file']?>">
											</a>
										</div>
									<?php endif;?>
								<?php $n++; endforeach;?>
								
								<div class="store__gallery-item store__gallery-item_brief store__gallery-item_bigger">
									<h2>
										<a class="scroll" href="#brief">Заполните <br> бриф</a>
									</h2>
								</div>
							</div>
						</div>
						
					</div>
					<?php if(!empty($match[1][0])):?>
						<?=$match[1][0]?>
					<?php endif;?>
				<?php else:?>
					<?=$service['file'];?>
				<?php endif;?>
				<div class="feedbacks">
					<h2 class="feedbacks__title">Благодарные отзывы наших клиентов</h2>
					
					<div class="wrapper">
						<div class="grid grid_feedback">
							<?php foreach ($feedback as $key => $value):?>
								<div class="feedback-item">
									<header class="feedback-item__header">
										<div class="feedback-item__site">
											<a class="feedback-item__site-link" href="<?=$value['site']?>"><?=$value['site']?></a>
										</div>
										
										<div class="feedback-item__name">
											<p class="feedback-item__name-text"><?=$value['name']?> (<?=$value['city']?>)</p>
										</div>
									</header>
									
									<div class="feedback-item__content">
										<div class="feedback-item__desc">
											<p class="feedback-item__text"><?=$value['description']?></p>
											<p class="feedback-item__text"><?=$value['file']?></p>
										</div>
										
										<div class="feedback-item__from">
											<a class="feedback-item__from-link" href="https://vk.com"><img class="feedback-item__from-img feedback-item__from-img_vk" src="<?=$img?>vk.svg" alt="">отзыв в группе VK</a>
										</div>
									</div>
								</div>
							<?php endforeach;?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
