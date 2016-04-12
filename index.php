<?php


$title = [
];
$lang = [
    'en' => [
        'title' => 'This domain is for sale.',
        'description' => '',
        'contactUs' => 'contact us',
    ],
    'zh' => [
        'title' => '该域名出售！',
        'description' => '',
        'contactUs' => '联系我们',
    ],
];
$view['lang'] = getBrowserLanguage();
$view['currentDomain'] = getDomain();
$view['title'] = $view['currentDomain'] . $lang[$view['lang']]['title'];
$view['contactUs'] = $lang[$view['lang']]['contactUs'];
$view['mail'] = 'yingouqlj@163.com';
//var_dump($view);
function getDomain()
{
    return $_SERVER['SERVER_NAME'];
}

function getBrowserLanguage()
{
    foreach (explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']) as $lang) {
        $pattern = '/^(?P<primarytag>[a-zA-Z]{2,8})' .
            '(?:-(?P<subtag>[a-zA-Z]{2,8}))?(?:(?:;q=)' .
            '(?P<quantifier>\d\.\d))?$/';
        $splits = array();
        //printf("Lang:,,%s''\n", $lang);
        if (preg_match($pattern, $lang, $splits)) {
            //  print_r($splits);
            return $splits[1];
        }

    }
    return 'en'; //默认
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?= $view['title'] ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<style type="text/css">
    body {
        color: #222;
        font-family: arial, helvetica, sans-serif;
        background: #dfdfdf;
    }

    .center {
        height: 250px;
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
    }
</style>

<body>
<div id="content">
    <div class="center">
        <h1><?= $view['title'] ?></h1>

        <p><strong></strong></p>

        <p><?= $view['contactUs'] ?> ：<a href="mailto:<?= $view['mail'] ?>" target="_blank"><?= $view['mail'] ?></a></p>
    </div>
</div>
</body>
</html>
