<?php

namespace Turbine\Menus\Models;

use Database\Factories\ExternalIframeFactory;
use HeaderX\BukuIcons\Casts\IconIdCast;
use Turbine\Concerns\HasParent;
use Turbine\Menus\Casts\ExternalIframeUriCast;
use Turbine\Menus\Casts\SnakeCast;
use Turbine\Menus\Enums\MenuItemTemplateEnum;
use Turbine\Menus\Enums\MenuItemTypeEnum;

class ExternalIframe extends MenuItem
{
    use HasParent;

    protected $casts = [
        'type' => MenuItemTypeEnum::class,
        'template' => MenuItemTemplateEnum::class,
        'icon_id' => IconIdCast::class,
        'active' => 'bool',
        'handle' => SnakeCast::class,
        'uri' => ExternalIframeUriCast::class,
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ExternalIframeFactory::new();
    }
}
