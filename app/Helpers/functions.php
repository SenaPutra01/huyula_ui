<?php

function table($tableName)
{
    $schema = env('DB_SCHEMA');
    return $schema . '.' . $tableName;
}

function baseUrl($endpoint)
{
    $baseUrl = env('API_BASE_URL');
    return $baseUrl . $endpoint;
}

function baseUrlProd($endpoint)
{
    $baseUrl = env('API_BASE_URL_PROD');
    return $baseUrl . $endpoint;
}
