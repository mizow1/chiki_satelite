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

namespace OpenSearch\Endpoints\Snapshot;

use OpenSearch\Endpoints\AbstractEndpoint;

class Status extends AbstractEndpoint
{
    protected $repository;
    protected $snapshot;

    public function getURI(): string
    {
        $repository = $this->repository ?? null;
        $snapshot = $this->snapshot ?? null;

        if (isset($repository) && isset($snapshot)) {
            return "/_snapshot/$repository/$snapshot/_status";
        }
        if (isset($repository)) {
            return "/_snapshot/$repository/_status";
        }
        return "/_snapshot/_status";
    }

    public function getParamWhitelist(): array
    {
        return [
            'master_timeout',
            'ignore_unavailable'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function setRepository($repository): Status
    {
        if (isset($repository) !== true) {
            return $this;
        }
        $this->repository = $repository;

        return $this;
    }

    public function setSnapshot($snapshot): Status
    {
        if (isset($snapshot) !== true) {
            return $this;
        }
        if (is_array($snapshot) === true) {
            $snapshot = implode(",", $snapshot);
        }
        $this->snapshot = $snapshot;

        return $this;
    }
}
