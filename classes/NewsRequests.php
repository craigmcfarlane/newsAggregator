<?php
/**
 * Created by PhpStorm.
 * User: craigmcfarlane
 * Date: 2017-10-22
 * Time: 9:46 AM
 */

namespace classes;

class NewsRequests
{
    private $baseUrl = "https://www.googleapis.com/customsearch/v1?";
    private $apiKey = "AIzaSyD363DS7XXOqQUITbUW3eHfMsdQ4iqmoIQ";
    protected $search;
    protected $url;
    protected $engineId;
    protected $result;

    /**
     * NewsRequests constructor.
     * @param $search
     */
    public function __construct($search, $engineId)
    {
        $this->search = $search;
        $this->engineId = $engineId;
        $this->constructUrl();
    }


    public function sendRequest()
    {
        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        $this->result = $result->items;
        return  curl_getinfo($ch,CURLINFO_HTTP_CODE);

    }

    public function createNews()
    {
        $news = new NewsStoryArray($this->result);
        return $news;
    }

    private function constructUrl()
    {
        $this->url = $this->baseUrl . 'key=' . $this->apiKey . '&cx=' . $this->engineId . '&q=' . $this->search;
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
    public function getEngineId()
    {
        return $this->engineId;
    }

    /**
     * @param mixed $engineId
     */
    public function setEngineId($engineId)
    {
        $this->engineId = $engineId;
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