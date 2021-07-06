<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;
use Turbine\Icons\Models\Icon;
use Turbine\Menus\Enums\MenuItemTargetEnum;
use Turbine\Menus\Enums\MenuItemTemplateEnum;
use Turbine\Menus\Enums\MenuItemTypeEnum;
use Turbine\Menus\Enums\MenuTemplateEnum;
use Turbine\Menus\Enums\MenuTypeEnum;
use Turbine\Menus\Models\InternalIframe;
use Turbine\Menus\Models\InternalLink;
use Turbine\Menus\Models\Menu;
use Turbine\Menus\Models\MenuItem;
use Turbine\Menus\Models\PageLink;
use Turbine\Pages\Models\Page;

class MenuSeeder extends Seeder
{
    use DisableForeignKeys;

    protected $connection;

    public function __construct()
    {
        $this->connection = config('turbine.auth.connection');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys($this->connection);

        $userMenu = Menu::create([
            'title' => 'Default User Menu',
            'name' => 'User',
            'handle' => 'default_user_menu',
            'type' => MenuTypeEnum::user(),
            'active' => true,
            'template' => MenuTemplateEnum::default(),
        ]);

        // $user = $userMenu->menuItems()->create([
        //     'type' => MenuItemTypeEnum::menu_link(),
        //     'template' => MenuItemTemplateEnum::default(),
        //     'target' => MenuItemTargetEnum::self(),
        //     'name' => 'Quick Links',
        //     'handle' => 'quick_links',
        //     'active' => true,
        //     'title' => 'Quick Links',
        // ]);

        // $userLinks = $user->internalLink()->saveMany([

        //     new InternalLink([
        //         'template' => MenuItemTemplateEnum::default(),
        //         'target' => MenuItemTargetEnum::self(),
        //         'route' => 'dashboard',
        //         'name' => 'Dashboard',
        //         'handle' => 'dashboard',
        //         'uri' => '/dashboard',
        //         'active' => true,
        //         'title' => 'Dashboard',
        //         'icon_id' => 'fas fa-tachometer-alt',
        //     ]),


        // ]);

        $dashboard = $userMenu->menuItems()->create([
            'type' => MenuItemTypeEnum::internal_link(),
            'template' => MenuItemTemplateEnum::default(),
            'target' => MenuItemTargetEnum::self(),
            'route' => 'dashboard',
            'name' => 'Dashboard',
            'handle' => 'dashboard_link',
            'uri' => '/dashboard',
            'active' => true,
            'title' => 'Dashboard',
            'icon_id' => 'fas fa-tachometer-alt',
        ]);

        $guestMenu = Menu::create([
            'title' => 'Default Guest Menu',
            'name' => 'Guest',
            'handle' => 'default_guest_menu',
            'type' => MenuTypeEnum::guest(),
            'active' => true,
            'template' => MenuTemplateEnum::default(),
        ]);

        $guest = $guestMenu->menuItems()->create([
            'type' => MenuItemTypeEnum::menu_link(),
            'template' => MenuItemTemplateEnum::default(),
            'target' => MenuItemTargetEnum::self(),
            'name' => 'Guest Links',
            'handle' => 'guest_links',
            'active' => true,
            'title' => 'Guest Links',
        ]);

        $guestLinks = $guest->pageLinks()->saveMany([

            new PageLink([
                'template' => MenuItemTemplateEnum::default(),
                'target' => MenuItemTargetEnum::self(),
                'name' => 'Example Page',
                'handle' => 'example_page',
                'active' => true,
                'title' => 'Link to the Example Page',
                'icon_id' => 1,
                'page_id' => Page::where('slug', 'example-page')->first()->id,
            ]),
        ]);

        $adminMenu = Menu::create([
            'title' => 'Admin',
            'name' => 'Admin',
            'handle' => 'default_admin_menu',
            'type' => MenuTypeEnum::admin(),
            'active' => true,
            'template' => MenuTemplateEnum::default(),
        ]);

        $access = $adminMenu->menuItems()->create([
            'type' => MenuItemTypeEnum::menu_link(),
            'template' => MenuItemTemplateEnum::default(),
            'target' => MenuItemTargetEnum::self(),
            'name' => 'Access',
            'handle' => 'access_mangement',
            'active' => true,
            'title' => 'Access',
            'icon_id' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>',
        ]);

        $adminAccessLinks = $access->internalLink()->saveMany([

            new InternalLink([
                'template' => MenuItemTemplateEnum::default(),
                'target' => MenuItemTargetEnum::self(),
                'route' => 'admin.users',
                'name' => 'Users',
                'handle' => 'user_manager',
                'uri' => '/admin/users',
                'active' => true,
                'title' => 'Icons',
                'icon_id' => '<svg class="h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>',
            ]),

            new InternalLink([
                'template' => MenuItemTemplateEnum::default(),
                'target' => MenuItemTargetEnum::self(),
                'route' => 'admin.roles',
                'name' => 'Roles',
                'handle' => 'role_manager',
                'uri' => '/admin/roles',
                'active' => true,
                'title' => 'Roles',
                'icon_id' => '<svg class="h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>',
            ]),
        ]);

        $content = $adminMenu->menuItems()->create([
            'type' => MenuItemTypeEnum::menu_link(),
            'template' => MenuItemTemplateEnum::default(),
            'target' => MenuItemTargetEnum::self(),
            'name' => 'Content',
            'handle' => 'content_mangement',
            'active' => true,
            'title' => 'Content',
            'icon_id' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>',
        ]);

        $contentLinks = $content->internalLink()->saveMany([

            new InternalLink([
                'template' => MenuItemTemplateEnum::default(),
                'target' => MenuItemTargetEnum::self(),
                'route' => 'admin.menus',
                'name' => 'Menus',
                'handle' => 'menu_manager',
                'uri' => '/admin/menus',
                'active' => true,
                'title' => 'Menus',
                'icon_id' => 'far fa-list-alt',
            ]),

            new InternalLink([
                'template' => MenuItemTemplateEnum::default(),
                'target' => MenuItemTargetEnum::self(),
                'route' => 'core.admin.icons',
                'name' => 'Icons',
                'handle' => 'icon_manager',
                'uri' => '/admin/icons',
                'active' => true,
                'title' => 'Icons',
                'icon_id' => 'fas fa-icons',
            ]),

            new InternalLink([
                'template' => MenuItemTemplateEnum::default(),
                'target' => MenuItemTargetEnum::self(),
                'route' => 'admin.pages',
                'name' => 'Pages',
                'handle' => 'page_manager',
                'uri' => '/admin/pages',
                'active' => true,
                'title' => 'Pages',
                'icon_id' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>',
            ]),
        ]);


        $system = $adminMenu->menuItems()->create([
            'type' => MenuItemTypeEnum::menu_link(),
            'template' => MenuItemTemplateEnum::default(),
            'target' => MenuItemTargetEnum::self(),
            'name' => 'System',
            'handle' => 'default_system_menu',
            'active' => true,
            'title' => 'System Menu',
            'icon_id' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>',
        ]);

        $systemLinks = $system->internalIframes()->saveMany([
            new InternalIframe([
                'template' => MenuItemTemplateEnum::default(),
                'target' => MenuItemTargetEnum::self(),
                'name' => 'Database',
                'handle' => 'adminer_link',
                'uri' => '/adminer',
                'active' => true,
                'title' => 'Link to adminer',
                'icon_id' => '<svg class="h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>',
            ]),
            new InternalIframe([
                'template' => MenuItemTemplateEnum::default(),
                'target' => MenuItemTargetEnum::self(),
                'name' => 'Logs',
                'handle' => 'system_logs',
                'uri' => '/admin/log-viewer/logs',
                'active' => true,
                'title' => 'Link to the Logs table',
                'icon_id' => '<svg class="h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>',
            ]),
        ]);


        MenuItem::setNewOrder([
            $dashboard->id,
            $access->id,
            $content->id,
            $system->id,
            // $user->id,
            $guest->id,
        ]);

        Menu::setNewOrder([
            $userMenu->id,
            $adminMenu->id,
            $guestMenu->id,
        ]);

        $this->enableForeignKeys($this->connection);
    }
}
