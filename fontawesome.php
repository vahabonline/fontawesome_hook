<?php
function server_url(){
    $server ="";
    if(isset($_SERVER['SERVER_NAME'])){
        $server = sprintf("%s://%s%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_NAME'], '/');
    }
    else{
        $server = sprintf("%s://%s%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_ADDR'], '/');
    }
    return $server;
}
add_hook('ClientAreaHeaderOutput', 1, function($vars) {
    $language = $vars['language'];
    $sslPage = $vars['servedOverSsl'];
    return "<link rel='stylesheet' href='".server_url()."assets/css/fontawesome-all.min.css' type='text/css' media='all' />";
});
?>