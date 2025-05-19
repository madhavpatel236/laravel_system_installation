<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-migration {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description for the migration';

    /**
     * Execute the console command.
     */

    /**
     * @param Filesystem $files
     */
    public $files;
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    public function handle()
    {
        //
    }
}
