<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
	    'blog_slider' => [
		    'class' => 'backend\modules\blog_slider\BlogSlider',
	    ],
	    'portfolio' => [
		    'class' => 'backend\modules\portfolio\Portfolio',
	    ],
	    'contacts' => [
		    'class' => 'backend\modules\contacts\contacts',
	    ],
	    'service' => [
		    'class' => 'backend\modules\service\Service',
	    ],
	    'feedback' => [
		    'class' => 'backend\modules\feedback\feedback',
	    ],
	    'about' => [
		    'class' => 'backend\modules\about\about',
	    ],
	    'vacancy' => [
		    'class' => 'backend\modules\vacancy\vacancy',
	    ],
	    'seo' => [
		    'class' => 'backend\modules\seo\seo',
	    ],
	    'main' => [
		    'class' => 'backend\modules\main\main',
	    ],
	    'menu' => [
		    'class' => 'backend\modules\menu\menu',
	    ],
	    'myths' => [
		    'class' => 'backend\modules\myths\myths',
	    ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        /*ЧПУ*/
        'urlManager' => [
	        'enablePrettyUrl' => true,
	        'showScriptName' => false,
//	        'class'=>'backend\components\LangUrlManager',
//	        'languages' => ['en', 'ru'],
	        'rules' => [
		        '/' => 'admin/index',
		        '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
		        'page/<view:[a-zA-Z0-9-]+>' => 'site/page',
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
			    'baseUrl'=>'@web',
			    'basePath'=>'@webroot',
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
	
    'params' => $params,
];
