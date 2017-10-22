<?php
/**
 * Created by PhpStorm.
 * User: craigmcfarlane
 * Date: 2017-10-21
 * Time: 8:23 PM
 */

// php index.php cnn trump
// php index.php cnn all politics
namespace classes;
require "classes/NewsStoryArray.php";
require "classes/NewsSite.php";
require "classes/NewsRequests.php";

if (strtolower($argv[1]) != 'cnn' && strtolower($argv[1]) != 'bbc')
    die ("Please try to search CNN or BBC.\n");

$site = new NewsSite(strtolower($argv[1]));
$request = new NewsRequests($argv[2], $site->getCode());

$result = $request->sendRequest();


if ($result < 300)
    $news = $request->createNews();

if (!isset($news))
    die ("Sorry no stories matched that\n");


$news->getStories();