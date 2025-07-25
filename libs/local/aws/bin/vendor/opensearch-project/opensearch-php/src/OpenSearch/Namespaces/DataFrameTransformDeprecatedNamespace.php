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
 * Class DataFrameTransformDeprecatedNamespace
 *
 */
class DataFrameTransformDeprecatedNamespace extends AbstractNamespace
{
    /**
     * $params['transform_id'] = (string) The id of the transform to delete
     * $params['force']        = (boolean) When `true`, the transform is deleted regardless of its current state. The default value is `false`, meaning that the transform must be `stopped` before it can be deleted.
     *
     * @param array $params Associative array of parameters
     * @return array

     *
     * @note This API is BETA and may change in ways that are not backwards compatible
     *
     */
    public function deleteTransform(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DataFrameTransformDeprecated\DeleteTransform');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id']   = (string) The id or comma delimited list of id expressions of the transforms to get, '_all' or '*' implies get all transforms
     * $params['from']           = (int) skips a number of transform configs, defaults to 0
     * $params['size']           = (int) specifies a max number of transforms to get, defaults to 100
     * $params['allow_no_match'] = (boolean) Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
     *
     * @param array $params Associative array of parameters
     * @return array

     *
     * @note This API is BETA and may change in ways that are not backwards compatible
     *
     */
    public function getTransform(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DataFrameTransformDeprecated\GetTransform');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id']   = (string) The id of the transform for which to get stats. '_all' or '*' implies all transforms
     * $params['from']           = (number) skips a number of transform stats, defaults to 0
     * $params['size']           = (number) specifies a max number of transform stats to get, defaults to 100
     * $params['allow_no_match'] = (boolean) Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
     *
     * @param array $params Associative array of parameters
     * @return array

     *
     * @note This API is BETA and may change in ways that are not backwards compatible
     *
     */
    public function getTransformStats(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DataFrameTransformDeprecated\GetTransformStats');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);

        return $this->performRequest($endpoint);
    }
    public function previewTransform(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DataFrameTransformDeprecated\PreviewTransform');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id']     = (string) The id of the new transform.
     * $params['defer_validation'] = (boolean) If validations should be deferred until transform starts, defaults to false.
     * $params['body']             = (array) The transform definition (Required)
     *
     * @param array $params Associative array of parameters
     * @return array

     *
     * @note This API is BETA and may change in ways that are not backwards compatible
     *
     */
    public function putTransform(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DataFrameTransformDeprecated\PutTransform');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id'] = (string) The id of the transform to start
     * $params['timeout']      = (time) Controls the time to wait for the transform to start
     *
     * @param array $params Associative array of parameters
     * @return array

     *
     * @note This API is BETA and may change in ways that are not backwards compatible
     *
     */
    public function startTransform(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DataFrameTransformDeprecated\StartTransform');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id']        = (string) The id of the transform to stop
     * $params['wait_for_completion'] = (boolean) Whether to wait for the transform to fully stop before returning or not. Default to false
     * $params['timeout']             = (time) Controls the time to wait until the transform has stopped. Default to 30 seconds
     * $params['allow_no_match']      = (boolean) Whether to ignore if a wildcard expression matches no transforms. (This includes `_all` string or when no transforms have been specified)
     *
     * @param array $params Associative array of parameters
     * @return array

     *
     * @note This API is BETA and may change in ways that are not backwards compatible
     *
     */
    public function stopTransform(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DataFrameTransformDeprecated\StopTransform');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);

        return $this->performRequest($endpoint);
    }
    /**
     * $params['transform_id']     = (string) The id of the transform.
     * $params['defer_validation'] = (boolean) If validations should be deferred until transform starts, defaults to false.
     * $params['body']             = (array) The update transform definition (Required)
     *
     * @param array $params Associative array of parameters
     * @return array

     *
     * @note This API is BETA and may change in ways that are not backwards compatible
     *
     */
    public function updateTransform(array $params = [])
    {
        $transform_id = $this->extractArgument($params, 'transform_id');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('DataFrameTransformDeprecated\UpdateTransform');
        $endpoint->setParams($params);
        $endpoint->setTransformId($transform_id);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
}
