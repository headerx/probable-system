<x-7xl>
    <x-slot name="header">
        {{__('Icons')}}
    </x-slot>

    <x-slot name="headerActions">
        @include('admin.icons.header-actions')
    </x-slot>

    <livewire:core::admin.icons.livewire-datatable.datatable />
</x-7xl>

<livewire:core::admin.icons.create />
<livewire:core::admin.icons.edit />
<livewire:core::admin.icons.delete />
