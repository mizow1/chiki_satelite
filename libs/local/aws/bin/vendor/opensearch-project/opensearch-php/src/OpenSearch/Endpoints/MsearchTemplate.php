<?php

declare(strict_types=1);

/**
 * Copyright OpenSearch Contributors
 * SPDX-License-Identifier: Apache-2.0
 *
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */

namespace OpenSearch\Endpoints;

use OpenSearch\Common\Exceptions\InvalidArgumentException;
use OpenSearch\Endpoints\AbstractEndpoint;
use OpenSearch\Serializers\SerializerInterface;
use Traversable;

class MsearchTemplate extends AbstractEndpoint
{
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function getURI(): string
    {
        $index = $this->index ?? null;
        if (isset($index)) {
            return "/$index/_msearch/template";
        }
        return "/_msearch/template";
    }

    public function getParamWhitelist(): array
    {
        return [
            'search_type',
            'typed_keys',
            'max_concurrent_searches',
            'rest_total_hits_as_int',
            'ccs_minimize_roundtrips'
        ];
    }

    public function getMethod(): string
    {
        return isset($this->body) ? 'POST' : 'GET';
    }

    public function setBody($body): MsearchTemplate
    {
        if (isset($body) !== true) {
            return $this;
        }
        if (is_array($body) === true || $body instanceof Traversable) {
            foreach ($body as $item) {
                $this->body .= $this->serializer->serialize($item) . "\n";
            }
        } elseif (is_string($body)) {
            $this->body = $body;
            if (substr($body, -1) != "\n") {
                $this->body .= "\n";
            }
        } else {
            throw new InvalidArgumentException("Body must be an array, traversable object or string");
        }
        return $this;
    }
}
