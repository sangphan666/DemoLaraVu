<?php

if (!function_exists('call_message')) {
    /**
     * @param string $key
     * @param string $param
     * @return string
     */
    function call_message($key, $param)
    {
        $msg = trans($key, $param);
        return $msg;
    }
}

if (!function_exists('get_permissions')) {
    /**
     * @return array
     */
    function get_permissions()
    {
        $listModule = array_map('basename', File::directories(base_path().'/package/JPTech'));
        $permissions = array();

        foreach ($listModule as $module) {
            if (file_exists(base_path().'/package/JPTech/'.$module.'/config/permissions.php')) {
                $permissionsModule = require base_path().'/package/JPTech/'.$module.'/config/permissions.php';
                array_push($permissions, $permissionsModule);
            }
        }
        return $permissions;
    }
}

if (!function_exists('get_package_name')) {
    /**
     * @param string $packageName
     * @return string
     */
    function get_package_name()
    {
        $file = base_path().'/composer.lock';
        $packages = json_decode(file_get_contents($file), true)['packages'];
        $packagesName = array();
        foreach ($packages as $package) {
            array_push($packagesName, $package['name']);
        }
        return $packagesName;
    }
}

if (!function_exists('get_package_version')) {
    /**
     * @param string $packageName
     * @return string
     */
    function get_package_version($packageName)
    {
        $file = get_include_path().'/../composer.lock';
        $packages = json_decode(file_get_contents($file), true)['packages'];
        foreach ($packages as $package) {
            if ($package['name'] == $packageName) {
                return $package['version'];
            }
        }
        
        return null;
    }
}

function asset_package($path, $secure = null)
{
    $url = app('url')->asset("package/".$path, $secure);;
    return str_replace('public/','',$url);
    /*return app('url')->asset("package/".$path, $secure);*/
}