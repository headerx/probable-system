<x-core::admin.users.livewire-tables.tw.table.cell>
    @include('admin.users.type', ['user' => $row])
</x-core::admin.users.livewire-tables.tw.table.cell>

<x-core::admin.users.livewire-tables.tw.table.cell>
    {{ $row->name }}
</x-core::admin.users.livewire-tables.tw.table.cell>

<x-core::admin.users.livewire-tables.tw.table.cell>
    <a href="mailto:{{ $row->email }}">{{ $row->email }}</a>
</x-core::admin.users.livewire-tables.tw.table.cell>

{{-- <x-core::admin.users.livewire-tables.tw.table.cell>
    @include('admin.users.verified', ['user' => $row])
</x-core::admin.users.livewire-tables.tw.table.cell> --}}

<x-core::admin.users.livewire-tables.tw.table.cell>
    {{ $row->last_login_at ? $row->last_login_at->diffForHumans() : __('Never') }}
</x-core::admin.users.livewire-tables.tw.table.cell>

<x-core::admin.users.livewire-tables.tw.table.cell>
    {!! $row->roles_label !!}
</x-core::admin.users.livewire-tables.tw.table.cell>

{{-- <x-core::admin.users.livewire-tables.tw.table.cell>
    {!! $row->permissions_label !!}
</x-core::admin.users.livewire-tables.tw.table.cell> --}}

<x-core::admin.users.livewire-tables.tw.table.cell>
   {!! $row->getAllMenuItemsLabel() !!}
</x-core::admin.users.livewire-tables.tw.table.cell>

<x-core::admin.users.livewire-tables.tw.table.cell>
    @include('admin.users.actions', ['user' => $row])
</x-core::admin.users.livewire-tables.tw.table.cell>
