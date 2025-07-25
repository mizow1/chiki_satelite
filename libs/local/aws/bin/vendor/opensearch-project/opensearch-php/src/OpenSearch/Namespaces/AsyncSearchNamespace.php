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
 * Class AsyncSearchNamespace
 *
 */
class AsyncSearchNamespace extends AbstractNamespace
{
    /**
     * $params['id'] = (string) The async search ID
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function delete(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('AsyncSearch\Delete');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['id']                          = (string) The async search ID
     * $params['wait_for_completion_timeout'] = (time) Specify the time that the request should block waiting for the final response
     * $params['keep_alive']                  = (time) Specify the time interval in which the results (partial or final) for this search will be available
     * $params['typed_keys']                  = (boolean) Specify whether aggregation and suggester names should be prefixed by their respective types in the response
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function get(array $params = [])
    {
        $id = $this->extractArgument($params, 'id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('AsyncSearch\Get');
        $endpoint->setParams($params);
        $endpoint->setId($id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['index']                         = (list) A comma-separated list of index names to search; use `_all` or empty string to perform the operation on all indices
     * $params['wait_for_completion_timeout']   = (time) Specify the time that the request should block waiting for the final response (Default = 1s)
     * $params['keep_on_completion']            = (boolean) Control whether the response should be stored in the cluster if it completed within the provided [wait_for_completion] time (default: false) (Default = false)
     * $params['keep_alive']                    = (time) Update the time interval in which the results (partial or final) for this search will be available (Default = 5d)
     * $params['batched_reduce_size']           = (number) The number of shard results that should be reduced at once on the coordinating node. This value should be used as the granularity at which progress results will be made available. (Default = 5)
     * $params['request_cache']                 = (boolean) Specify if request cache should be used for this request or not, defaults to true
     * $params['analyzer']                      = (string) The analyzer to use for the query string
     * $params['analyze_wildcard']              = (boolean) Specify whether wildcard and prefix queries should be analyzed (default: false)
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
     * $params['max_concurrent_shard_requests'] = (number) The number of concurrent shard requests per node this search executes concurrently. This value should be used to limit the impact of the search on the cluster in order to limit the number of concurrent shard requests (Default = 5)
     * $params['body']                          = (array) The search definition using the Query DSL
     *
     * @param array $params Associative array of parameters
     * @return array
     */
    public function submit(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('AsyncSearch\Submit');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
}
