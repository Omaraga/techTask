<?php

return array(
    // Пользователь:
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'admin/edit/([0-9]+)'=>'admin/edit/$1',
    'admin/check/([0-9]+)'=>'admin/check/$1',
    'admin/page-([0-9]+)'=>'admin/index/$1',
    'admin'=>'admin/index',
    'page-([0-9]+)'=>'site/index/$1',
    'index.php' => 'site/index', // actionIndex в SiteController
    '([0-9a-zA-Z]+)' => 'site/index',
    '' => 'site/index'

);
