<?php

namespace Turbine\Menus\Console\Commands;

use Turbine\Console\Commands\CoreModelMakeCommand;

class MenuModelMakeCommand extends CoreModelMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:menu-model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a menu model';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace. '\\Menus\\Models';
    }
}
