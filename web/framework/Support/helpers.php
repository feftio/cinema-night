<?php

if (! function_exists('csrf_token'))
{

    function csrf_token()
    {
    	echo Csrf::token();
    }

}

if (! function_exists('csrf_field'))
{

    function csrf_field()
    {
        echo Csrf::field();
    }

}

if (! function_exists('view'))
{

    function view($path)
    {
    	View::render($path);
    }

}