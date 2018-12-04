<?php
/**
 * Routes for controller.
 */
return [
    "routes" => [
        [
            "info" => "Controller index.",
            "requestMethod" => "get",
            "path" => "",
            "callable" => ["bookController", "getIndex"],
        ],
        [
            "info" => "Create an item.",
            "requestMethod" => "get|post",
            "path" => "create",
            "callable" => ["bookController", "getPostCreateItem"],
        ],
        [
            "info" => "Delete an item.",
            "requestMethod" => "get|post",
            "path" => "delete/{id:digit}",
            "callable" => ["bookController", "getPostDeleteItem"],
        ],
        [
            "info" => "Update an item.",
            "requestMethod" => "get|post",
            "path" => "update/{id:digit}",
            "callable" => ["bookController", "getPostUpdateItem"],
        ],
    ]
];
