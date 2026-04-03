<?php

declare(strict_types=1);

return [
    'name' => getenv('APP_NAME') ?: 'HireIn',
    'env' => getenv('APP_ENV') ?: 'local',
    'debug' => (getenv('APP_DEBUG') ?: 'true') === 'true',
    'url' => getenv('APP_URL') ?: 'http://localhost:8000',
];
