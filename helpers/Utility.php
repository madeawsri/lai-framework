<?php
namespace Helpers;

class Utility {
    public static function formatDate($date) {
        return date("Y-m-d", strtotime($date));
    }

    public static function toUpperCase($string) {
        return strtoupper($string);
    }
}