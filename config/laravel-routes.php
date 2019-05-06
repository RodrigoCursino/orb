<?php

return [

    /**
     * Some general settings
     */

    /**
     * The directory where we need to save the routes (by default in the storage directory)
     */
    'export_directory' => env('LARAVEL_ROUTES', 'public/laravel_routes'),

    /**
     * The disk that we use for the storage functions, see: config/filesystems.php in the Laravel project
     */
    'export_disk' => env('LARAVEL_ROUTES_DISK', 'local'),

    /**
     * Config about the javascript file with the functions
     */
    'script_functions_filename' => 'laravel_routes.js',
    'script_functions_template' => 'laravel-routes::functions',


    /**
     * the class that implements the BlueDragon\LaravelRoutes\Creators\FunctionCreator
     */
    'functions_creator' => '\\BlueDragon\\LaravelRoutes\\Creators\\FunctionCreator',

    /**
     * the class that implements the BlueDragon\LaravelRoutes\Publishers\FunctionsPublisherInterface
     */
    'functions_publisher' => '\\BlueDragon\\LaravelRoutes\\Publishers\\FunctionsPublisher',


    /**
     * the class that implements the BlueDragon\LaravelRoutes\Creators\RoutesCreatorInterface
     */
    'routes_creator' => '\\BlueDragon\\LaravelRoutes\\Creators\\RoutesCreator',

    /**
     * the class that implements the BlueDragon\LaravelRoutes\Creators\RoutesDataCreatorInterface
     */
    'routes_data_creator' => '\\BlueDragon\\LaravelRoutes\\Creators\\RoutesDataCreator',

    /**
     * the class that implements the BlueDragon\LaravelRoutes\Publishers\RoutesPublisherInterface
     */
    'routes_publisher' => '\\BlueDragon\\LaravelRoutes\\Publishers\\RoutesPublisher',

    /**
     * Config about the routes data file
     */
    'routes_file_extension' => 'json',
    // we automaticly add _groupname to the basename if the group isn't the default and you don't provide a filename
    'routes_file_basename' => 'routes',

    /**
     * The default route group
     */
    'default_group' => 'default',

    /**
     * The name of the variable where we search for
     */
    'route_keyname' => 'laroute_publish',

    /**
     * The route groups to publish
     *
     * You can use groups on the routes that aren't defined here. But the laravel-routes:publishall will not publish a
     *  route file for that group. It will also use the default config (include_true will be false)
     */
    'route_groups' => [
        'default' => [ // the group name
            'include_true' => true, // if we include the routes with 'laroute_publish' => true
            'routes' => [ // the routes we want to add to the group
//                'home' => true,
//                'resource.show' => true,
            ],
        ],
//        'other_group' => [
//            'include_true' => false,
//            'routes' => [
//                'home2' => true,
//            ],
//        ],
    ],
];
