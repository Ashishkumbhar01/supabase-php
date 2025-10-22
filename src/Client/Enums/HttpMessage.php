<?php

declare(strict_types=1);

namespace Supabase\Client\Enums;

use Supabase\Client\Enums\HttpMethod;
use Supabase\Client\Enums\HttpStatus;

enum HttpMessage: string
{
    case REQUEST = 'Request';
    case RESPONSE = 'Response';

    public function describe(HttpMethod $method, HttpStatus $status): string
    {
        return match($this) {
            self::REQUEST => $this->describeRequest($method),
            self::RESPONSE => $this->describeResponse($status),
        };
    }

    private function describeRequest(?HttpMethod $method): string
    {
        if ($method === null){
            return 'Undefined HTTP Request';
        }

        return match($method) {
            HttpMethod::GET => 'A GET request retrieves data from the server.',
            HttpMethod::POST => 'A POST request sends new data to the server.',
            HttpMethod::PUT => 'A PUT request replaces an existing resource or creates one.',
            HttpMethod::PATCH => 'A PATCH request partially updates a resource.',
            HttpMethod::DELETE => 'A DELETE request removes a resource from the server.',
            HttpMethod::OPTIONS => 'An OPTIONS request describes communication options.',
            HttpMethod::HEAD => 'A HEAD request retrieves headers without a body.',
        };
    }

    private function describeResponse(?HttpStatus $status): string
    {
        if ($status === null){
            return 'Undefined HTTP Response';
        }

        return match ($status) {
    HttpStatus::OK,
    HttpStatus::CREATED,
    HttpStatus::ACCEPTED,
    HttpStatus::NO_CONTENT => "Success: {$status->reason()}",

    HttpStatus::MOVED_PERMANENTLY,
    HttpStatus::FOUND,
    HttpStatus::NOT_MODIFIED => "Redirection: {$status->reason()}",

    HttpStatus::BAD_REQUEST,
    HttpStatus::UNAUTHORIZED,
    HttpStatus::FORBIDDEN,
    HttpStatus::NOT_FOUND,
    HttpStatus::METHOD_NOT_ALLOWED => "Client Error: {$status->reason()}",

    HttpStatus::INTERNAL_SERVER_ERROR,
    HttpStatus::NOT_IMPLEMENTED,
    HttpStatus::BAD_GATEWAY,
    HttpStatus::SERVICE_UNAVAILABLE => "Server Error: {$status->reason()}",

    default => "Unknown Status: {$status->reason()}",
};

        /*return match(true) {
            $status->value >= 100 && $status->value < 200 => "Informational: {$status->reason()}",
            $status->value >= 200 && $status->value < 300 => "Success: {$status->reason()}",
            $status->value >= 300 && $status->value < 400 => "Redirection: {$status->reason()}",
            $status->value >= 400 && $status->value < 500 => "Client Error: {$status->reason()}",
            $status->value >= 500 => "Server Error: {$status->reason()}",
            default => "Unknown Status: {$status->reason()}",
    };*/
    }

    public static function detect(int $statusCode): self
    {
        return $statusCode >= 100 ? self::RESPONSE : self::REQUEST;
    }
}
