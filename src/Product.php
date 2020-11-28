<?php

namespace FiratOzpinar\Paywant;

use RuntimeException;

class Product
{
    /**
     * Create product request data
     *
     * @param array $items
     * @return array
     */
    public function create($items = []): array
    {
        $responseData = [];

        foreach ($items ?? [] as $item) {
            if (!isset($item['name'])) {
                throw new RuntimeException('Product name is required');
            }

            if (!isset($item['amount'])) {
                throw new RuntimeException('Product amount is required');
            }

            if (!isset($item['commissionType'])) {
                throw new RuntimeException('Product commissionType is required');
            }

            $responseData[] = [
                'name'           => $item['name'],
                'amount'         => $item['amount'],
                'commissionType' => $item['commissionType'],
                'extraData'      => $item['extraData'] ?? null
            ];
        }

        return $responseData;
    }
}