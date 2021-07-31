<?php

namespace Alura\Calisthenics\Domain\Student;

class Address
{

    public string $country;
    public string $number;
    public string $province;
    public string $city;
    public string $street;
    public string $state;

    public function __construct(
        string $street,
        string $number,
        string $province,
        string $state,
        string $city,
        string $country
    )
    {
        $this->country = $country;
        $this->number = $number;
        $this->province = $province;
        $this->city = $city;
        $this->street = $street;
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getProvince(): string
    {
        return $this->province;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

}
