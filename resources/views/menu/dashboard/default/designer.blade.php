<div>

    <x-app-grid wire:sortable="updateSort" >
        @forelse($menuItems as $item)
            <x-article-stacked
                    wire:sortable.item="{{ $item->id ?? $item['id'] }}"
                    wire:key="item-{{ $item->id?? $item['id'] }}"
                    href="javascript:void(0)"
                    :target="$item->target ?? $item['target']"
                    class="border border-dashed">

                <div class="w-24 h-24 ml-auto mr-auto picture-box">
                    @isset($item->icon->art )
                    {!! $item->icon->art !!}
                    @elseif (isset($item['icon']['art']))
                     {!! $item['icon']['art'] !!}
                    @endisset
                </div>

                <x-slot name="caption">
                    <p class="ml-auto mr-auto overflow-hidden leading-none tracking-tighter">
                        {{ $item->name ?? $item['name']}} sort:{{ $item->sort ?? $item['sort']}} id:{{ $item->id ?? $item['id']}}
                    </p>
                </x-slot>

                <div class="flex">
                    <x-edit-button-live class="z-50 -ml-24 bg-opacity-90" wire:model="designerView" wire:click="dialog('edit', {{ $item->id ?? $item['id'] }})" id="editMenuButton_{{ $item->id ?? $item['id'] }}" />
                    <x-delete-button-live class="z-50 bg-opacity-90 -ml-14 " wire:model="designerView" wire:click="confirm('delete', {{ $item->id ?? $item['id'] }})" />
                </div>
            </x-article-stacked>


        @empty
            <x-article-stacked>

                <div class="w-24 h-24 ml-auto mr-auto picture-box">
                    <svg class="h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>

                <x-slot name="caption">
                    {{__('No Items')}}
                </x-slot>
            </x-article-stacked>
        @endforelse
    </x-app-grid>

</div>
