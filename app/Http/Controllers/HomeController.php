<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('homeView');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dbName = ($request->input('dbName'));
        DB::statement("CREATE DATABASE IF NOT EXISTS " . $request->input('dbName'));

        $this->addDynamicDatabase($dbName);
        $this->dynamicCrudModel($dbName);
        Config::set('database.connections.' . $dbName, [
            'driver' => 'mysql',
            'host' => config('database.connections.mysql.host'),
            'port' => config('database.connections.mysql.port'),
            'database' => $dbName,
            'username' => config('database.connections.mysql.username'),
            'password' => config('database.connections.mysql.password'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ]);
        DB::setDefaultConnection($dbName);
        Artisan::call('migrate', ['--database' =>  $dbName, '--path' => '/database/migrations/2025_05_19_093247_crud_migration.php']);

        return redirect()->route('crud.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function addDynamicDatabase($dbname)
    {
        $routePath = base_path('config/database.php');
        $fileContents = file_get_contents($routePath);

        $content = "
            '{$dbname}' => [
                'driver' => 'mysql',
                'url' => env('DB_URL'),
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => env('DB_DATABASE', '{$dbname}'),
                'username' => env('DB_USERNAME', 'root'),
                'password' => env('DB_PASSWORD', 'Madhav@123'),
                'unix_socket' => env('DB_SOCKET', ''),
                'charset' => env('DB_CHARSET', 'utf8mb4'),
                'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                'engine' => null,
                'options' => extension_loaded('pdo_mysql') ? array_filter([
                    PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
                ],
                ) : [],
            ],";

        if (str_contains($fileContents, $content)) {
            // var_dump('first');
            // exit;
            return false;
        }

        // echo "<pre>";
        // var_dump(str_contains("// new_db", $fileContents));
        // exit;
        // if (!str_contains("// new_db", $fileContents)) {
        //     echo __LINE__;
        //     var_dump('// new_db');
        //     exit;
        //     // return false;
        // }

        $fileContents = str_replace(
            '// new_db',
            $content,
            $fileContents
        );
        file_put_contents($routePath, $fileContents);
        return true;
    }

    public function dynamicCrudModel($dbname)
    {
        $routePath = base_path('/app/Models/CrudModel.php');
        $fileContents = file_get_contents($routePath);

        $content = $dbname;

        // var_dump($content);
        // exit;

        if (str_contains($fileContents, $content)) {
            // var_dump('second');
            // exit;
            return false;
        }

        // if (!str_contains("// new_db", $fileContents)) {
        //     echo __LINE__;
        //     var_dump('// new_db');
        //     exit;
        //     // return false;
        // }

        $fileContents = str_replace(
            "'// new_db'",
            $content,
            $fileContents
        );
        file_put_contents($routePath, $fileContents);
        return true;
    }
}
