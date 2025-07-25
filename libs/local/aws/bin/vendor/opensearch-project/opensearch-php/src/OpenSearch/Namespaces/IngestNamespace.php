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

namespace OpenSearch\Namespaces;

use OpenSearch\Namespaces\AbstractNamespace;

/**
 * Class IngestNamespace
 *
 */
class IngestNamespace extends AbstractNamespace
{
    /**
     * $params['id']             = (string) Pipeline ID
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['timeout']        = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function deletePipeline(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Ingest\DeletePipeline');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']             = (string) Comma separated list of pipeline ids. Wildcards supported
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function getPipeline(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Ingest\GetPipeline');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function processorGrok(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Ingest\ProcessorGrok');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']             = (string) Pipeline ID
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['timeout']        = (time) Explicit operation timeout
     * $params['body']           = (array) The ingest definition (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function putPipeline(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Ingest\PutPipeline');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']      = (string) Pipeline ID
     * $params['verbose'] = (boolean) Verbose mode. Display data output for each processor in executed pipeline (Default = false)
     * $params['body']    = (array) The simulate definition (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function simulate(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Ingest\Simulate');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
}
