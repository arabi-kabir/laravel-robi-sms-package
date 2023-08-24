<?php

namespace Arabi\RobiSMS\commands;

use Illuminate\Console\Command;

class PublishRobiSmsConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'robi-sms-api:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish config file';

    public $composer;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->composer = app()['composer'];
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $config_path = base_path() . '/config';

        $config_file = file_get_contents(__DIR__.'/../stubs/robi_sms.stub');
        $this->createFile($config_path . DIRECTORY_SEPARATOR, 'robi_sms.php', $config_file);
        $this->info('robi_sms.php file published');

        $this->info('Generating autoload files');
        $this->composer->dumpOptimized();

        $this->info('robi sms api config file generated');
    }

    public static function createFile ($path, $fileName, $contents)
    {
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $path = $path.$fileName;

        file_put_contents($path, $contents);
    }
}
