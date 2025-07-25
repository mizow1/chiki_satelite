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

namespace OpenSearch;

use OpenSearch\Common\Exceptions\BadMethodCallException;
use OpenSearch\Common\Exceptions\InvalidArgumentException;
use OpenSearch\Common\Exceptions\NoNodesAvailableException;
use OpenSearch\Common\Exceptions\BadRequest400Exception;
use OpenSearch\Common\Exceptions\Missing404Exception;
use OpenSearch\Common\Exceptions\TransportException;
use OpenSearch\Endpoints\AbstractEndpoint;
use OpenSearch\Namespaces\AbstractNamespace;
use OpenSearch\Namespaces\NamespaceBuilderInterface;
use OpenSearch\Namespaces\BooleanRequestWrapper;
use OpenSearch\Namespaces\CatNamespace;
use OpenSearch\Namespaces\ClusterNamespace;
use OpenSearch\Namespaces\DanglingIndicesNamespace;
use OpenSearch\Namespaces\IndicesNamespace;
use OpenSearch\Namespaces\IngestNamespace;
use OpenSearch\Namespaces\NodesNamespace;
use OpenSearch\Namespaces\SecurityNamespace;
use OpenSearch\Namespaces\SnapshotNamespace;
use OpenSearch\Namespaces\SqlNamespace;
use OpenSearch\Namespaces\TasksNamespace;
use OpenSearch\Namespaces\AsyncSearchNamespace;
use OpenSearch\Namespaces\DataFrameTransformDeprecatedNamespace;
use OpenSearch\Namespaces\MonitoringNamespace;
use OpenSearch\Namespaces\SearchableSnapshotsNamespace;
use OpenSearch\Namespaces\SslNamespace;

/**
 * Class Client
 *
 */
class Client
{
    public const VERSION = '2.0.0';

    /**
     * @var Transport
     */
    public $transport;

    /**
     * @var array
     */
    protected $params;

    /**
     * @var callable
     */
    protected $endpoints;

    /**
     * @var NamespaceBuilderInterface[]
     */
    protected $registeredNamespaces = [];

    /**
     * @var CatNamespace
     */
    protected $cat;

    /**
     * @var ClusterNamespace
     */
    protected $cluster;

    /**
     * @var DanglingIndicesNamespace
     */
    protected $danglingIndices;

    /**
     * @var IndicesNamespace
     */
    protected $indices;

    /**
     * @var IngestNamespace
     */
    protected $ingest;

    /**
     * @var NodesNamespace
     */
    protected $nodes;

    /**
     * @var SnapshotNamespace
     */
    protected $snapshot;

    /**
     * @var TasksNamespace
     */
    protected $tasks;

    /**
     * @var AsyncSearchNamespace
     */
    protected $asyncSearch;

    /**
     * @var DataFrameTransformDeprecatedNamespace
     */
    protected $dataFrameTransformDeprecated;

    /**
     * @var MonitoringNamespace
     */
    protected $monitoring;

    /**
     * @var SearchableSnapshotsNamespace
     */
    protected $searchableSnapshots;

    /**
     * @var SecurityNamespace
     */
    protected $security;

    /**
     * @var SslNamespace
     */
    protected $ssl;

    /**
     * @var SqlNamespace
     */
    protected $sql;

    /**
     * Client constructor
     *
     * @param Transport           $transport
     * @param callable            $endpoint
     * @param AbstractNamespace[] $registeredNamespaces
     */
    public function __construct(Transport $transport, callable $endpoint, array $registeredNamespaces)
    {
        $this->transport = $transport;
        $this->endpoints = $endpoint;
        $this->cat = new CatNamespace($transport, $endpoint);
        $this->cluster = new ClusterNamespace($transport, $endpoint);
        $this->danglingIndices = new DanglingIndicesNamespace($transport, $endpoint);
        $this->indices = new IndicesNamespace($transport, $endpoint);
        $this->ingest = new IngestNamespace($transport, $endpoint);
        $this->nodes = new NodesNamespace($transport, $endpoint);
        $this->snapshot = new SnapshotNamespace($transport, $endpoint);
        $this->tasks = new TasksNamespace($transport, $endpoint);
        $this->asyncSearch = new AsyncSearchNamespace($transport, $endpoint);
        $this->dataFrameTransformDeprecated = new DataFrameTransformDeprecatedNamespace($transport, $endpoint);
        $this->monitoring = new MonitoringNamespace($transport, $endpoint);
        $this->searchableSnapshots = new SearchableSnapshotsNamespace($transport, $endpoint);
        $this->security = new SecurityNamespace($transport, $endpoint);
        $this->ssl = new SslNamespace($transport, $endpoint);
        $this->sql = new SqlNamespace($transport, $endpoint);

        $this->registeredNamespaces = $registeredNamespaces;
    }

    /**
     * $params['index']                  = (string) Default index for items which don't provide one
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the bulk operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['refresh']                = (enum) If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)
     * $params['routing']                = (string) Specific routing value
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['_source']                = (list) True or false to return the _source field or not, or default list of fields to return, can be overridden on each sub-request
     * $params['_source_excludes']       = (list) Default list of fields to exclude from the returned _source field, can be overridden on each sub-request
     * $params['_source_includes']       = (list) Default list of fields to extract and return from the _source field, can be overridden on each sub-request
     * $params['pipeline']               = (string) The pipeline id to preprocess incoming documents with
     * $params['require_alias']          = (boolean) Sets require_alias for all incoming documents. Defaults to unset (false)
     * $params['body']                   = (array) The operation definition and data (action-data pairs), separated by newlines (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function bulk(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Bulk');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['scroll_id'] = DEPRECATED (list) A comma-separated list of scroll IDs to clear
     * $params['body']      = (array) A comma-separated list of scroll IDs to clear if none was specified via the scroll_id parameter
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function clearScroll(array $params = [])
    {
        $scroll_id = $this->extractArgument($params, 'scroll_id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('ClearScroll');
        $endpoint->setParams($params);
        $endpoint->setScrollId($scroll_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']              = (list) A comma-separated list of indices to restrict the results
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['ignore_throttled']   = (boolean) Whether specified concrete, expanded or aliased indices should be ignored when throttled
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['min_score']          = (number) Include only documents with a specific `_score` value in the result
     * $params['preference']         = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['routing']            = (list) A comma-separated list of specific routing values
     * $params['q']                  = (string) Query in the Lucene query string syntax
     * $params['analyzer']           = (string) The analyzer to use for the query string
     * $params['analyze_wildcard']   = (boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)
     * $params['default_operator']   = (enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)
     * $params['df']                 = (string) The field to use as default where no field prefix is given in the query string
     * $params['lenient']            = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     * $params['terminate_after']    = (number) The maximum count for each shard, upon reaching which the query execution will terminate early
     * $params['body']               = (array) A query to restrict the results specified with the Query DSL (optional)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function count(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Count');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']                     = (string) Document ID (Required)
     * $params['index']                  = (string) The name of the index (Required)
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the index operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['refresh']                = (enum) If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)
     * $params['routing']                = (string) Specific routing value
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['version']                = (number) Explicit version number for concurrency control
     * $params['version_type']           = (enum) Specific version type (Options = internal,external,external_gte)
     * $params['pipeline']               = (string) The pipeline id to preprocess incoming documents with
     * $params['body']                   = (array) The document (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function create(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Create');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']                     = (string) The document ID (Required)
     * $params['index']                  = (string) The name of the index (Required)
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the delete operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['refresh']                = (enum) If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)
     * $params['routing']                = (string) Specific routing value
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['if_seq_no']              = (number) only perform the delete operation if the last operation that has changed the document has the specified sequence number
     * $params['if_primary_term']        = (number) only perform the delete operation if the last operation that has changed the document has the specified primary term
     * $params['version']                = (number) Explicit version number for concurrency control
     * $params['version_type']           = (enum) Specific version type (Options = internal,external,external_gte,force)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function delete(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Delete');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                  = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices (Required)
     * $params['analyzer']               = (string) The analyzer to use for the query string
     * $params['analyze_wildcard']       = (boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)
     * $params['default_operator']       = (enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)
     * $params['df']                     = (string) The field to use as default where no field prefix is given in the query string
     * $params['from']                   = (number) Starting offset (default: 0)
     * $params['ignore_unavailable']     = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']       = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['conflicts']              = (enum) What to do when the delete by query hits version conflicts? (Options = abort,proceed) (Default = abort)
     * $params['expand_wildcards']       = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['lenient']                = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     * $params['preference']             = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['q']                      = (string) Query in the Lucene query string syntax
     * $params['routing']                = (list) A comma-separated list of specific routing values
     * $params['scroll']                 = (time) Specify how long a consistent view of the index should be maintained for scrolled search
     * $params['search_type']            = (enum) Search operation type (Options = query_then_fetch,dfs_query_then_fetch)
     * $params['search_timeout']         = (time) Explicit timeout for each search request. Defaults to no timeout.
     * $params['size']                   = (number) Deprecated, please use `max_docs` instead
     * $params['max_docs']               = (number) Maximum number of documents to process (default: all documents)
     * $params['sort']                   = (list) A comma-separated list of <field>:<direction> pairs
     * $params['_source']                = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes']       = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes']       = (list) A list of fields to extract and return from the _source field
     * $params['terminate_after']        = (number) The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
     * $params['stats']                  = (list) Specific 'tag' of the request for logging and statistical purposes
     * $params['version']                = (boolean) Specify whether to return document version as part of a hit
     * $params['request_cache']          = (boolean) Specify if request cache should be used for this request or not, defaults to index level setting
     * $params['refresh']                = (boolean) Should the effected indexes be refreshed?
     * $params['timeout']                = (time) Time each individual bulk request should wait for shards that are unavailable. (Default = 1m)
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the delete by query operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['scroll_size']            = (number) Size on the scroll request powering the delete by query (Default = 100)
     * $params['wait_for_completion']    = (boolean) Should the request should block until the delete by query is complete. (Default = true)
     * $params['requests_per_second']    = (number) The throttle for this request in sub-requests per second. -1 means no throttle. (Default = 0)
     * $params['slices']                 = (number|string) The number of slices this task should be divided into. Defaults to 1, meaning the task isn't sliced into subtasks. Can be set to `auto`. (Default = 1)
     * $params['body']                   = (array) The search definition using the Query DSL (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function deleteByQuery(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DeleteByQuery');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['task_id']             = (string) The task id to rethrottle
     * $params['requests_per_second'] = (number) The throttle to set on this request in floating sub-requests per second. -1 means set no throttle. (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function deleteByQueryRethrottle(array $params = [])
    {
        $task_id = $this->extractArgument($params, 'task_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DeleteByQueryRethrottle');
        $endpoint->setParams($params);
        $endpoint->setTaskId($task_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']             = (string) Script ID
     * $params['timeout']        = (time) Explicit operation timeout
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function deleteScript(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DeleteScript');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']               = (string) The document ID (Required)
     * $params['index']            = (string) The name of the index (Required)
     * $params['stored_fields']    = (list) A comma-separated list of stored fields to return in the response
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['realtime']         = (boolean) Specify whether to perform the operation in realtime or search mode
     * $params['refresh']          = (boolean) Refresh the shard containing the document before performing the operation
     * $params['routing']          = (string) Specific routing value
     * $params['_source']          = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes'] = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes'] = (list) A list of fields to extract and return from the _source field
     * $params['version']          = (number) Explicit version number for concurrency control
     * $params['version_type']     = (enum) Specific version type (Options = internal,external,external_gte,force)
     *
     * @param array $params Associative array of parameters
     * @return bool
     */
    public function exists(array $params = []): bool
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Exists');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }
    /**
     * $params['id']               = (string) The document ID (Required)
     * $params['index']            = (string) The name of the index (Required)
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['realtime']         = (boolean) Specify whether to perform the operation in realtime or search mode
     * $params['refresh']          = (boolean) Refresh the shard containing the document before performing the operation
     * $params['routing']          = (string) Specific routing value
     * $params['_source']          = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes'] = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes'] = (list) A list of fields to extract and return from the _source field
     * $params['version']          = (number) Explicit version number for concurrency control
     * $params['version_type']     = (enum) Specific version type (Options = internal,external,external_gte,force)
     *
     * @param array $params Associative array of parameters
     * @return bool
     */
    public function existsSource(array $params = []): bool
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('ExistsSource');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }
    /**
     * $params['id']               = (string) The document ID (Required)
     * $params['index']            = (string) The name of the index (Required)
     * $params['analyze_wildcard'] = (boolean) Specify whether wildcards and prefix queries in the query string query should be analyzed (default: false)
     * $params['analyzer']         = (string) The analyzer for the query string query
     * $params['default_operator'] = (enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)
     * $params['df']               = (string) The default field for query string query (default: _all)
     * $params['stored_fields']    = (list) A comma-separated list of stored fields to return in the response
     * $params['lenient']          = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['q']                = (string) Query in the Lucene query string syntax
     * $params['routing']          = (string) Specific routing value
     * $params['_source']          = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes'] = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes'] = (list) A list of fields to extract and return from the _source field
     * $params['body']             = (array) The query definition using the Query DSL
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function explain(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Explain');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']              = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['fields']             = (list) A comma-separated list of field names
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['include_unmapped']   = (boolean) Indicates whether unmapped fields should be included in the response. (Default = false)
     * $params['body']               = (array) An index filter specified with the Query DSL
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function fieldCaps(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('FieldCaps');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']               = (string) The document ID (Required)
     * $params['index']            = (string) The name of the index (Required)
     * $params['stored_fields']    = (list) A comma-separated list of stored fields to return in the response
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['realtime']         = (boolean) Specify whether to perform the operation in realtime or search mode
     * $params['refresh']          = (boolean) Refresh the shard containing the document before performing the operation
     * $params['routing']          = (string) Specific routing value
     * $params['_source']          = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes'] = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes'] = (list) A list of fields to extract and return from the _source field
     * $params['version']          = (number) Explicit version number for concurrency control
     * $params['version_type']     = (enum) Specific version type (Options = internal,external,external_gte,force)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function get(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Get');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']             = (string) Script ID
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function getScript(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('GetScript');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array

     *
     * @note This API is EXPERIMENTAL and may be changed or removed completely in a future release
     *
     */
    public function getScriptContext(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('GetScriptContext');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array

     *
     * @note This API is EXPERIMENTAL and may be changed or removed completely in a future release
     *
     */
    public function getScriptLanguages(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('GetScriptLanguages');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']               = (string) The document ID (Required)
     * $params['index']            = (string) The name of the index (Required)
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['realtime']         = (boolean) Specify whether to perform the operation in realtime or search mode
     * $params['refresh']          = (boolean) Refresh the shard containing the document before performing the operation
     * $params['routing']          = (string) Specific routing value
     * $params['_source']          = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes'] = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes'] = (list) A list of fields to extract and return from the _source field
     * $params['version']          = (number) Explicit version number for concurrency control
     * $params['version_type']     = (enum) Specific version type (Options = internal,external,external_gte,force)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function getSource(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('GetSource');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']                     = (string) Document ID
     * $params['index']                  = (string) The name of the index (Required)
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the index operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['op_type']                = (enum) Explicit operation type. Defaults to `index` for requests with an explicit document ID, and to `create`for requests without an explicit document ID (Options = index,create)
     * $params['refresh']                = (enum) If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)
     * $params['routing']                = (string) Specific routing value
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['version']                = (number) Explicit version number for concurrency control
     * $params['version_type']           = (enum) Specific version type (Options = internal,external,external_gte)
     * $params['if_seq_no']              = (number) only perform the index operation if the last operation that has changed the document has the specified sequence number
     * $params['if_primary_term']        = (number) only perform the index operation if the last operation that has changed the document has the specified primary term
     * $params['pipeline']               = (string) The pipeline id to preprocess incoming documents with
     * $params['require_alias']          = (boolean) When true, requires destination to be an alias. Default is false
     * $params['body']                   = (array) The document (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function index(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Index');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function info(array $params = [])
    {
        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Info');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']            = (string) The name of the index
     * $params['stored_fields']    = (list) A comma-separated list of stored fields to return in the response
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['realtime']         = (boolean) Specify whether to perform the operation in realtime or search mode
     * $params['refresh']          = (boolean) Refresh the shard containing the document before performing the operation
     * $params['routing']          = (string) Specific routing value
     * $params['_source']          = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes'] = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes'] = (list) A list of fields to extract and return from the _source field
     * $params['body']             = (array) Document identifiers; can be either `docs` (containing full document information) or `ids` (when index and type is provided in the URL. (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function mget(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Mget');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                         = (list) A comma-separated list of index names to use as default
     * $params['search_type']                   = (enum) Search operation type (Options = query_then_fetch,query_and_fetch,dfs_query_then_fetch,dfs_query_and_fetch)
     * $params['max_concurrent_searches']       = (number) Controls the maximum number of concurrent searches the multi search api will execute
     * $params['typed_keys']                    = (boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response
     * $params['pre_filter_shard_size']         = (number) A threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on its rewrite method ie. if date filters are mandatory to match but the shard bounds and the query are disjoint.
     * $params['max_concurrent_shard_requests'] = (number) The number of concurrent shard requests each sub search executes concurrently per node. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests (Default = 5)
     * $params['rest_total_hits_as_int']        = (boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)
     * $params['ccs_minimize_roundtrips']       = (boolean) Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution (Default = true)
     * $params['body']                          = (array) The request definitions (metadata-search request definition pairs), separated by newlines (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function msearch(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Msearch');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                   = (list) A comma-separated list of index names to use as default
     * $params['search_type']             = (enum) Search operation type (Options = query_then_fetch,query_and_fetch,dfs_query_then_fetch,dfs_query_and_fetch)
     * $params['typed_keys']              = (boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response
     * $params['max_concurrent_searches'] = (number) Controls the maximum number of concurrent searches the multi search api will execute
     * $params['rest_total_hits_as_int']  = (boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)
     * $params['ccs_minimize_roundtrips'] = (boolean) Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution (Default = true)
     * $params['body']                    = (array) The request definitions (metadata-search request definition pairs), separated by newlines (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function msearchTemplate(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('MsearchTemplate');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']            = (string) The index in which the document resides.
     * $params['ids']              = (list) A comma-separated list of documents ids. You must define ids as parameter or set "ids" or "docs" in the request body
     * $params['term_statistics']  = (boolean) Specifies if total term frequency and document frequency should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = false)
     * $params['field_statistics'] = (boolean) Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = true)
     * $params['fields']           = (list) A comma-separated list of fields to return. Applies to all returned documents unless otherwise specified in body "params" or "docs".
     * $params['offsets']          = (boolean) Specifies if term offsets should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = true)
     * $params['positions']        = (boolean) Specifies if term positions should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = true)
     * $params['payloads']         = (boolean) Specifies if term payloads should be returned. Applies to all returned documents unless otherwise specified in body "params" or "docs". (Default = true)
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random) .Applies to all returned documents unless otherwise specified in body "params" or "docs".
     * $params['routing']          = (string) Specific routing value. Applies to all returned documents unless otherwise specified in body "params" or "docs".
     * $params['realtime']         = (boolean) Specifies if requests are real-time as opposed to near-real-time (default: true).
     * $params['version']          = (number) Explicit version number for concurrency control
     * $params['version_type']     = (enum) Specific version type (Options = internal,external,external_gte,force)
     * $params['body']             = (array) Define ids, documents, parameters or a list of parameters per document here. You must at least provide a list of document ids. See documentation.
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function mtermvectors(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('MTermVectors');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     *
     * @param array $params Associative array of parameters
     * @return bool
     */
    public function ping(array $params = []): bool
    {

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Ping');
        $endpoint->setParams($params);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }
    /**
     * $params['id']             = (string) Script ID (Required)
     * $params['context']        = (string) Script context
     * $params['timeout']        = (time) Explicit operation timeout
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     * $params['body']           = (array) The document (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function putScript(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $context = $this->extractArgument($params, 'context');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('PutScript');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setContext($context);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']              = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['search_type']        = (enum) Search operation type (Options = query_then_fetch,dfs_query_then_fetch)
     * $params['body']               = (array) The ranking evaluation search definition, including search requests, document ratings and ranking metric definition. (Required)
     *
     * @param array $params Associative array of parameters
     * @return array

     *
     * @note This API is EXPERIMENTAL and may be changed or removed completely in a future release
     *
     */
    public function rankEval(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('RankEval');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['refresh']                = (boolean) Should the affected indexes be refreshed?
     * $params['timeout']                = (time) Time each individual bulk request should wait for shards that are unavailable. (Default = 1m)
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the reindex operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['wait_for_completion']    = (boolean) Should the request should block until the reindex is complete. (Default = true)
     * $params['requests_per_second']    = (number) The throttle to set on this request in sub-requests per second. -1 means no throttle. (Default = 0)
     * $params['scroll']                 = (time) Control how long to keep the search context alive (Default = 5m)
     * $params['slices']                 = (number|string) The number of slices this task should be divided into. Defaults to 1, meaning the task isn't sliced into subtasks. Can be set to `auto`. (Default = 1)
     * $params['max_docs']               = (number) Maximum number of documents to process (default: all documents)
     * $params['body']                   = (array) The search definition using the Query DSL and the prototype for the index request. (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function reindex(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Reindex');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['task_id']             = (string) The task id to rethrottle
     * $params['requests_per_second'] = (number) The throttle to set on this request in floating sub-requests per second. -1 means set no throttle. (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function reindexRethrottle(array $params = [])
    {
        $task_id = $this->extractArgument($params, 'task_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('ReindexRethrottle');
        $endpoint->setParams($params);
        $endpoint->setTaskId($task_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']   = (string) The id of the stored search template
     * $params['body'] = (array) The search definition template and its params
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function renderSearchTemplate(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('RenderSearchTemplate');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['body'] = (array) The script to execute
     *
     * @param array $params Associative array of parameters
     * @return array

     *
     * @note This API is EXPERIMENTAL and may be changed or removed completely in a future release
     *
     */
    public function scriptsPainlessExecute(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('ScriptsPainlessExecute');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['scroll_id']              = DEPRECATED (string) The scroll ID
     * $params['scroll']                 = (time) Specify how long a consistent view of the index should be maintained for scrolled search
     * $params['rest_total_hits_as_int'] = (boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)
     * $params['body']                   = (array) The scroll ID if not passed by URL or query parameter.
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function scroll(array $params = [])
    {
        $scroll_id = $this->extractArgument($params, 'scroll_id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Scroll');
        $endpoint->setParams($params);
        $endpoint->setScrollId($scroll_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                         = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
     * $params['analyzer']                      = (string) The analyzer to use for the query string
     * $params['analyze_wildcard']              = (boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)
     * $params['ccs_minimize_roundtrips']       = (boolean) Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution (Default = true)
     * $params['default_operator']              = (enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)
     * $params['df']                            = (string) The field to use as default where no field prefix is given in the query string
     * $params['explain']                       = (boolean) Specify whether to return detailed information about score computation as part of a hit
     * $params['stored_fields']                 = (list) A comma-separated list of stored fields to return as part of a hit
     * $params['docvalue_fields']               = (list) A comma-separated list of fields to return as the docvalue representation of a field for each hit
     * $params['from']                          = (number) Starting offset (default: 0)
     * $params['ignore_unavailable']            = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['ignore_throttled']              = (boolean) Whether specified concrete, expanded or aliased indices should be ignored when throttled
     * $params['allow_no_indices']              = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']              = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['lenient']                       = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     * $params['preference']                    = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['q']                             = (string) Query in the Lucene query string syntax
     * $params['routing']                       = (list) A comma-separated list of specific routing values
     * $params['scroll']                        = (time) Specify how long a consistent view of the index should be maintained for scrolled search
     * $params['search_type']                   = (enum) Search operation type (Options = query_then_fetch,dfs_query_then_fetch)
     * $params['size']                          = (number) Number of hits to return (default: 10)
     * $params['sort']                          = (list) A comma-separated list of <field>:<direction> pairs
     * $params['_source']                       = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes']              = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes']              = (list) A list of fields to extract and return from the _source field
     * $params['terminate_after']               = (number) The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
     * $params['stats']                         = (list) Specific 'tag' of the request for logging and statistical purposes
     * $params['suggest_field']                 = (string) Specify which field to use for suggestions
     * $params['suggest_mode']                  = (enum) Specify suggest mode (Options = missing,popular,always) (Default = missing)
     * $params['suggest_size']                  = (number) How many suggestions to return in response
     * $params['suggest_text']                  = (string) The source text for which the suggestions should be returned
     * $params['timeout']                       = (time) Explicit operation timeout
     * $params['track_scores']                  = (boolean) Whether to calculate and return scores even if they are not used for sorting
     * $params['track_total_hits']              = (boolean) Indicate if the number of documents that match the query should be tracked
     * $params['allow_partial_search_results']  = (boolean) Indicate if an error should be returned if there is a partial search failure or timeout (Default = true)
     * $params['typed_keys']                    = (boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response
     * $params['version']                       = (boolean) Specify whether to return document version as part of a hit
     * $params['seq_no_primary_term']           = (boolean) Specify whether to return sequence number and primary term of the last modification of each hit
     * $params['request_cache']                 = (boolean) Specify if request cache should be used for this request or not, defaults to index level setting
     * $params['batched_reduce_size']           = (number) The number of shard results that should be reduced at once on the coordinating node. This value should be used as a protection mechanism to reduce the memory overhead per search request if the potential number of shards in the request can be large. (Default = 512)
     * $params['max_concurrent_shard_requests'] = (number) The number of concurrent shard requests per node this search executes concurrently. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests (Default = 5)
     * $params['pre_filter_shard_size']         = (number) A threshold that enforces a pre-filter roundtrip to prefilter search shards based on query rewriting if the number of shards the search request expands to exceeds the threshold. This filter roundtrip can limit the number of shards significantly if for instance a shard can not match any documents based on its rewrite method ie. if date filters are mandatory to match but the shard bounds and the query are disjoint.
     * $params['rest_total_hits_as_int']        = (boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)
     * $params['body']                          = (array) The search definition using the Query DSL
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function search(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Search');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']              = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
     * $params['preference']         = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['routing']            = (string) Specific routing value
     * $params['local']              = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']   = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function searchShards(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('SearchShards');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                   = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
     * $params['ignore_unavailable']      = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['ignore_throttled']        = (boolean) Whether specified concrete, expanded or aliased indices should be ignored when throttled
     * $params['allow_no_indices']        = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']        = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['preference']              = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['routing']                 = (list) A comma-separated list of specific routing values
     * $params['scroll']                  = (time) Specify how long a consistent view of the index should be maintained for scrolled search
     * $params['search_type']             = (enum) Search operation type (Options = query_then_fetch,query_and_fetch,dfs_query_then_fetch,dfs_query_and_fetch)
     * $params['explain']                 = (boolean) Specify whether to return detailed information about score computation as part of a hit
     * $params['profile']                 = (boolean) Specify whether to profile the query execution
     * $params['typed_keys']              = (boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response
     * $params['rest_total_hits_as_int']  = (boolean) Indicates whether hits.total should be rendered as an integer or an object in the rest search response (Default = false)
     * $params['ccs_minimize_roundtrips'] = (boolean) Indicates whether network round-trips should be minimized as part of cross-cluster search requests execution (Default = true)
     * $params['body']                    = (array) The search definition template and its params (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function searchTemplate(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('SearchTemplate');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']            = (string) The index in which the document resides. (Required)
     * $params['id']               = (string) The id of the document, when not specified a doc param should be supplied.
     * $params['term_statistics']  = (boolean) Specifies if total term frequency and document frequency should be returned. (Default = false)
     * $params['field_statistics'] = (boolean) Specifies if document count, sum of document frequencies and sum of total term frequencies should be returned. (Default = true)
     * $params['fields']           = (list) A comma-separated list of fields to return.
     * $params['offsets']          = (boolean) Specifies if term offsets should be returned. (Default = true)
     * $params['positions']        = (boolean) Specifies if term positions should be returned. (Default = true)
     * $params['payloads']         = (boolean) Specifies if term payloads should be returned. (Default = true)
     * $params['preference']       = (string) Specify the node or shard the operation should be performed on (default: random).
     * $params['routing']          = (string) Specific routing value.
     * $params['realtime']         = (boolean) Specifies if request is real-time as opposed to near-real-time (default: true).
     * $params['version']          = (number) Explicit version number for concurrency control
     * $params['version_type']     = (enum) Specific version type (Options = internal,external,external_gte,force)
     * $params['body']             = (array) Define parameters and or supply a document to get termvectors for. See documentation.
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function termvectors(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $id = $this->extractArgument($params, 'id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('TermVectors');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setId($id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']                     = (string) Document ID (Required)
     * $params['index']                  = (string) The name of the index (Required)
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the update operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['_source']                = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes']       = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes']       = (list) A list of fields to extract and return from the _source field
     * $params['lang']                   = (string) The script language (default: painless)
     * $params['refresh']                = (enum) If `true` then refresh the affected shards to make this operation visible to search, if `wait_for` then wait for a refresh to make this operation visible to search, if `false` (the default) then do nothing with refreshes. (Options = true,false,wait_for)
     * $params['retry_on_conflict']      = (number) Specify how many times should the operation be retried when a conflict occurs (default: 0)
     * $params['routing']                = (string) Specific routing value
     * $params['timeout']                = (time) Explicit operation timeout
     * $params['if_seq_no']              = (number) only perform the update operation if the last operation that has changed the document has the specified sequence number
     * $params['if_primary_term']        = (number) only perform the update operation if the last operation that has changed the document has the specified primary term
     * $params['require_alias']          = (boolean) When true, requires destination is an alias. Default is false
     * $params['body']                   = (array) The request definition requires either `script` or partial `doc` (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function update(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Update');
        $endpoint->setParams($params);
        $endpoint->setId($id);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                  = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices (Required)
     * $params['analyzer']               = (string) The analyzer to use for the query string
     * $params['analyze_wildcard']       = (boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)
     * $params['default_operator']       = (enum) The default operator for query string query (AND or OR) (Options = AND,OR) (Default = OR)
     * $params['df']                     = (string) The field to use as default where no field prefix is given in the query string
     * $params['from']                   = (number) Starting offset (default: 0)
     * $params['ignore_unavailable']     = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']       = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['conflicts']              = (enum) What to do when the update by query hits version conflicts? (Options = abort,proceed) (Default = abort)
     * $params['expand_wildcards']       = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['lenient']                = (boolean) Specify whether format-based query failures (such as providing text to a numeric field) should be ignored
     * $params['pipeline']               = (string) Ingest pipeline to set on index requests made by this action. (default: none)
     * $params['preference']             = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['q']                      = (string) Query in the Lucene query string syntax
     * $params['routing']                = (list) A comma-separated list of specific routing values
     * $params['scroll']                 = (time) Specify how long a consistent view of the index should be maintained for scrolled search
     * $params['search_type']            = (enum) Search operation type (Options = query_then_fetch,dfs_query_then_fetch)
     * $params['search_timeout']         = (time) Explicit timeout for each search request. Defaults to no timeout.
     * $params['size']                   = (number) Deprecated, please use `max_docs` instead
     * $params['max_docs']               = (number) Maximum number of documents to process (default: all documents)
     * $params['sort']                   = (list) A comma-separated list of <field>:<direction> pairs
     * $params['_source']                = (list) True or false to return the _source field or not, or a list of fields to return
     * $params['_source_excludes']       = (list) A list of fields to exclude from the returned _source field
     * $params['_source_includes']       = (list) A list of fields to extract and return from the _source field
     * $params['terminate_after']        = (number) The maximum number of documents to collect for each shard, upon reaching which the query execution will terminate early.
     * $params['stats']                  = (list) Specific 'tag' of the request for logging and statistical purposes
     * $params['version']                = (boolean) Specify whether to return document version as part of a hit
     * $params['version_type']           = (boolean) Should the document increment the version number (internal) on hit or not (reindex)
     * $params['request_cache']          = (boolean) Specify if request cache should be used for this request or not, defaults to index level setting
     * $params['refresh']                = (boolean) Should the affected indexes be refreshed?
     * $params['timeout']                = (time) Time each individual bulk request should wait for shards that are unavailable. (Default = 1m)
     * $params['wait_for_active_shards'] = (string) Sets the number of shard copies that must be active before proceeding with the update by query operation. Defaults to 1, meaning the primary shard only. Set to `all` for all shard copies, otherwise set to any non-negative value less than or equal to the total number of copies for the shard (number of replicas + 1)
     * $params['scroll_size']            = (number) Size on the scroll request powering the update by query (Default = 100)
     * $params['wait_for_completion']    = (boolean) Should the request should block until the update by query operation is complete. (Default = true)
     * $params['requests_per_second']    = (number) The throttle to set on this request in sub-requests per second. -1 means no throttle. (Default = 0)
     * $params['slices']                 = (number|string) The number of slices this task should be divided into. Defaults to 1, meaning the task isn't sliced into subtasks. Can be set to `auto`. (Default = 1)
     * $params['body']                   = (array) The search definition using the Query DSL
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function updateByQuery(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('UpdateByQuery');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['task_id']             = (string) The task id to rethrottle
     * $params['requests_per_second'] = (number) The throttle to set on this request in floating sub-requests per second. -1 means set no throttle. (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function updateByQueryRethrottle(array $params = [])
    {
        $task_id = $this->extractArgument($params, 'task_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('UpdateByQueryRethrottle');
        $endpoint->setParams($params);
        $endpoint->setTaskId($task_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['body'] = (array) a point-in-time id to close
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function closePointInTime(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('ClosePointInTime');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']              = (list) A comma-separated list of index names to open point in time; use `_all` or empty string to perform the operation on all indices
     * $params['preference']         = (string) Specify the node or shard the operation should be performed on (default: random)
     * $params['routing']            = (string) Specific routing value
     * $params['ignore_unavailable'] = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['expand_wildcards']   = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     * $params['keep_alive']         = (string) Specific the time to live for the point in time
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function openPointInTime(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('OpenPointInTime');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    public function cat(): CatNamespace
    {
        return $this->cat;
    }
    public function cluster(): ClusterNamespace
    {
        return $this->cluster;
    }
    public function danglingIndices(): DanglingIndicesNamespace
    {
        return $this->danglingIndices;
    }
    public function indices(): IndicesNamespace
    {
        return $this->indices;
    }
    public function ingest(): IngestNamespace
    {
        return $this->ingest;
    }
    public function nodes(): NodesNamespace
    {
        return $this->nodes;
    }
    public function snapshot(): SnapshotNamespace
    {
        return $this->snapshot;
    }
    public function tasks(): TasksNamespace
    {
        return $this->tasks;
    }
    public function asyncSearch(): AsyncSearchNamespace
    {
        return $this->asyncSearch;
    }
    public function dataFrameTransformDeprecated(): DataFrameTransformDeprecatedNamespace
    {
        return $this->dataFrameTransformDeprecated;
    }
    public function monitoring(): MonitoringNamespace
    {
        return $this->monitoring;
    }
    public function searchableSnapshots(): SearchableSnapshotsNamespace
    {
        return $this->searchableSnapshots;
    }

    public function security(): SecurityNamespace
    {
        return $this->security;
    }

    public function ssl(): SslNamespace
    {
        return $this->ssl;
    }

    public function sql(): SqlNamespace
    {
        return $this->sql;
    }

    /**
     * Catchall for registered namespaces
     *
     * @return object
     * @throws BadMethodCallException if the namespace cannot be found
     */
    public function __call(string $name, array $arguments)
    {
        if (isset($this->registeredNamespaces[$name])) {
            return $this->registeredNamespaces[$name];
        }
        throw new BadMethodCallException("Namespace [$name] not found");
    }

    /**
     * @return null|mixed
     */
    public function extractArgument(array &$params, string $arg)
    {
        if (array_key_exists($arg, $params) === true) {
            $value = $params[$arg];
            $value = (is_object($value) && !is_iterable($value)) ?
                (array) $value :
                $value;
            unset($params[$arg]);
            return $value;
        } else {
            return null;
        }
    }

    /**
     * @return callable|array
     */
    private function performRequest(AbstractEndpoint $endpoint)
    {
        $promise =  $this->transport->performRequest(
            $endpoint->getMethod(),
            $endpoint->getURI(),
            $endpoint->getParams(),
            $endpoint->getBody(),
            $endpoint->getOptions()
        );

        return $this->transport->resultOrFuture($promise, $endpoint->getOptions());
    }
}
