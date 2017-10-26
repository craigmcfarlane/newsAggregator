<?php
/**
 * Created by PhpStorm.
 * User: craigmcfarlane
 * Date: 2017-10-22
 * Time: 9:46 AM
 */

namespace classes\tweets;
use Abraham\TwitterOAuth\TwitterOAuth;
use function PHPSTORM_META\type;

class Requests
{
    protected $search;
    protected $url;
    protected $connection;
    protected $result;

    /**
     * Requests constructor.
     * @param $search
     */
    public function __construct($search)
    {
        $ini_array = parse_ini_file("config.ini");
        $this->connection = new TwitterOAuth($ini_array["CONSUMER_KEY"], $ini_array["CONSUMER_SECRET"], $ini_array["ACCESS_TOKEN"], $ini_array["ACCESS_TOKEN_SECRET"]);
        $content = $this->connection->get("account/verify_credentials");
        $this->search = $search;
    }


    public function sendRequest()
    {
        $statuses = $this->connection->get("search/tweets", ["count" => 25, "exclude_replies" => true, "q" => $this->search]);
        $this->result = $statuses->statuses;
        if (!empty($this->result)) return true;
        else return false;
    }

    public function createNews()
    {
        $news = new StoryArray($this->result);
        return $news;
    }

    /**
     * @return mixed
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * @param mixed $search
     */
    public function setSearch($search)
    {
        $this->search = $search;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }
}