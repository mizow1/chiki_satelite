<?php

declare(strict_types=1);

/**
 * SPDX-License-Identifier: Apache-2.0
 *
 * The OpenSearch Contributors require contributions made to
 * this file be licensed under the Apache-2.0 license or a
 * compatible open source license.
 *
 * Modifications Copyright OpenSearch Contributors. See
 * GitHub history for details.
 */

namespace OpenSearch\Endpoints\Security;

use OpenSearch\Endpoints\AbstractEndpoint;

class UpdateConfig extends AbstractEndpoint
{
    public function getParamWhitelist(): array
    {
        return [
            'dynamic',
        ];
    }

    public function getURI(): string
    {
        return "/_plugins/_security/api/securityconfig/config";
    }

    public function getMethod(): string
    {
        return 'PUT';
    }
}
