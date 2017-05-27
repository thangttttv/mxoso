<?php

    return array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'wapgame',

        'preload'=>array('log'),

        'import'=>array(
            'application.models.*',        
            'application.components.*',
            'application.extensions.*', 
            'application.extensions.url.*', 
            'application.utilities.*', 
            'zii.widgets.CPortlet',
        ),

        'defaultController'=>'home',
        'layout'=>'layouts/main',
        'modules' => array(
            '',
        ),

        'components'=>array(
            'user'=>array(			
                'allowAutoLogin'=>true,
            ),
            'import'=>array(
                'application.models.*',
                'application.components.*',
                'ext.Calendar.jCalendar',
            ),
            'counter' => array(
                'class' => 'UserCounter',
            ),

            'db'=>array(
                'connectionString' => 'mysql:host=127.0.0.1;dbname=vtc_10h_xs',
                'emulatePrepare' => true,
                'username' => 'uxoso10h',
                'password' => 'pxoso10h!@#456',
                'charset' => 'utf8',
            ),
            
            //'db'=>array(
//                'connectionString' => 'mysql:host=localhost;dbname=10h',
//                'emulatePrepare' => true,
//                'username' => 'root',
//                'password' => '',
//                'charset' => 'utf8',
//            ),

            'errorHandler'=>array(			
                'errorAction'=>'home/error',
            ),
            'urlManager'=>array(
                'urlFormat'=>'path',
                'showScriptName'=>false,            
                'caseSensitive' => true,
                'rules'=>array(
                    '/'=>'home/index',
                    '/truc-tiep-xo-so-mien-bac-xsmb.html'=>'home/mienbac',
                    '/truc-tiep-xo-so-mien-trung-xsmt.html'=>'home/mientrung',
                    '/truc-tiep-xo-so-mien-nam-xsmn.html'=>'home/miennam',
                    '/truc-tiep-xo-so-dientoan-xsdt.html'=>'home/dientoan',
                    '/truc-tiep-ket-qua-xo-so-mien-bac-xsmb.html'=>'home/tuongthuatmienbac',
                    '/truc-tiep-ket-qua-xo-so-mien-trung-xsmt.html'=>'home/tuongthuatmientrung',
                    '/truc-tiep-ket-qua-xo-so-mien-nam-xsmn.html'=>'home/tuongthuatmiennam',
                    '/ket-qua-xo-so-mien-bac-xsmb.html'=>'ketqua/mienbac',
                    '/ket-qua-xo-so-mien-trung-xsmt.html'=>'ketqua/mientrung',
                    '/ket-qua-xo-so-mien-nam-xsmn.html'=>'ketqua/miennam',
                    '/ket-qua-xo-so-dien-toan-xsdt.html'=>'ketqua/dientoan',
                    '/tim-kiem-ket-qua-xo-so.html'=>'ketqua/search',
                    '/tim-kiem-ket-qua-xo-so-mien-trung.html'=>'ketqua/searchmientrung',
                    '/tim-kiem-ket-qua-xo-so-mien-nam.html'=>'ketqua/searchmiennam',
                    '/thong-ke-nhanh-xo-so-mien-bac.html'=>'thongke/index',
                    '/thong-ke-vip-xo-so-mien-bac.html'=>'vip/index',
                    '/thong-ke-lich-su-giai-dac-biet.html'=>'vip/tkgiaidacbiet',
                    '/thong-ke-chu-ky.html'=>'vip/tkchuky',
                    '/quay-thu-xo-so.html'=>'tienich/quaythu',
                    '/chen-ma-nhung-ket-qua-xo-so.html'=>'tienich/chenkqxs',
                    '/so-mo-<page:\d+>.html'=>'tienich/somo',
                    '/lich-mo-thuong-xo-so.html'=>'tienich/calendar',
                    '/chu-de-hot-<page:\d+>.html'=>'user/chudehot',
                    '/dang-nhap.html'=>'user/index',
                    '/dang-ky.html'=>'user/register',
                    '/chudehot/<page:\d+>/<alias>-<id:\d+>.html'=>'user/detail',
                    '/doi-mat-khau.html'=>'user/changepass',
                    '/cap-nhat-thong-tin.html'=>'user/changeinfo',
                    '/<id:\d+>/ket-qua-xo-so-<alias>-xs<code>.html'=>'ketqua/ketquatheotinh',
                ),
            ),
            'cache' => array (
                'class'=>'system.caching.CFileCache',
                /*'class' => 'CMemCache',
                'servers'=>array(
                array(
                'host'=>'localhost',
                'port'=>11211,
                'weight'=>100,
                ),
                ),*/
            ),
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'=>'CFileLogRoute',
                        'levels'=>'error, warning',
                    ),
                ),
            ),
        ),

        'params'=>require(dirname(__FILE__).'/params.php'),
    );
?>