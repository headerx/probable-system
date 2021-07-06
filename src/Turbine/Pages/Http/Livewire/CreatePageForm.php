<?php

namespace Turbine\Pages\Http\Livewire;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Turbine\Livewire\BaseCreateForm;
use Turbine\Pages\Actions\CreatePageAction;
use Turbine\Pages\Models\Page;
use Turbine\Pages\Models\PageTemplate;

class CreatePageForm extends BaseCreateForm
{
    use SwapsTemplate;

    /**
     * The create form state.
     *
     * @var array
     */
    public $state = [
        'title' => '',
        'slug' => '',
        'html' => '',
        'css' => '',
        'template_id' => '',
        'layout' => 'layouts.guest',
        'active' => 1,
        'meta' => [],
    ];

    public function createPage(CreatePageAction $createPageAction): void
    {
        $this->authorize('is_admin');

        $this->resetErrorBag();

        $createPageAction($this->state);

        $this->emit('refreshWithSuccess', 'Web Page Created!');
        $this->creatingResource = false;
    }

    public function sluggify(): void
    {
        $this->state['slug'] = Str::slug($this->state['slug']);
    }



    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('core.admin.pages.create-form', [
            'templates' => PageTemplate::all(),
        ]);
    }
}
