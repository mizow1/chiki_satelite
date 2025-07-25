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
 * Class CatNamespace
 *
 */
class CatNamespace extends AbstractNamespace
{
    /**
     * $params['name']             = (list) A comma-separated list of alias names to return
     * $params['format']           = (string) a short version of the Accept header, e.g. json, yaml
     * $params['local']            = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['h']                = (list) Comma-separated list of column names to display
     * $params['help']             = (boolean) Return help information (Default = false)
     * $params['s']                = (list) Comma-separated list of column names or column aliases to sort by
     * $params['v']                = (boolean) Verbose mode. Display column headers (Default = false)
     * $params['expand_wildcards'] = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = all)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function aliases(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Aliases');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['node_id']        = (list) A comma-separated list of node IDs or names to limit the returned information
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['bytes']          = (enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function allocation(array $params = [])
    {
        $node_id = $this->extractArgument($params, 'node_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Allocation');
        $endpoint->setParams($params);
        $endpoint->setNodeId($node_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']  = (list) A comma-separated list of index names to limit the returned information
     * $params['format'] = (string) a short version of the Accept header, e.g. json, yaml
     * $params['h']      = (list) Comma-separated list of column names to display
     * $params['help']   = (boolean) Return help information (Default = false)
     * $params['s']      = (list) Comma-separated list of column names or column aliases to sort by
     * $params['v']      = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function count(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Count');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['fields'] = (list) A comma-separated list of fields to return the fielddata size
     * $params['format'] = (string) a short version of the Accept header, e.g. json, yaml
     * $params['bytes']  = (enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)
     * $params['h']      = (list) Comma-separated list of column names to display
     * $params['help']   = (boolean) Return help information (Default = false)
     * $params['s']      = (list) Comma-separated list of column names or column aliases to sort by
     * $params['v']      = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function fielddata(array $params = [])
    {
        $fields = $this->extractArgument($params, 'fields');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Fielddata');
        $endpoint->setParams($params);
        $endpoint->setFields($fields);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['format'] = (string) a short version of the Accept header, e.g. json, yaml
     * $params['h']      = (list) Comma-separated list of column names to display
     * $params['help']   = (boolean) Return help information (Default = false)
     * $params['s']      = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']   = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['ts']     = (boolean) Set to false to disable timestamping (Default = true)
     * $params['v']      = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function health(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Health');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['help'] = (boolean) Return help information (Default = false)
     * $params['s']    = (list) Comma-separated list of column names or column aliases to sort by
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function help(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Help');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                     = (list) A comma-separated list of index names to limit the returned information
     * $params['format']                    = (string) a short version of the Accept header, e.g. json, yaml
     * $params['bytes']                     = (enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)
     * $params['local']                     = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['master_timeout']            = (time) Explicit operation timeout for connection to master node
     * $params['h']                         = (list) Comma-separated list of column names to display
     * $params['health']                    = (enum) A health status ("green", "yellow", or "red" to filter only indices matching the specified health status (Options = green,yellow,red)
     * $params['help']                      = (boolean) Return help information (Default = false)
     * $params['pri']                       = (boolean) Set to true to return stats only for primary shards (Default = false)
     * $params['s']                         = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']                      = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['v']                         = (boolean) Verbose mode. Display column headers (Default = false)
     * $params['include_unloaded_segments'] = (boolean) If set to true segment stats will include stats for segments that are not currently loaded into memory (Default = false)
     * $params['expand_wildcards']          = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = all)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function indices(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Indices');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function master(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Master');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function nodeattrs(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\NodeAttrs');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['bytes']          = (enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['full_id']        = (boolean) Return the full node ID instead of the shortened version (default: false)
     * $params['local']          = (boolean) Calculate the selected nodes using the local cluster state rather than the state from master node (default: false)
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']           = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function nodes(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Nodes');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']           = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function pendingTasks(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\PendingTasks');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function plugins(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Plugins');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']       = (list) Comma-separated list or wildcard expression of index names to limit the returned information
     * $params['format']      = (string) a short version of the Accept header, e.g. json, yaml
     * $params['active_only'] = (boolean) If `true`, the response only includes ongoing shard recoveries (Default = false)
     * $params['bytes']       = (enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)
     * $params['detailed']    = (boolean) If `true`, the response includes detailed information about shard recoveries (Default = false)
     * $params['h']           = (list) Comma-separated list of column names to display
     * $params['help']        = (boolean) Return help information (Default = false)
     * $params['s']           = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']        = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['v']           = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function recovery(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Recovery');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (Default = false)
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function repositories(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Repositories');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']  = (list) A comma-separated list of index names to limit the returned information
     * $params['format'] = (string) a short version of the Accept header, e.g. json, yaml
     * $params['bytes']  = (enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)
     * $params['h']      = (list) Comma-separated list of column names to display
     * $params['help']   = (boolean) Return help information (Default = false)
     * $params['s']      = (list) Comma-separated list of column names or column aliases to sort by
     * $params['v']      = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function segments(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Segments');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']          = (list) A comma-separated list of index names to limit the returned information
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['bytes']          = (enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']           = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function shards(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Shards');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['repository']         = (list) Name of repository from which to fetch the snapshot information
     * $params['format']             = (string) a short version of the Accept header, e.g. json, yaml
     * $params['ignore_unavailable'] = (boolean) Set to true to ignore unavailable snapshots (Default = false)
     * $params['master_timeout']     = (time) Explicit operation timeout for connection to master node
     * $params['h']                  = (list) Comma-separated list of column names to display
     * $params['help']               = (boolean) Return help information (Default = false)
     * $params['s']                  = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']               = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['v']                  = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function snapshots(array $params = [])
    {
        $repository = $this->extractArgument($params, 'repository');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Snapshots');
        $endpoint->setParams($params);
        $endpoint->setRepository($repository);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['format']      = (string) a short version of the Accept header, e.g. json, yaml
     * $params['node_id']     = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     * $params['actions']     = (list) A comma-separated list of actions that should be returned. Leave empty to return all.
     * $params['detailed']    = (boolean) Return detailed task information (default: false)
     * $params['parent_task'] = (number) Return tasks with specified parent task id. Set to -1 to return all.
     * $params['h']           = (list) Comma-separated list of column names to display
     * $params['help']        = (boolean) Return help information (Default = false)
     * $params['s']           = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']        = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['v']           = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function tasks(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Tasks');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['name']           = (string) A pattern that returned template names must match
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function templates(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Templates');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['thread_pool_patterns'] = (list) A comma-separated list of regular-expressions to filter the thread pools in the output
     * $params['format']               = (string) a short version of the Accept header, e.g. json, yaml
     * $params['size']                 = (enum) The multiplier in which to display values (Options = ,k,m,g,t,p)
     * $params['local']                = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['master_timeout']       = (time) Explicit operation timeout for connection to master node
     * $params['h']                    = (list) Comma-separated list of column names to display
     * $params['help']                 = (boolean) Return help information (Default = false)
     * $params['s']                    = (list) Comma-separated list of column names or column aliases to sort by
     * $params['v']                    = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function threadPool(array $params = [])
    {
        $thread_pool_patterns = $this->extractArgument($params, 'thread_pool_patterns');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\ThreadPool');
        $endpoint->setParams($params);
        $endpoint->setThreadPoolPatterns($thread_pool_patterns);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']             = (string) The ID of the data frame analytics to fetch
     * $params['allow_no_match'] = (boolean) Whether to ignore if a wildcard expression matches no configs. (This includes `_all` string or when no configs have been specified)
     * $params['bytes']          = (enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']           = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function mlDataFrameAnalytics(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\MlDataFrameAnalytics');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['datafeed_id']        = (string) The ID of the datafeeds stats to fetch
     * $params['allow_no_match']     = (boolean) Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)
     * $params['allow_no_datafeeds'] = (boolean) Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)
     * $params['format']             = (string) a short version of the Accept header, e.g. json, yaml
     * $params['h']                  = (list) Comma-separated list of column names to display
     * $params['help']               = (boolean) Return help information (Default = false)
     * $params['s']                  = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']               = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['v']                  = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function mlDatafeeds(array $params = [])
    {
        $datafeed_id = $this->extractArgument($params, 'datafeed_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\MlDatafeeds');
        $endpoint->setParams($params);
        $endpoint->setDatafeedId($datafeed_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['job_id']         = (string) The ID of the jobs stats to fetch
     * $params['allow_no_match'] = (boolean) Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)
     * $params['allow_no_jobs']  = (boolean) Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)
     * $params['bytes']          = (enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']           = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function mlJobs(array $params = [])
    {
        $job_id = $this->extractArgument($params, 'job_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\MlJobs');
        $endpoint->setParams($params);
        $endpoint->setJobId($job_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['model_id']       = (string) The ID of the trained models stats to fetch
     * $params['allow_no_match'] = (boolean) Whether to ignore if a wildcard expression matches no trained models. (This includes `_all` string or when no trained models have been specified) (Default = true)
     * $params['from']           = (int) skips a number of trained models (Default = 0)
     * $params['size']           = (int) specifies a max number of trained models to get (Default = 100)
     * $params['bytes']          = (enum) The unit in which to display byte values (Options = b,k,kb,m,mb,g,gb,t,tb,p,pb)
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']           = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function mlTrainedModels(array $params = [])
    {
        $model_id = $this->extractArgument($params, 'model_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\MlTrainedModels');
        $endpoint->setParams($params);
        $endpoint->setModelId($model_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id']   = (string) The id of the transform for which to get stats. '_all' or '*' implies all transforms
     * $params['from']           = (int) skips a number of transform configs, defaults to 0
     * $params['size']           = (int) specifies a max number of transforms to get, defaults to 100
     * $params['allow_no_match'] = (boolean) Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
     * $params['format']         = (string) a short version of the Accept header, e.g. json, yaml
     * $params['h']              = (list) Comma-separated list of column names to display
     * $params['help']           = (boolean) Return help information (Default = false)
     * $params['s']              = (list) Comma-separated list of column names or column aliases to sort by
     * $params['time']           = (enum) The unit in which to display time values (Options = d,h,m,s,ms,micros,nanos)
     * $params['v']              = (boolean) Verbose mode. Display column headers (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function transforms(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cat\Transforms');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);

        return $this->performRequest($endpoint);
    }
}
