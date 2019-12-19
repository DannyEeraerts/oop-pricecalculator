<?php


class organisation
{
    public $organisationId;
    public $organisationName;
    public $discountAmount;
    public $discountId;

    public function __construct($organisationId, $organisationName, $discountAmount, $discountId)
    {
        $this->organisationId = $organisationId;
        $this->organisationName = $organisationName;
        $this->discountAmount = $discountAmount;
        $this->discountId = $discountId;
    }

    public function get_organisationId()
    {
        return $this->organisationId;
    }

    public function get_organisationtName()
    {
        return $this->organisationName;
    }

    public function get_discountAmount()
    {
        return $this->discountAmount;
    }

    public function get_discountId()
    {
        return $this->discountId;
    }


}
