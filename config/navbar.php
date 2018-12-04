<?php
/**
 * Config file for navbar.
 */

return [
    "config" => [
        "navbar-class" => "navbar",
    ],
    "items" => [
        "hem" => [
            "text" => "Hem",
            "route" => "",
        ],
        "om" => [
            "text" => "Om",
            "route" => "about",
        ],
        "redovisningar" => [
            "text" => "Redovisningar",
            "route" => "report",
        ],
        "remserver" => [
            "text" => "REM-server",
            "route" => "remserver",
        ],
        "comment" => [
            "text" => "Kommentarsystem",
            "route" => "comment",
        ],
        "books" => [
            "text" => "Böcker",
            "route" => "book",
        ],
    ]
];
