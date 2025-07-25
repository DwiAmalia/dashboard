<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    public $default;

    /**
     * The directory that holds the Migrations and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * @var array<string, mixed>
     */
    // public array $default = [
    //     'DSN'          => '',
    //     'hostname'     => 'localhost',
    //     'username'     => '',
    //     'password'     => '',
    //     'database'     => '',
    //     'DBDriver'     => 'MySQLi',
    //     'DBPrefix'     => '',
    //     'pConnect'     => false,
    //     'DBDebug'      => true,
    //     'charset'      => 'utf8mb4',
    //     'DBCollat'     => 'utf8mb4_general_ci',
    //     'swapPre'      => '',
    //     'encrypt'      => false,
    //     'compress'     => false,
    //     'strictOn'     => false,
    //     'failover'     => [],
    //     'port'         => 3306,
    //     'numberNative' => false,
    //     'dateFormat'   => [
    //         'date'     => 'Y-m-d',
    //         'datetime' => 'Y-m-d H:i:s',
    //         'time'     => 'H:i:s',
    //     ],
    // ];

    /**
     * This database connection is used when running PHPUnit database tests.
     *
     * @var array<string, mixed>
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => '',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
        'dateFormat'  => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    public function __construct()
    {
        parent::__construct();
        $this->default = [
            'DSN'          => '',
            'hostname'     => getenv('database.default.hostname') ?? 'localhost',
            'username'     => getenv('database.default.username') ?? 'root',
            'password'     => getenv('database.default.password') ?? '',
            'database'     => getenv('database.default.database') ?? 'db_sikasn',
            'DBDriver'     => getenv('database.default.DBDriver') ?? 'MySQLi',
            'DBPrefix'     => getenv('database.default.DBPrefix') ?? '',
            'pConnect'     => false,
            'DBDebug'      => (ENVIRONMENT !== 'production'),
            'charset'      => getenv('database.default.charset') ?? 'utf8mb4',
            'DBCollat'     => getenv('database.default.collation') ?? 'utf8mb4_general_ci',
            'swapPre'      => '',
            'encrypt'      => false,
            'compress'     => false,
            'strictOn'     => false,
            'failover'     => [],
            'port'         => (int) getenv('database.default.port') ?? 3306, // Cast to integer
            'numberNative' => false,
            'dateFormat'   => [
                'date'     => 'Y-m-d',
                'datetime' => 'Y-m-d H:i:s',
                'time'     => 'H:i:s',
            ]
        ];
        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
