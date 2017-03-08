<?php

/**
* Return Authenticated user
*/
function user() {
    return \Auth::user();
}

function app_name(){
    return config('app.name');
}