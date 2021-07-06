<?php

namespace Tests\Feature\Page\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire;
use Turbine\Pages\Http\Livewire\EditPageTemplateForm;
use Turbine\Pages\Models\PageTemplate;
use Tests\TestCase;

class UpdateTemplateTest extends TestCase
{
    /** @test */
    public function a_template_can_be_updated()
    {
        $this->loginAsAdmin();

        $page = PageTemplate::factory()->create();

        $this->assertDatabaseMissing('page_templates', [
            'id' => $page->id,
            'name' => 'updated name',
            'html' => '</p>updated html</p>',
        ]);

        Livewire::test(EditPageTemplateForm::class, ['resourceId' => $page->id])
            ->set(['state' => [
                'name' => 'updated name',
                'html' => '</p>updated html</p>',
            ]])
            ->call('updatePageTemplate');

        $this->assertDatabaseHas('page_templates', [
            'id' => $page->id,
            'name' => 'updated name',
            'html' => '</p>updated html</p>',
        ]);
    }
}
