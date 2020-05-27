<?php

class Destination
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $countryName;

    /**
     * @var string
     */
    public $conjunction;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $computerName;

    /**
     * Destination constructor.
     * @param $id
     * @param $countryName
     * @param $conjunction
     * @param $computerName
     */
    public function __construct($id, $countryName, $conjunction, $computerName)
    {
        $this->id = $id;
        $this->countryName = $countryName;
        $this->conjunction = $conjunction;
        $this->computerName = $computerName;
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
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param string $countryName
     * @return Destination
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
        return $this;
    }

    /**
     * @return string
     */
    public function getConjunction()
    {
        return $this->conjunction;
    }

    /**
     * @param string $conjunction
     * @return Destination
     */
    public function setConjunction($conjunction)
    {
        $this->conjunction = $conjunction;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Destination
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getComputerName()
    {
        return $this->computerName;
    }

    /**
     * @param string $computerName
     * @return Destination
     */
    public function setComputerName($computerName)
    {
        $this->computerName = $computerName;
        return $this;
    }

}
