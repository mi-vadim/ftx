<?php
declare(strict_types=1);

namespace FTX\Api\Traits;

trait TransformsTimestamps
{
    protected function transformTimestamps(...$timestamps): array
    {
        return array_map(static function ($dateTime) {
            if ($dateTime instanceof \DateTimeInterface) {
                return $dateTime->getTimestamp();
            }
            return null;
        }, $timestamps);
    }
}
