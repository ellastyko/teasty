<?php

namespace App\Console\Commands\Frontend;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;

// TODO
class BuildTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'frontend:translations';

    /**
     * Name of the created file.
     *
     * @var string
     */
    protected string $targetFilename = 'translations.json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build translations for frontend (put all translations into a .json file).';

    /**
     * BuildTranslations constructor.
     *
     * @param Application $app
     * @param Filesystem $filesystem
     */
    public function __construct(Application $app, Filesystem $filesystem)
    {
        parent::__construct($filesystem);

        $this->allowed = config('translations.locales', []);
    }
}
