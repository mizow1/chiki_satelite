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

namespace OpenSearch\Endpoints\Cat;

use OpenSearch\Endpoints\AbstractEndpoint;

class ThreadPool extends AbstractEndpoint
{
    protected $thread_pool_patterns;

    public function getURI(): string
    {
        $thread_pool_patterns = $this->thread_pool_patterns ?? null;

        if (isset($thread_pool_patterns)) {
            return "/_cat/thread_pool/$thread_pool_patterns";
        }
        return "/_cat/thread_pool";
    }

    public function getParamWhitelist(): array
    {
        return [
            'format',
            'size',
            'local',
            'master_timeout',
            'h',
            'help',
            's',
            'v'
        ];
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function setThreadPoolPatterns($thread_pool_patterns): ThreadPool
    {
        if (isset($thread_pool_patterns) !== true) {
            return $this;
        }
        if (is_array($thread_pool_patterns) === true) {
            $thread_pool_patterns = implode(",", $thread_pool_patterns);
        }
        $this->thread_pool_patterns = $thread_pool_patterns;

        return $this;
    }
}
