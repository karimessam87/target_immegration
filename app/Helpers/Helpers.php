<?php

if (!function_exists('route_is')) {
  function route_is($route = null)
  {
    if (Request::routeIs($route)) {
      return true;
    } else {
      return false;
    }
  }
}

if (!function_exists('route_is')) {
  function route_is($routes = [])
  {
    foreach ($routes as $route) {
      if (Request::routeIs($route)) {
        return true;
      } else {
        return false;
      }
    }
  }
}

if (!function_exists('notify')) {
  function notify($message, $type = 'success')
  {
    return array(
      'message' => $message,
      'alert-type' => $type,
    );
  }
}


if (!function_exists('alert')) {
  function alert($message, $type = 'success')
  {
    return array(
      'alert' => $message,
      'alert-type' => $type,
    );
  }
}
if (!function_exists('genders')) {
  function genders()
  {
    return [
      'male' => 'Male',
      'female' => 'Female'
    ];
  }
}
if (!function_exists('marital')) {
  function marital()
  {
    return [
      0 => 'Single',
      1 => 'Married',
      2 => 'Divorced',
      3 => 'Widow'
    ];
  }
}
if (!function_exists('canadianStatus')) {
  function canadianStatus(): array
  {
    return [
      0 => 'Permanent Resident',
      1 => 'Citizen',
    ];
  }
}
if (!function_exists('governorates')) {
  function governorates($needle = 'governorates')
  {
    $json_g = File::get("../database/data/governorates.json");
    $json_c = File::get("../database/data/cities.json");
    return $needle == 'cities' ? json_decode($json_c)[0] : json_decode($json_g)[0];
  }
}
