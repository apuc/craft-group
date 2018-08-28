<?php
return [
	'name' => 'web-artcraft',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
	    'user' => [
		    'class' => 'dektrium\user\Module',
		    'enableUnconfirmedLogin' => true,
		    'confirmWithin' => 21600,
		    'cost' => 12,
		    'admins' => ['admin'],
	    ],
	    'rbac' => 'dektrium\rbac\RbacWebModule',
	    'robotsTxt' => [
		    'class' => 'execut\robotsTxt\Module',
		    'components'    => [
			    'generator' => [
				    'class' => \execut\robotsTxt\Generator::class,
				    'host' => 'localhost',
				    'sitemap' => 'sitemap.xml',
				    //or generate link through the url rules
				    'sitemap' => [
					    'sitemapModule/sitemapController/sitemapAction',
				    ],
				    'userAgent' => [
					    '*' => [
						    'Disallow' => [
							    'noIndexedHtmlFile.html',
							    [
								    'notIndexedModule/noIndexedController/noIndexedAction',
								    'noIndexedActionParam' => 'noIndexedActionParamValue',
							    ]
						    ],
						    'Allow' => [
							    //..
						    ],
					    ],
					    'BingBot' => [
						    'Sitemap' => '/sitemapSpecialForBing.xml',
						    'Disallow' => [
							    //..
						    ],
						    'Allow' => [
							    //..
						    ],
					    ],
				    ],
			    ],
		    ],
	    ],
	    'sitemap' => [
		    'class' => 'himiklab\sitemap\Sitemap',
		    'models' => [
			    // your models
			    'common\models\Portfolio',
			    'common\models\BlogSlider',
			    'common\models\Service',
			    'common\models\Vacancy',
		    ],
		    'urls'=> [
			    // your additional urls
			    [
				    'loc' => '/',
				    'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
				    'priority' => 1,
				    'lastmod' => date("Y-m-d H:i:s", filemtime('/')),
//				    'news' => [
//					    'publication'   => [
//						    'name'          => 'Example Blog',
//						    'language'      => 'en',
//					    ],
//					    'access'            => 'Subscription',
//					    'genres'            => 'Blog, UserGenerated',
//					    'publication_date'  => 'YYYY-MM-DDThh:mm:ssTZD',
//					    'title'             => 'Example Title',
//					    'keywords'          => 'example, keywords, comma-separated',
//					    'stock_tickers'     => 'NASDAQ:A, NASDAQ:B',
//				    ],
//				    'images' => [
//					    [
//						    'loc'           => 'http://example.com/image.jpg',
//						    'caption'       => 'This is an example of a caption of an image',
//						    'geo_location'  => 'City, State',
//						    'title'         => 'Example image',
//						    'license'       => 'http://example.com/license',
//					    ],
//				    ],
			    ],
		    ],
		    'enableGzip' => true, // default is false
		    'cacheExpire' => 1, // 1 second. Default is 24 hours
	    ],
    ],
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
			'cachePath' => Yii::getAlias('@frontend') . '/runtime/cache'
        ],
        'opengraph' => [
	        'class' => 'fgh151\opengraph\OpenGraph',
        ],
        'mailer' => [
	        'class' => 'yii\swiftmailer\Mailer',
	        'useFileTransport' => false,
	        'transport' => [
		        'class' => 'Swift_SmtpTransport',
		        'host' => 'mail.adm.tools',
		        'username' => 'info@web-artcraft.com',
		        'password' => '123edsaqw',
		        'port' => '465',
		        'encryption' => 'ssl',
	        ],
        ],
        'urlManager' => [
	        'enablePrettyUrl' => true,
	        'showScriptName' => false,
//	        'class'=>'backend\components\LangUrlManager',
//	        'languages' => ['en', 'ru'],
	        'rules' => [
		        '' => 'site/index',
		        ['pattern' => 'robots', 'route' => 'robotsTxt/web/index', 'suffix' => '.txt'],
		        ['pattern' => 'sitemap', 'route' => 'sitemap/default/index', 'suffix' => '.xml'],
//		        '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
//		        'page/<view:[a-zA-Z0-9-]+>' => 'site/page',
	        ],

        ],
        'authManager'  => [
//	        'class'        => 'yii\rbac\DbManager',
	        'class' => 'dektrium\rbac\components\DbManager',
        ],
	    
        'i18n' => [
	        'translations' => [
		        '*' => [
			        'class' => 'yii\i18n\PhpMessageSource',
			        'basePath' => '@common/messages',
			        'sourceLanguage' => 'ru',
			        'fileMap' => [
				        'main' => 'main.php',
			        ],
		        ],
	        ],
        ],
	    /*AdminLte2*/
//        'view' => [
//	        'theme' => [
//		        'pathMap' => [
//			        '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
//		        ],
//	        ],
//        ],
       
	    
    ],
	'controllerMap' => [
		'elfinder' => [
			'class' => 'mihaildev\elfinder\PathController',
			'access' => ['@'],
			'root' => [
				'baseUrl'=>'',
				'basePath'=>'@frontend/web',
				'path' => 'upload/global',
				'name' => 'Global'
			],
//		    'watermark' => [
//			    'source'         => __DIR__.'/logo.png', // Path to Water mark image
//			    'marginRight'    => 5,          // Margin right pixel
//			    'marginBottom'   => 5,          // Margin bottom pixel
//			    'quality'        => 95,         // JPEG image save quality
//			    'transparency'   => 70,         // Water mark image transparency ( other than PNG )
//			    'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
//			    'targetMinPixel' => 200         // Target image minimum pixel size
//		    ]
		]
	],
];
