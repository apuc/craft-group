<?php
/**
 * Yandex.Metrika counter for Yii2 applications.
 *
 * @link      https://github.com/hiqdev/yii2-yandex-metrika
 * @package   yii2-yandex-metrika
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2017, HiQDev (http://hiqdev.com/)
 */

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
//if (empty($params['yandexMetrika.id'])) {
//	return [];
//}
return [
	'on beforeRequest' => function () {
		$pathInfo = Yii::$app->request->pathInfo;
		$query = Yii::$app->request->queryString;
		if (!empty($pathInfo) && substr($pathInfo, -1) === '/') {
			$url = '/' . substr($pathInfo, 0, -1);
			if ($query) {
				$url .= '?' . $query;
			}
			Yii::$app->response->redirect($url, 301);
			Yii::$app->end();
		}
	},
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'thumbnail'],
	'modules' => [
		'portfolio' => [
			'class' => 'frontend\modules\portfolio\Portfolio',
			'layout' => 'service',
		],
        'landing' => [
            'class' => 'frontend\modules\landing\LandingPage',
            'layout' => 'landing'
        ],
		'blog' => [
			'class' => 'frontend\modules\blog\Blog',
			'layout' => 'service',
		],
		'service' => [
			'class' => 'frontend\modules\service\Service',
			'layout' => 'service',
		],
		'feedback' => [
			'class' => 'frontend\modules\feedback\Feedback',
			'layout' => 'service',
		],
		'about' => [
			'class' => 'frontend\modules\about\About',
			'layout' => 'service',
		],
		'vacancy' => [
			'class' => 'frontend\modules\vacancy\Vacancy',
			'layout' => 'service',
		],
		'myths' => [
			'class' => 'frontend\modules\myths\Myths',
			'layout' => 'service',
		],
	],
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    'controllerNamespace' => 'frontend\controllers',
	'layout'=> 'blog',
    'aliases' => [
	    '@myalias' => '@app',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'assetManager' => [
            'bundles' => [
                'nezhelskoy\highlight\HighlightAsset' => [
                    'css' => ['dist/styles/ocean.css'],
                ],
            ]
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
	            '/portfolio/<slug>' => '/portfolio/portfolio/single-portfolio',
            	'portfolio' => '/portfolio/portfolio',
	            '/blog/<slug>' => '/blog/blog/single-blog/',
	            'blog' => '/blog/blog',
	            '/service/<slug>' => '/service/service/single-service/',
	            'service' => '/service/service',
	            'blog/<slug>' => '/blog',
	            'feedback' => '/feedback/feedback',
	            'about' => '/about/about',
	            'vacancy' => '/vacancy/vacancy',
	            '/vacancy/<slug>' => '/vacancy/vacancy/single-vacancy/',
	            'myths' => '/myths/myths',
	            '/myths/<slug>' => '/myths/myths/single-myths',
                '/lp/<slug>' => '/landing/default/index',
            ],
        ],
//        'view' => [
//	        'as YandexMetrika' => [
//		        'class' => \hiqdev\yii2\YandexMetrika\Behavior::class,
//		        'builder' => [
//			        'class' => \hiqdev\yii2\YandexMetrika\CodeBuilder::class,
//			        'id' => $params['yandexMetrika.id'],
//			        'params' => $params['yandexMetrika.params'],
//		        ],
//	        ],
//        ],
	    /*Thumbnail image*/
        'thumbnail' => [
	        'class' => 'himiklab\thumbnail\EasyThumbnail',
	        'cacheAlias' => 'uploads/thumbnail',
        ],
	
		'og' => [
			'class' => 'frontend\components\OpengraphComponent'
		]
    ],
    'params' => $params,
];
