<?php
declare(strict_types=1);

namespace FTX\Responses\Support;

use FTX\Client\HttpResponse;
use FTX\Responses\AbstractResponser;

class MessageResponse extends AbstractResponser
{
    public function __construct(
        public readonly int    $id,
        public readonly string $message,
        public readonly string $uploadedFileName,
        public readonly bool   $authorIsCustomer,
        public readonly string $time
    )
    {
    }

    public static function fromResponse(HttpResponse $response): static
    {
        return new self(
            id: $response->getAttribute('id'),
            message: $response->getAttribute('message'),
            uploadedFileName: $response->getAttribute('uploadedFileName'),
            authorIsCustomer: $response->getAttribute('authorIsCustomer'),
            time: $response->getAttribute('time'),
        );
    }
    
    public static function fromArray(array $response): static
    {
        return new self(
            id: $response['id'],
            message: $response['message'],
            uploadedFileName: $response['uploadedFileName'],
            authorIsCustomer: $response['authorIsCustomer'],
            time: $response['time'],
        );
    }
}
