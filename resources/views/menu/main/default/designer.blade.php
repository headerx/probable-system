<div>
    <x-app-grid wire:sortable="updateSort" class="border border-dashed" >
        @forelse($parent->authChildren as $item)
            <x-article-stacked
                wire:sortable.item="{{ $item->id }}"
                wire:key="item-{{ $item->uuid }}"
                href="javascript:void(0)"
                :target="$item->target"
                class="border border-dashed">

                <div class="w-24 h-24 ml-auto mr-auto picture-box">
                    {{ svg($item->icon->name ?? 'carbon-no-image-32', 'w-full h-full') }}
                </div>

                <x-slot name="caption">
                    <p class="ml-auto mr-auto overflow-hidden leading-none tracking-tighter">
                        {{ $item->name ?? $item->uri }}
                    </p>
                </x-slot>

                <div class="flex">
                    <x-edit-button-live class="z-50 -ml-24 bg-opacity-90" wire:model="designerView" wire:click="dialog('edit', {{ $item->id }})" id="editMenuButton_{{ $item->id }}" />
                    <x-delete-button-live class="z-50 bg-opacity-90 -ml-14 " wire:model="designerView" wire:click="confirm('delete', {{ $item->id }})" />
                </div>
            </x-article-stacked>


        @empty
            <x-article-stacked>

                <svg class="h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>

                <x-slot name="caption">
                    {{__('No Items')}}
                </x-slot>
            </x-article-stacked>
        @endforelse
    </x-app-grid>
    {{-- {{ $menu->children->pluck('id') }}
    {{Auth::user()->getAllMenuItems()->pluck('id')}} --}}
</div>
