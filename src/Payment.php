<?php

namespace FiratOzpinar\Paywant;

use GuzzleHttp\Client;

class Payment
{
    /**
     * Guzzle client
     *
     * @var Client
     */
    protected $client;

    /**
     * Api end point
     *
     * @var string
     */
    protected $endPoint = 'http://api.paywant.com/gateway.php';

    /**
     * Api key
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Secret key
     *
     * @var string
     */
    protected $secretKey;

    /**
     * Customer request data
     *
     * @var Customer
     */
    protected $customer;

    /**
     * Order request data
     *
     * @var Order
     */
    protected $order;

    /**
     * Product request data
     *
     * @var array
     */
    protected $products = [];

    /**
     * Payment constructor.
     *
     * @param $apiKey
     * @param $secretKey
     */
    public function __construct($apiKey, $secretKey)
    {
        $this->client = new Client();

        // Set api key
        $this->apiKey = $apiKey;
        $this->secretKey = $secretKey;
    }

    /**
     * Set customer request data
     *
     * @param $data
     * @return Customer
     */
    public function setCustomer($data): Customer
    {
        return $this->customer = (new Customer)->create($data);
    }

    /**
     * Set order request data
     *
     * @param $data
     * @return Order
     */
    public function setOrder($data): Order
    {
        return $this->order = (new Order)->create($data);
    }

    /**
     * Set product request data
     *
     * @param $data
     * @return array
     */
    public function setProducts($data): array
    {
        return $this->products = (new Product())->create($data);
    }

    public function create()
    {
        $response = $this->client->post($this->endPoint, [
            'form_params' => [
                'apiKey'        => $this->apiKey,
                'hash'          => $this->hash(),
                'returnData'    => $this->customer->name,
                'userEmail'     => $this->customer->email,
                'userIPAddress' => $this->customer->ipAdress,
                'userID'        => $this->customer->id,
                'proApi'        => false,
                'productData'   => $this->products
            ]
        ]);

        return json_decode((string)$response->getBody());
    }

    /**
     * Generate hash code
     *
     * @return string
     */
    protected function hash()
    {
        return base64_encode(hash_hmac('sha256', "{$this->customer->name}|{$this->customer->email}|{$this->customer->id}" . $this->apiKey, $this->secretKey, true));
    }
}