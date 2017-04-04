<?php

namespace Myrtle\Core\Docks;

use Myrtle\Genders\Models\Gender;
use Myrtle\Genders\Policies\GendersPolicy;

class GendersDock extends Dock
{
    /**
     * Description for Dock
     *
     * @var string
     */
    public $description = 'Gender manager';

    /**
     * Explicit Gate definitions
     *
     * @var array
     */
    public $gateDefinitions = [
        'genders.admin' => GendersPolicy::class . '@admin',
        'genders.access.admin' => GendersPolicy::class . '@accessAdmin'
    ];

    /**
     * Policy mappings
     *
     * @var array
     */
    public $policies = [
        Gender::class => GendersPolicy::class,
        GendersPolicy::class => GendersPolicy::class,
    ];

    /**
     * List of config file paths to be loaded
     *
     * @return array
     */
    public function configPaths()
    {
        return [
            'docks.' . self::class => dirname(__DIR__, 2) . '/config/docks/genders.php',
            'abilities' => dirname(__DIR__, 2) . '/config/abilities.php',
        ];
    }

    /**
     * List of migration file paths to be loaded
     *
     * @return array
     */
    public function migrationPaths()
    {
        return [
            dirname(__DIR__, 2) . '/database/migrations',
        ];
    }

    /**
     * List of routes file paths to be loaded
     *
     * @return array
     */
    public function routes()
    {
        return [
            'admin' => dirname(__DIR__, 2) . '/routes/admin.php',
        ];
    }
}
