<div x-data="{ expand : '' }">

    @isset($status)
        <livewire:core::admin.menus.menu-items-table :status="$status" />
    @else
        <livewire:core::admin.menus.menu-items-table />
    @endisset

</div>
