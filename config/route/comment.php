<?php
/**
 * Routes for pages with comment sections.
 */

return [
    "mount" => "comment",
    "routes" => [
        [
            "info" => "Show the comments for requested post.",
            "requestMethod" => "get|post",
            "path" => "{postid:digit}",
            "callable" => ["commentController", "showComments"]
        ],
        [
            "info" => "Reply to an existing comment",
            "requestMethod" => "get|post",
            "path" => "{postid:digit}/reply",
            "callable" => ["commentController", "replyComment"]
        ],
        [
            "info" => "Edit comment",
            "requestMethod" => "get|post",
            "path" => "{postid:digit}/edit",
            "callable" => ["commentController", "editComment"]
        ],
        [
            "info" => "Delete comment from dataset",
            "requestMethod" => "get|post",
            "path" => "{postid:digit}/delete",
            "callable" => ["commentController", "deleteComment"]
        ],
    ],
];
