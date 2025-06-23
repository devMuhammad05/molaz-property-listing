<?php

namespace App\Enums;

enum Category: string
{
    case ELECTRONIC = "electronic";
    // case REAL_ESTATE = "real_estate";
    case VEHICLE = "vehicle";
    case FURNITURE = "furniture";
    case FASHION = "fashion";


    public static function values(): array
    {
        return array_column(Category::cases(), 'value');
    }
}
