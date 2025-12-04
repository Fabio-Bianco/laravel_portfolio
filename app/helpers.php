<?php

use App\Helpers\IconHelper;

if (!function_exists('icon')) {
    /**
     * Render an icon from IconHelper
     */
    function icon(string $type, string $name, int $width = 20, int $height = 20, string $class = ''): string
    {
        switch ($type) {
            case 'category':
                $iconContent = IconHelper::getCategoryIcon($name);
                break;
            case 'hero':
                $iconContent = IconHelper::getHeroIcon($name);
                break;
            default:
                $iconContent = '';
        }

        return IconHelper::renderIcon($iconContent, $width, $height, $class);
    }
}