<?php

namespace Turbine\Pages\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Turbine\Pages\Models\PageTemplate;

class PageTemplateController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('core.admin.pages.create-template');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(PageTemplate $template)
    {
        return view('core.admin.pages.edit-template', ['template' => $template]);
    }

}
