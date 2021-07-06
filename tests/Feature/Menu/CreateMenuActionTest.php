<?php

namespace Tests\Feature\Menu;

use Database\Factories\Concerns\GetsIcons;
use Faker\Factory;
use Turbine\Icons\Models\Icon;
use Turbine\Menus\Actions\CreateMenuAction;
use Turbine\Menus\Enums\MenuTemplateEnum;
use Turbine\Menus\Enums\MenuTypeEnum;
use Tests\TestCase;

class CreateMenuActionTest extends TestCase
{
    use GetsIcons;

    public function test_it_creates_a_menu()
    {
        $menu = (new CreateMenuAction)($this->definition());

        $this->assertDatabaseHas('menus', [
            'name' => 'test-name',
        ]);
    }

    private function definition()
    {
        $faker = Factory::create();

        return [
            'name' => 'test-name',
            'handle' => $faker->word(),
            'type' => $faker->randomElement(MenuTypeEnum::toValues()),
            'template' => $faker->randomElement(MenuTemplateEnum::toValues()),
            'icon_id' => Icon::firstOrCreate([
                'class' => $faker->randomElement($this->getIcons()),
            ], [
                'class' => $faker->randomElement($this->getIcons()),
                'source' => 'FontAwesome',
                'version' => config('fontawesome.version'),
            ]),
        ];
    }
}
