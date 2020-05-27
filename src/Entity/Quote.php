<?php

class Quote
{
    /**
     * @var int
     */
    private $id;

    /***
     * @var int
     */
    private $siteId;

    /**
     * @var int
     */
    private $destinationId;

    /**
     * @var DateTime
     */
    private $dateQuoted;

    /**
     * Quote constructor.
     * @param $id
     * @param $siteId
     * @param $destinationId
     * @param $dateQuoted
     */
    public function __construct($id, $siteId, $destinationId, $dateQuoted)
    {
        $this->id = $id;
        $this->siteId = $siteId;
        $this->destinationId = $destinationId;
        $this->dateQuoted = $dateQuoted;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * @param mixed $siteId
     * @return Quote
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDestinationId()
    {
        return $this->destinationId;
    }

    /**
     * @param mixed $destinationId
     * @return Quote
     */
    public function setDestinationId($destinationId)
    {
        $this->destinationId = $destinationId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateQuoted()
    {
        return $this->dateQuoted;
    }

    /**
     * @param mixed $dateQuoted
     * @return Quote
     */
    public function setDateQuoted($dateQuoted)
    {
        $this->dateQuoted = $dateQuoted;
        return $this;
    }

    /**
     * @param Quote $quote
     * @return string
     */
    public static function renderHtml(Quote $quote)
    {
        return '<p>' . $quote->id . '</p>';
    }

    /**
     * @param Quote $quote
     * @return string
     */
    public static function renderText(Quote $quote)
    {
        return (string) $quote->id;
    }
}