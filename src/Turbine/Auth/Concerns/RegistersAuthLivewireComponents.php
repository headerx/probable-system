<?php

namespace Turbine\Auth\Concerns;

use Livewire;
use Turbine\Auth\Http\Livewire\CreateRoleButton;
use Turbine\Auth\Http\Livewire\CreateRoleForm;
use Turbine\Auth\Http\Livewire\DeleteRoleDialog;
use Turbine\Auth\Http\Livewire\EditRoleForm;
use Turbine\Auth\Http\Livewire\RolesTable;

trait RegistersAuthLivewireComponents
{
    public function registerLivewire()
    {
        Livewire::component('turbine.auth.roles-table', RolesTable::class);
        Livewire::component('turbine.auth.create-role-form', CreateRoleForm::class);
        Livewire::component('turbine.auth.edit-role-form', EditRoleForm::class);
        Livewire::component('turbine.auth.delete-role-dialog', DeleteRoleDialog::class);
        Livewire::component('turbine.auth.create-role-button', CreateRoleButton::class);
    }
}
