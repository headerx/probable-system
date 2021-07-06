<div x-data="{ expand : '' }">
    @isset($status)
        <livewire:core::admin.pages.livewire-datatable.datatable :status="$status" />
    @else
        <livewire:core::admin.pages.livewire-datatable.datatable />
    @endisset
</div>
