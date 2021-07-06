<x-7xl>
    <x-slot name="header">
        {{__('Icons')}}
    </x-slot>

    <x-slot name="headerActions">
        @include('admin.icons.header-actions')
    </x-slot>

    <livewire:core::admin.icons.icon-grid />
</x-7xl>
<livewire:core::admin.icons.create />
