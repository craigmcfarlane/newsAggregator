<?php
/**
 * Created by PhpStorm.
 * User: craigmcfarlane
 * Date: 2017-10-21
 * Time: 8:23 PM
 */

// php index.php cnn trump
// php index.php twitter trump
// php index.php cnn all politics
require __DIR__ . "/vendor/autoload.php";

use classes\tweets as tw;
use classes\news as news;
$news = false;

if (strtolower($argv[1]) == 'twitter')
    $request = new tw\Requests($argv[2]);
else if (strtolower($argv[1]) == 'cnn' && strtolower($argv[1]) == 'bbc')
    $request = new news\Requests($argv[2], $site->getCode());
else
    die ("Please try to search Twitter, CNN or BBC.\n");

$site = new classes\Site(strtolower($argv[1]));

$result = $request->sendRequest();
if (strtolower($argv[1]) == 'cnn' && strtolower($argv[1]) == 'bbc')
{
    if ($result < 300)
        $news = $request->createNews();
}
else if (strtolower($argv[1]) == 'twitter')
{
    $news = $request->createNews();
}

if (!isset($news))
    die ("Sorry no stories matched that\n");


$news->getStories();