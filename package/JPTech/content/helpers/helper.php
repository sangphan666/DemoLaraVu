<?php

if (!function_exists('example_helper_func')) {
    function example_helper_func()
    {
        return 'Demo Helper function';
    }
}

if (!function_exists('split_files_with_basename')) {
    function split_files_with_basename(array $files, $suffix = '.php')
    {
        $result = [];
        foreach ($files as $row) {
            $baseName = basename($row, $suffix);
            $result[$baseName] = $row;
        }
        return $result;
    }
}