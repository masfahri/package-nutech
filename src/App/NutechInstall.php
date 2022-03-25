<?php

namespace Masfahri\Nutech\App;

use Illuminate\Console\Command;

class NutechInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nutech:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all the dependencies';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('****** Menginstall Test Web Programming ******');
        $this->call('vendor:publish', [
            '--provider' => 'Masfahri\Nutech\NutechServiceProvider',
            '--force' => 'yes'
        ]);
    }
}
