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

namespace OpenSearch\Endpoints\Indices;

use OpenSearch\Common\Exceptions\RuntimeException;
use OpenSearch\Endpoints\AbstractEndpoint;

class Rollover extends AbstractEndpoint
{
    protected $alias;
    protected $new_index;

    public function getURI(): string
    {
        if (isset($this->alias) !== true) {
            throw new RuntimeException(
                'alias is required for rollover'
            );
        }
        $alias = $this->alias;
        $new_index = $this->new_index ?? null;

        if (isset($new_index)) {
            return "/$alias/_rollover/$new_index";
        }
        return "/$alias/_rollover";
    }

    public function getParamWhitelist(): array
    {
        return [
            'timeout',
            'dry_run',
            'master_timeout',
            'wait_for_active_shards'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function setBody($body): Rollover
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;

        return $this;
    }

    public function setAlias($alias): Rollover
    {
        if (isset($alias) !== true) {
            return $this;
        }
        $this->alias = $alias;

        return $this;
    }

    public function setNewIndex($new_index): Rollover
    {
        if (isset($new_index) !== true) {
            return $this;
        }
        $this->new_index = $new_index;

        return $this;
    }
}
