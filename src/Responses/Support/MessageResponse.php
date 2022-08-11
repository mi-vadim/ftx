<?php
declare(strict_types=1);

namespace FTX\Responses\Support;

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

    public static function fromArray(array $data): static
    {
        return new self(
            id: $data['id'],
            message: $data['message'],
            uploadedFileName: $data['uploadedFileName'],
            authorIsCustomer: $data['authorIsCustomer'],
            time: $data['time'],
        );
    }
}
