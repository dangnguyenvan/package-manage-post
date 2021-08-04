<?php

namespace dang;

use dang\Console\ManagePostMakeCommand;
use Illuminate\Support\ServiceProvider;


class ManagePostServiceProvider extends ServiceProvider
{
    protected $commands = [
        ManagePostMakeCommand::class,
    ];
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}
