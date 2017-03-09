<?php

/**
 * Return Authenticated user
 */
function user()
{
    return \Auth::user();
}

/**
 * Get app name
 * @return string
 */
function app_name()
{
    return config('app.name');
}
