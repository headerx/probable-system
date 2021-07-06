<x-7xl>
    <x-slot name="header">
        {{__('Pages')}}
    </x-slot>

    <x-slot name="headerActions">
        @include('admin.pages.header-actions')
    </x-slot>

    <livewire:core::admin.page-templates-table />

    {{-- <livewire:core::admin.pages.create /> --}}
    {{-- <livewire:core::admin.pages.edit /> --}}
    <livewire:core::admin.page-templates.delete />
</x-7xl>


