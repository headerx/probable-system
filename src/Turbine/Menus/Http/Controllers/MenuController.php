<?php

namespace Turbine\Menus\Http\Controllers;

use Turbine\Menus\Models\MenuItem;

class MenuController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(MenuItem $menuItem)
    {
        return view('core.menus.show', [
            'parent' => $menuItem,
        ]);
    }
}
