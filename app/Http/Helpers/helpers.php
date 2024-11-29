<?php

use App\Models\BusinessDetails;


function status($id)
{
    if ($id == 1) {
        $x = 'active';
    } elseif ($id == 0) {
        $x = 'in-active';
    }

    return $x;
}

function slug($string)
{
    return Illuminate\Support\Str::slug($string);
}

function getTrx($length = 12)
{
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function strLimit($title = null, $length = 10)
{
    return \Illuminate\Support\Str::limit($title, $length);
}

function urlPath($routeName, $routeParam = null)
{
    if ($routeParam == null) {
        $url = route($routeName);
    } else {
        $url = route($routeName, $routeParam);
    }
    $basePath = route('home');
    $path = str_replace($basePath, '', $url);
    return $path;
}

function showMobileNumber($number)
{
    $length = strlen($number);
    return substr_replace($number, '***', 2, $length - 4);
}

function showEmailAddress($email)
{
    $endPosition = strpos($email, '@') - 1;
    return substr_replace($email, '***', 1, $endPosition);
}

function error_processor($validator)
{
    $err_keeper = [];
    foreach ($validator->errors()->getMessages() as $index => $error) {
        $err_keeper[] = ['code' => $index, 'message' => $error[0]];
    }
    return $err_keeper;
}

function siteLogo()
{
    return asset('assets/media/logos/genilogo.png');
}

function setEnvironmentValue($envKey, $envValue)
{
    $envFile = app()->environmentFilePath();
    $str = file_get_contents($envFile);
    if (is_bool(env($envKey))) {
        $oldValue = var_export(env($envKey), true);
    } else {
        $oldValue = env($envKey);
    }

    if (strpos($str, $envKey) !== false) {
        $str = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}", $str);
    } else {
        $str .= "{$envKey}={$envValue}\n";
    }
    $fp = fopen($envFile, 'w');
    fwrite($fp, $str);
    fclose($fp);
    return $envValue;
}

function businessDetailsCreate($business_details, $userID)
{

    $tempArray = [
        'company_name' => !empty($business_details['company_name']) ? $business_details['company_name'] : '',
        'company_email' => !empty($business_details['company_email']) ? $business_details['company_email'] : '',
        'address' => !empty($business_details['address']) ? $business_details['address'] : '',
        'state_id' => !empty($business_details['state_id']) ? $business_details['state_id'] : 0,
        'district_id' => !empty($business_details['district_id']) ? $business_details['district_id'] : 0,
        'city_id' => !empty($business_details['city_id']) ? $business_details['city_id'] : '',
        'pincode' => !empty($business_details['pincode']) ? $business_details['pincode'] : '',
        'contact_number' => !empty($business_details['contact_number']) ? $business_details['contact_number'] : '',
        'contact_person_name' => !empty($business_details['contact_person_name']) ? $business_details['contact_person_name'] : '',
        'category' => !empty($business_details['category']) ? $business_details['category'] : '',
        'gst' => !empty($business_details['gst']) ? $business_details['gst'] : '',
        'user_id' => !empty($userID) ? $userID : '',
    ];
    $business_details_exits = BusinessDetails::where('user_id', $userID)->first();
    if (!empty($business_details_exits)) {
        BusinessDetails::where('user_id', $userID)->update($tempArray);
        $businessDetails = $tempArray;
    } else {
        $businessDetails = BusinessDetails::create($tempArray);
    }

    return $businessDetails;
}



