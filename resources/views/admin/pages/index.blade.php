<x-7xl>
    <x-slot name="header">
        {{__('Pages')}}
    </x-slot>

    <x-slot name="headerActions">
        @include('admin.pages.header-actions')
    </x-slot>

    @include('admin.pages.table')

    {{-- <livewire:core::admin.pages.create /> --}}
    {{-- <livewire:core::admin.pages.edit /> --}}
    <livewire:core::admin.pages.delete />
    <livewire:core::admin.pages.deactivate />
</x-7xl>


