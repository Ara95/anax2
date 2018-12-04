<?php
/**
 * Routes for user account.
 */
return [
    "routes" => [
        [
            "info" => "Check if user is logged in before allowing access to any route",
            "requestMethod" => null,
            "path" => "**",
            "callable" => ["userController", "isLoggedIn"]
        ],
        [
            "info" => "Account main page",
            "requestMethod" => "get",
            "path" => "",
            "callable" => ["userController", "userIndex"],
        ],
        [
            "info" => "Edit account details",
            "requestMethod" => "get|post",
            "path" => "details",
            "callable" => ["userController", "editUser"],
        ],
        [
            "info" => "Delete account",
            "requestMethod" => "get|post",
            "path" => "delete",
            "callable" => ["userController", "deleteUser"],
        ],
    ]
];
