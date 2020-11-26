<?php

use Eve\Uuid\Uuid;

if (!function_exists('uuid')) {
    function uuid(): string
    {
        return Uuid::generate();
    }
}
