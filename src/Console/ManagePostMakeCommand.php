<?php

namespace dang\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class ManagePostMakeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:manage-post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new manage-post';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (parent::handle() === false && !$this->option('force')) {
            return;
        }

        if ($this->option('manage-post')) {
            $this->createManagePost();
        }
    }

    protected function createManagePost()
    {
        $managePostName = Str::studly(class_basename($this->argument('name')));

        $this->call('make:manage-post', [
            'name' => "{$managePostName}",
        ]);
    }

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'ManagePost';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\ManagerPosts';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['force', 'f', InputOption::VALUE_NONE, 'Create the class even if the manage-post already exists.'],
        ];
    }
}
