<div x-data="{ menuType: '{{isset($state['type']) ? $state['type'] : \Megalith\Menus\Enums\MenuItemTypeEnum::menu_item() }}' }">

    @include('admin.menus.name')

    @include('admin.menus.handle')

    @if(isset($item) && $item)
        @include('admin.menus.select-menu')
    @else
        @include('admin.menus.select-item-group')
    @endif

    @include('admin.menus.title')

    @include('admin.menus.select-item-type')

    <div x-cloak x-show="menuType !='{{ \Megalith\Menus\Enums\MenuItemTypeEnum::menu_link() }}' && menuType !='Megalith\egalith\Menus\Enums\MenuItemTypeEnum::page_link() }}'">
        @include('admin.menus.link')
    </div>

    <div x-cloak x-show="menuType ==='{{ \Megalith\Menus\Enums\MenuItemTypeEnum::page_link() }}' ">
        @include('admin.menus.select-page')
    </div>

    @include('admin.menus.select-active')

    @include('admin.menus.sort')

    <div x-data="{ menuGroup: '{{ isset($model->group) ? $model->group : 'app'}}' }">

    </div>

    @include('admin.icons.icon-editor')
</div>
