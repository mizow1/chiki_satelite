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
 * Class TasksNamespace
 *
 */
class TasksNamespace extends AbstractNamespace
{
    /**
     * $params['task_id']             = (string) Cancel the task with specified task id (node_id:task_number)
     * $params['nodes']               = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     * $params['actions']             = (list) A comma-separated list of actions that should be cancelled. Leave empty to cancel all.
     * $params['parent_task_id']      = (string) Cancel tasks with specified parent task id (node_id:task_number). Set to -1 to cancel all.
     * $params['wait_for_completion'] = (boolean) Should the request block until the cancellation of the task and its descendant tasks is completed. Defaults to false
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function cancel(array $params = [])
    {
        $task_id = $this->extractArgument($params, 'task_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Tasks\Cancel');
        $endpoint->setParams($params);
        $endpoint->setTaskId($task_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['task_id']             = (string) Return the task with specified id (node_id:task_number)
     * $params['wait_for_completion'] = (boolean) Wait for the matching tasks to complete (default: false)
     * $params['timeout']             = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function get(array $params = [])
    {
        $task_id = $this->extractArgument($params, 'task_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Tasks\Get');
        $endpoint->setParams($params);
        $endpoint->setTaskId($task_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['nodes']               = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     * $params['actions']             = (list) A comma-separated list of actions that should be returned. Leave empty to return all.
     * $params['detailed']            = (boolean) Return detailed task information (default: false)
     * $params['parent_task_id']      = (string) Return tasks with specified parent task id (node_id:task_number). Set to -1 to return all.
     * $params['wait_for_completion'] = (boolean) Wait for the matching tasks to complete (default: false)
     * $params['group_by']            = (enum) Group tasks by nodes or parent/child relationships (Options = nodes,parents,none) (Default = nodes)
     * $params['timeout']             = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function list(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Tasks\ListTasks');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Proxy function to list() to prevent BC break since 7.4.0
     */
    public function tasksList(array $params = [])
    {
        return $this->list($params);
    }
}
