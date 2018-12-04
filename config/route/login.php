<?php
/**
 * Routes for login system.
 */
return [
    "routes" => [
        [
            "info" => "Account login",
            "requestMethod" => "get|post",
            "path" => "login",
            "callable" => ["userController", "loginUser"],
        ],
        [
            "info" => "Register new account.",
            "requestMethod" => "get|post",
            "path" => "register",
            "callable" => ["userController", "createUser"],
        ],
        [
            "info" => "Account logout",
            "requestMethod" => "get",
            "path" => "logout",
            "callable" => ["userController", "logoutUser"],
        ],
    ]
];
