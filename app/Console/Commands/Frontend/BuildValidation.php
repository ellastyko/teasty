<?php

namespace App\Console\Commands\Frontend;

// TODO
/**
 * Class BuildValidation
 */
class BuildValidation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'frontend:validation';

    /**
     * Name of the created file.
     *
     * @var string
     */
    protected string $targetFilename = 'validation.json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build validation rules for frontend (put all rules into a .json file).';

    /**
     * List of all validation rules that should be passed to FE
     * (VeeValidate knows how to handle it).
     *
     * @var array
     */
    protected array $availableRules = [
        'between',
        'email',
        'max',
        'min',
        'numeric',
        'regex',
        'required',
        'valid_url',
        'size',
        'mimes',
        'dimensions',
    ];

    /**
     * Export data into json file.
     *
     * @return array
     */
    public function export(): array
    {
        return $this->getValidationRules();
    }

    /**
     * Get all validation rules for all the fields.
     *
     * @return array
     */
    protected function getValidationRules(): array
    {
        $rules   = [];

        return $rules;
    }
}
