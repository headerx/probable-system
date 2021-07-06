<x-7xl>
    <x-slot name="header">
        {{__('Roles')}}
    </x-slot>

    <x-slot name="headerActions">
        @include('admin.roles.header-actions')
    </x-slot>

    <livewire:core::admin.roles.livewire-datatable.datatable />
</x-7xl>

<livewire:core::admin.roles.create />
<livewire:core::admin.roles.edit />
<livewire:core::admin.roles.delete />
