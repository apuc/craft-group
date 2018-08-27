<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
	                ['label' => Yii::t('main', 'Main'), 'icon' => 'fas fa-home',
	                 'url' => ['/main/main']],
	                ['label' => Yii::t('blog', 'Blog Slider'), 'icon' => 'fas fa-bold',
	                 'url' => ['/blog_slider/blog-slider']],
	                ['label' => Yii::t('portfolio', 'Portfolio'), 'icon' => 'far fa-image',
	                 'url' => ['/portfolio/portfolio'],
	                  'items' => [
		                  ['label' => 'Добавить портфолио', 'icon' => 'fas fa-cogs', 'url' => ['/portfolio/portfolio', 'slug' => ''],],
		                  ['label' => '5 картинок для главной', 'icon' => 'fas fa-cogs', 'url' => ['/portfolio/portfolio/main', 'slug' => '1'],],]
	                ],
	                ['label' => Yii::t('contacts', 'Contacts'), 'icon' => 'fas fa-address-card',
	                 'url' => ['/contacts/contacts']],
	                ['label' => Yii::t('service', 'Service'), 'icon' => 'fas fa-car',
	                 'url' => ['/service/service']],
	                ['label' => Yii::t('feedback', 'Feedback'), 'icon' => 'far fa-comments',
	                 'url' => ['/feedback/feedback']],
	                ['label' => Yii::t('about', 'About'), 'icon' => 'fas fa-info',
	                 'url' => ['/about/about']],
	                ['label' => Yii::t('vacancy', 'Vacancy'), 'icon' => 'fas fa-binoculars',
	                 'url' => ['/vacancy/vacancy']],
	                ['label' => Yii::t('myths', 'Myths'), 'icon' => 'far fa-comments',
	                 'url' => ['/myths/myths']],
	                [
		                'label' => 'SEO',
		                'icon' => 'fas fa-wrench',
		                'url' => '#',
		                'items' => [
			                ['label' => 'Главная', 'icon' => 'fas fa-cogs', 'url' => ['/seo/seo/page', 'slug' => 'main'],],
			                ['label' => 'Блог', 'icon' => 'fas fa-cogs', 'url' => ['/seo/seo/page', 'slug' => 'blog'],],
			                ['label' => 'Портфолио', 'icon' => 'fas fa-cogs', 'url' => ['/seo/seo/page', 'slug' => 'portfolio'],],
			                ['label' => 'Услуги', 'icon' => 'fas fa-cogs', 'url' => ['/seo/seo/page', 'slug' => 'service'],],
			                ['label' => 'О нас', 'icon' => 'fas fa-cogs', 'url' => ['/seo/seo/page', 'slug' => 'about'],],
			                ['label' => 'Отзывы', 'icon' => 'fas fa-cogs', 'url' => ['/seo/seo/page', 'slug' => 'feedback'],],
			                ['label' => 'Вакансии', 'icon' => 'fas fa-cogs', 'url' => ['/seo/seo/page', 'slug' => 'vacancy'],],
			                
		                ]
	                ],
	                ['label' => Yii::t('menu', 'Menu'), 'icon' => 'fas fa-info',
	                 'url' => ['/menu/menu']],
					['label' => 'Опции', 'icon' => 'service',
						'url' => ['/key-value']],
	                ['label' => 'Очистить кэш', 'icon' => 'fas fa-service',
	                 'url' => ['/cache']],
					['label' => 'Заказы', 'icon' => 'first-order',
						'url' => ['/order']],
					['label' => 'Заявка на вакансию', 'icon' => 'first-order',
						'url' => ['/vacancy-order']],
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
//                    [
//                        'label' => 'Some tools',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
