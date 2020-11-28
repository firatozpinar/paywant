<?php

namespace FiratOzpinar\Paywant;

use RuntimeException;

class Customer
{
    /**
     * Customer id
     *
     * @var string|numeric
     */
    public $id;

    /**
     * Customer name
     *
     * @var string
     */
    public $name;

    /**
     * Customer email adress
     *
     * @var string
     */
    public $email;

    /**
     * Customer ip adress
     *
     * @var string
     */
    public $ipAdress;

    /**
     * Init and validation customer data
     *
     * @param array $item
     * @return $this
     */
    public function create($item = []): self
    {
        $this->setId($item['id'] ?? null);
        $this->setName($item['name'] ?? null);
        $this->setEmail($item['email'] ?? null);
        $this->setIpAdress($item['ip'] ?? null);

        return $this;
    }

    /**
     * Customer id set
     *
     * @param $value
     * @return mixed
     * @throws Exception
     */
    protected function setId($value)
    {
        if (!$value) {
            throw new RuntimeException('Customer id is required');
        }

        return $this->id = $value;
    }

    /**
     * Customer name set
     *
     * @param $value
     * @return mixed
     * @throws Exception
     */
    protected function setName($value)
    {
        if (!$value) {
            throw new RuntimeException('Customer name is required');
        }

        return $this->name = $value;
    }

    /**
     * Customer email adress set
     *
     * @param $value
     * @return mixed
     * @throws Exception
     */
    protected function setEmail($value)
    {
        if (!$value) {
            throw new RuntimeException('Customer email is required');
        }

        return $this->email = $value;
    }

    /**
     * Customer ip adress set
     *
     * @param $value
     * @return mixed
     * @throws Exception
     */
    protected function setIpAdress($value)
    {
        if (!$value) {
            throw new RuntimeException('Customer ip adress is required');
        }

        return $this->ipAdress = $value;
    }
}