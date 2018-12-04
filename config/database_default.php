<?php
/**
 * Config file for Database.
 * NOTE: This is a default file, and all login details should be replaced
 * with actual info.
 */
return [
    "dsn"             => "mysql:host=localhost;dbname=anaxdb;",
    "username"        => "anax",
    "password"        => "anax",
    "driver_options"  => [\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
    "fetch_mode"      => \PDO::FETCH_OBJ,
    "table_prefix"    => null,
    "session_key"     => "Anax\Database",

    // True to be very verbose during development
    "verbose"         => null,

    // True to be verbose on connection failed
    "debug_connect"   => false,
];
