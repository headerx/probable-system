<x-7xl>
    <x-slot name="header">
        {{__('Menus')}}
    </x-slot>

    <x-slot name="headerActions">
        @include('admin.menus.header-actions')
    </x-slot>

    @include('admin.menus.table')
    <livewire:core::admin.menus.create-menu-item />
    <livewire:core::admin.menus.edit-menu-item />
    <livewire:core::admin.menus.delete-menu-item />
    <livewire:core::admin.menus.deactivate-menu-item />
</x-7xl>

