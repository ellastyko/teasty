<?php

namespace App\Console\Commands\Frontend;

use Exception;
use Illuminate\Console\Command as BaseCommand;
use Illuminate\Filesystem\Filesystem;

/**
 * Class Command
 */
abstract class Command extends BaseCommand
{
    /**
     * Name of directory for the created file.
     *
     * @var string
     */
    protected string $targetDirectory = 'static';

    /**
     * Name of the created file.
     *
     * @var string
     */
    protected string $targetFilename = '';

    /**
     * Create a new command instance.
     *
     * @param Filesystem $filesystem
     */
    public function __construct(protected FileSystem $filesystem)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->createFile($this->export());
        } catch (Exception $e) {
            $this->error('An error occurred while frontend files creation. ' . $e->getMessage());
        }
    }

    /**
     * Set target filename.
     *
     * @param $targetFilename
     *
     * @return $this
     */
    protected function setTargetFileName($targetFilename): Command
    {
        $this->targetFilename = $targetFilename;

        return $this;
    }

    /**
     * Get target path for the created file.
     *
     * @return string
     * @throws Exception
     */
    protected function getTargetPath(): string
    {
        if (!$this->targetFilename) {
            throw new Exception('Filename property cannot be empty!');
        }

        return resource_path(
            implode(DIRECTORY_SEPARATOR, [$this->targetDirectory, $this->targetFilename])
        );
    }

    /**
     * Export data into json file.
     *
     * @return array
     */
    public function export(): array
    {
        return [];
    }

    /**
     * Create *.json file with data
     *
     * @param array $data
     * @throws \Exception
     */
    protected function createFile(array $data)
    {
        $file = $this->getTargetPath();

        try {
            $this->filesystem->put($file, json_encode($data));
        } catch (Exception $e) {
            $this->error('An error occurred during file creation. ' . $e->getMessage());

            throw $e;
        }

        $this->info("JSON file was successfully saved in {$file}.");
    }
}
