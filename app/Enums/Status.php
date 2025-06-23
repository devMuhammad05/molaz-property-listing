<?php

namespace App\Enums;

enum Status: string
{

    case AVAILABLE = "available";
    case UNAVAILABLE = "unavailable";
    case UNDER_INSPECTION = "under_inspection";

    public static function values(): array
    {
        return array_column(Status::cases(), 'value');
    }
}
