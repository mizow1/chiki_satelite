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
 * Class DanglingIndicesNamespace
 *
 */
class DanglingIndicesNamespace extends AbstractNamespace
{
    /**
     * $params['index_uuid']       = (string) The UUID of the dangling index
     * $params['accept_data_loss'] = (boolean) Must be set to true in order to delete the dangling index
     * $params['timeout']          = (time) Explicit operation timeout
     * $params['master_timeout']   = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function deleteDanglingIndex(array $params = [])
    {
        $index_uuid = $this->extractArgument($params, 'index_uuid');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DanglingIndices\DeleteDanglingIndex');
        $endpoint->setParams($params);
        $endpoint->setIndexUuid($index_uuid);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index_uuid']       = (string) The UUID of the dangling index
     * $params['accept_data_loss'] = (boolean) Must be set to true in order to import the dangling index
     * $params['timeout']          = (time) Explicit operation timeout
     * $params['master_timeout']   = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function importDanglingIndex(array $params = [])
    {
        $index_uuid = $this->extractArgument($params, 'index_uuid');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DanglingIndices\ImportDanglingIndex');
        $endpoint->setParams($params);
        $endpoint->setIndexUuid($index_uuid);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function listDanglingIndices(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DanglingIndices\ListDanglingIndices');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
}
