<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Pontorez\Elasticsearch7\SearchAdapter;

use Magento\Framework\Search\RequestInterface;

/**
 * Elasticsearch7 mapper class
 */
class Mapper
{
    /**
     * @var \Magento\Elasticsearch\Elasticsearch5\SearchAdapter\Mapper
     */
    private $mapper;

    /**
     * Mapper constructor.
     * @param \Pontorez\Elasticsearch\Elasticsearch5\SearchAdapter\Mapper $mapper
     */
    public function __construct(\Pontorez\Elasticsearch\Elasticsearch5\SearchAdapter\Mapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * Build adapter dependent query
     *
     * @param RequestInterface $request
     * @return array
     */
    public function buildQuery(RequestInterface $request) : array
    {
        $searchQuery = $this->mapper->buildQuery($request);
        $searchQuery['track_total_hits'] = true;
        return $searchQuery;
    }
}
