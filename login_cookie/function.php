<?php
/**
 * Summary of redirect
 * @param string $page
 * @return void
 */
function redirect(string $page):void
{
    header("LOCATION: {$page}.php");
}