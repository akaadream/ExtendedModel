<?php

namespace Akaadream\ExtendedModel;

use Akaadream\ExtendedModel\Console\ExtendedModelMakeCommand;
use Illuminate\Support\ServiceProvider;

class ExtendedModelProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ExtendedModelMakeCommand::class
            ]);
        }
    }
}
