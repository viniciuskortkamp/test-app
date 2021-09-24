<link href='https://fonts.googleapis.com/css?family={{  get_buzzy_theme_config('googlefont', get_buzzy_config('googlefont', 'Roboto')) }}' rel='stylesheet' type='text/css' />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="{{  asset('assets/css/plugins.css', null, false) }}" />
<?php
$googlefont_prefix =  config('languages.language.'.$DB_USER_LANG.'.rtl') == true ? '-rtl' : '';
?>
<link type="text/css" rel="stylesheet" href="{{ asset('assets/css/application'. $googlefont_prefix .'.css') }}" />
