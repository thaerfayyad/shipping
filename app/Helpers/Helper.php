<?php


if (!function_exists('setting_value')) {
     /**
      * Returns a setting value
      *
      * @param integer $key
      * key contains the name of the setting to call
      *
      * @param string $language
      * language of key to be returned
      *
      * @return string a value for the key and language
      *
      * */
    function setting_value($key, $language = null)
     {

        if(is_null($language)){
            $lang = \Lang::getLocale();
            if(!in_array($lang, ['ar','en'])){
                $lang = 'ar';
            }
            $setting = \App\Models\Setting::where('language',$lang)->where('key',$key)->first();
        }else{
            $setting = \App\Models\Setting::where('language',$language)->where('key',$key)->first();
        }

        if(empty($setting))
        return '';

        return  $setting->value;
     }
 }