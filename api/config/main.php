<?php



$params = array_merge(

    require(__DIR__ . '/../../common/config/params.php'),

    require(__DIR__ . '/../../common/config/params-local.php'),

    require(__DIR__ . '/params.php'),

    require(__DIR__ . '/../../common/config/params-local.php')

);



return [

    'id' => 'app-api',

    'basePath' => dirname(__DIR__),    

    'bootstrap' => ['log'],

    'modules' => [

        'v1' => [

            'basePath' => '@app/modules/v1',

            'class' => 'api\modules\v1\Module'

        ]

    ],

    'components' => [        

        'user' => [

            'identityClass' => 'common\models\User',

            'enableAutoLogin' => false,

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

        'urlManager' => [

            'enablePrettyUrl' => true,

            'enableStrictParsing' => true,

            'showScriptName' => false,

            'rules' => [

               

                [

                    'class' => 'yii\rest\UrlRule', 

                    'controller' => 'v1/login',

                    'extraPatterns' => [

                        'POST login' => 'login',

                        'POST getusers' => 'getusers',

                        'POST getusersbydept' => 'getusersbydept'

                        

                    ],

                    'tokens' => [

                        '{id}' => '<id:\\w+>'

                    ],

                ],


                [

                    'class' => 'yii\rest\UrlRule', 

                    'controller' => 'v1/master',

                    'extraPatterns' => [

                        
                        'POST notificationlistall' => 'notificationlistall',

                        'GET sendbanner' => 'sendbanner',
                        'GET noticeboard' => 'noticeboard',
                        'GET features' => 'features',
                        'GET aboutschool' => 'aboutschool',
                        'GET adminmessage' => 'adminmessage',
                        'GET sendstaff' => 'sendstaff',
                        'GET achievement' => 'achievement',
                        'GET district' => 'district',
                        'GET state' => 'state',
                        'GET session' => 'session',
                        'GET socialcategory' => 'socialcategory',
                        'POST contactform' => 'contactform',
                        'POST conceptregistration' => 'conceptregistration',
                        

                    ],

                    'tokens' => [

                        '{id}' => '<id:\\w+>'

                    ],

                ],   

                

            ],        

        ]

    ],

    'params' => $params,

];







