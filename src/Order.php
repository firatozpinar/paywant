<?php

namespace FiratOzpinar\Paywant;

use RuntimeException;

class Order
{
    /**
     * Order id
     *
     * @var string|numeric
     */
    public $id;

    /**
     * Customer ip adress
     *
     * @var string
     */
    public $gateway;

    /**
     * Order total price
     *
     * @var string
     */
    public $total;

    /**
     * Order amount
     *
     * @var string
     */
    public $amount;

    /**
     * Extra data
     *
     * @var string
     */
    public $extra;

    /**
     * Init and validation customer data
     *
     * @param array $item
     * @return $this
     */
    public function create($item = []): self
    {
        $this->setId($item['id'] ?? null);
        $this->setGateway($item['gateway'] ?? null);
        $this->setTotal($item['total'] ?? null);
        $this->setAmount($item['amount'] ?? null);
        $this->setExtra($item['extra'] ?? null);

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
            throw new RuntimeException('Order id is required');
        }

        return $this->id = $value;
    }

    /**
     * Customer email adress set
     *
     * @param $value
     * @return mixed
     * @throws Exception
     */
    protected function setGateway($value)
    {
        if (!$value) {
            throw new RuntimeException('Order gateway is required');
        }

        if ($value < 1 && $value > 7) {
            throw new RuntimeException('Gateway not valid');
        }

        return $this->gateway = $value;
    }

    /**
     * Customer ip adress set
     *
     * @param $value
     * @return mixed
     * @throws Exception
     */
    protected function setTotal($value)
    {
        if (!$value) {
            throw new RuntimeException('Order total is required');
        }

        return $this->total = $value;
    }

    /**
     * Customer ip adress set
     *
     * @param $value
     * @return mixed
     * @throws Exception
     */
    protected function setAmount($value)
    {
        if (!$value) {
            throw new RuntimeException('Order amount is required');
        }

        return $this->amount = $value;
    }

    /**
     * Customer ip adress set
     *
     * @param $value
     * @return mixed
     * @throws Exception
     */
    protected function setExtra($value)
    {
        return $this->extra = $value;
    }
}