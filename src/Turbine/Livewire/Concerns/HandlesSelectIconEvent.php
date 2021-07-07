<?php

namespace Turbine\Livewire\Concerns;

use HeaderX\BukuIcons\Models\Icon;

trait HandlesSelectIconEvent
{
    public function selectIcon($value): void
    {
        $this->state['icon_id'] = $value;
        $this->reloadIconPreview();
    }

    public function reloadIconPreview(): void
    {
        $this->iconPreview = (Icon::find($this->state['icon_id']))->name ?? 'carbon-no-image-32';
    }
}
