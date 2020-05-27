<?php

class Site
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * Site constructor.
     * @param $id
     * @param $url
     */
    public function __construct($id, $url)
    {
        $this->id = $id;
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Site
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

}
