<?php

namespace Turbine\Menus\Concerns;

trait GetsCleanUri
{
    protected function getCleanUri(string $value)
    {
        return ltrim(str_replace(array_values(config('core.dirty_routes', [])), '', $value), '/');
    }
}
