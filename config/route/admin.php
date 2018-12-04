<?php
/**
 * Routes for admin interface.
 */
return [
    "routes" => [
        [
            "info" => "Check if logged in user is admin before allowing access to any route",
            "requestMethod" => null,
            "path" => "**",
            "callable" => ["userAdminController", "isAdmin"]
        ],
        [
            "info" => "Controller index.",
            "requestMethod" => "get",
            "path" => "",
            "callable" => ["userAdminController", "getIndex"],
        ],
        [
            "info" => "Create new user.",
            "requestMethod" => "get|post",
            "path" => "create",
            "callable" => ["userAdminController", "getPostCreateItem"],
        ],
        [
            "info" => "Delete a user.",
            "requestMethod" => "get|post",
            "path" => "delete/{id:digit}",
            "callable" => ["userAdminController", "getPostDeleteItem"],
        ],
        [
            "info" => "Update user details.",
            "requestMethod" => "get|post",
            "path" => "update/{id:digit}",
            "callable" => ["userAdminController", "getPostUpdateItem"],
        ],
    ]
];
