<x-7xl>
    <x-slot name="header">
        {{__('Deactivated Users')}}
    </x-slot>

    <x-slot name="headerActions">
        @include('admin.users.header-actions')
    </x-slot>

    <livewire:core::admin.users.livewire-datatable.datatable status="deactivated" />
</x-7xl>

<livewire:core::admin.users.reactivate />
<livewire:core::admin.users.delete />
<livewire:core::admin.users.edit />
