<?php
/**
 * Created by PhpStorm.
 * User: craigmcfarlane
 * Date: 2017-10-21
 * Time: 9:15 PM
 */

namespace classes;

class Site
{
    protected $site;
    protected $code;

    public function __construct($site = null)
    {
        $this->site = $site;
        $this->setCode();
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site)
    {
        $this->site = $site;
        $this->setCode();
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    public function setCode()
    {
        switch ($this->site)
        {
            case "cnn":
                $this->code = "012077085364390636576:imtj5f-p8jy";
                break;
            case "bbc":
                $this->code = "012077085364390636576:lnu5zzntmy4";
                break;
            default:
                $this->code = "012077085364390636576:dncfvkdv38k";
                $this->site = "google";
        }
    }
}