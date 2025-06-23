<?php

namespace App\Enums;

enum PropertyType: string
{
    case APARTMENT = "apartment";
    case HOUSE = "house";
    case COMMERCIAL = "commercial";

    public static function values(): array
    {
        return array_column(PropertyType::cases(), 'value');
    }
}
