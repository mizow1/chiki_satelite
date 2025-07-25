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
 * Class SnapshotNamespace
 *
 */
class SnapshotNamespace extends AbstractNamespace
{
    /**
     * $params['repository']     = (string) A repository name
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['timeout']        = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function cleanupRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\CleanupRepository');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['repository']      = (string) A repository name
     * $params['snapshot']        = (string) The name of the snapshot to clone from
     * $params['target_snapshot'] = (string) The name of the cloned snapshot to create
     * $params['master_timeout']  = (time) Explicit operation timeout for connection to master node
     * $params['body']            = (array) The snapshot clone definition (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function clone(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');
        $target_snapshot = $this->extractArgument($params, 'target_snapshot');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\CloneSnapshot');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setSnapshot($snapshot);
        $endpoint->setTargetSnapshot($target_snapshot);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['repository']          = (string) A repository name
     * $params['snapshot']            = (string) A snapshot name
     * $params['master_timeout']      = (time) Explicit operation timeout for connection to master node
     * $params['wait_for_completion'] = (boolean) Should this request wait until the operation has completed before returning (Default = false)
     * $params['body']                = (array) The snapshot definition
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function create(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\Create');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setSnapshot($snapshot);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['repository']     = (string) A repository name
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['timeout']        = (time) Explicit operation timeout
     * $params['verify']         = (boolean) Whether to verify the repository after creation
     * $params['body']           = (array) The repository definition (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function createRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\CreateRepository');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['repository']     = (string) A repository name
     * $params['snapshot']       = (string) A snapshot name
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function delete(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\Delete');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setSnapshot($snapshot);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['repository']     = (list) Name of the snapshot repository to unregister. Wildcard (`*`) patterns are supported.
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['timeout']        = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function deleteRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\DeleteRepository');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['repository']         = (string) A repository name
     * $params['snapshot']           = (list) A comma-separated list of snapshot names
     * $params['master_timeout']     = (time) Explicit operation timeout for connection to master node
     * $params['ignore_unavailable'] = (boolean) Whether to ignore unavailable snapshots, defaults to false which means a SnapshotMissingException is thrown
     * $params['verbose']            = (boolean) Whether to show verbose snapshot info or only show the basic info found in the repository index blob
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function get(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\Get');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setSnapshot($snapshot);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['repository']     = (list) A comma-separated list of repository names
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function getRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\GetRepository');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['repository']          = (string) A repository name
     * $params['snapshot']            = (string) A snapshot name
     * $params['master_timeout']      = (time) Explicit operation timeout for connection to master node
     * $params['wait_for_completion'] = (boolean) Should this request wait until the operation has completed before returning (Default = false)
     * $params['body']                = (array) Details of what to restore
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function restore(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\Restore');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setSnapshot($snapshot);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['repository']         = (string) A repository name
     * $params['snapshot']           = (list) A comma-separated list of snapshot names
     * $params['master_timeout']     = (time) Explicit operation timeout for connection to master node
     * $params['ignore_unavailable'] = (boolean) Whether to ignore unavailable snapshots, defaults to false which means a SnapshotMissingException is thrown
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function status(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');
        $snapshot = $this->extractArgument($params, 'snapshot');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\Status');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);
        $endpoint->setSnapshot($snapshot);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['repository']     = (string) A repository name
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['timeout']        = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function verifyRepository(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Snapshot\VerifyRepository');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);

        return $this->performRequest($endpoint);
    }
}
