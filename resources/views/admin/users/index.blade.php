<x-7xl>
    <x-slot name="header">
        {{__('Users')}}
    </x-slot>

    <x-slot name="headerActions">
        @include('admin.users.header-actions')
    </x-slot>

    <livewire:core::admin.users.livewire-datatable.datatable />
</x-7xl>

<livewire:core::admin.users.create />
<livewire:core::admin.users.edit />
<livewire:core::admin.users.change-password />
<livewire:core::admin.users.clear-sessions />
<livewire:core::admin.users.delete />
<livewire:core::admin.users.deactivate />

