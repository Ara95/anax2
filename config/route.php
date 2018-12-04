<?php
/**
 * Configuration file for routes.
 */
return [
    // Load these routefiles in order specified and optionally mount them
    // onto a base route.
    "routeFiles" => [
        [
            // These are for internal error handling and exceptions
            "mount" => null,
            "file" => __DIR__ . "/route/internal.php",
        ],
        [
            // For debugging and development details on Anax
            "mount" => "debug",
            "file" => __DIR__ . "/route/debug.php",
        ],
        [
            // Remserver
            "mount" => "api",
            "file" => __DIR__ . "/route/remserver.php",
        ],
        [
            // Add routes from bookController and mount on book/
            "mount" => "book",
            "file" => __DIR__ . "/route/book.php",
        ],
        [
            // Login routes
            "mount" => null,
            "file" => __DIR__ . "/route/login.php",
        ],
        [
            // User routes
            "mount" => "user",
            "file" => __DIR__ . "/route/user.php",
        ],
        [
            // User routes
            "mount" => "admin",
            "file" => __DIR__ . "/route/admin.php",
        ],
        [
            // To read flat file content in Markdown from content/
            "mount" => null,
            "sort" => 500,
            "file" => __DIR__ . "/route/flat-file-content.php",
        ],
        [
            // Keep this last since its a catch all
            "mount" => null,
            "sort" => 999,
            "file" => __DIR__ . "/route/404.php",
        ],
    ],

];
