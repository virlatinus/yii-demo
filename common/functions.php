<?php
/**
 * Requires `define('USE_HTTPS', true)` to be in your `index.php` file!
 */
function getUrlScheme(): string
{
    return ((defined('USE_HTTPS') && USE_HTTPS) === true) ? 'https' : 'http';
}

/**
 * Requires `define('DOMAIN_NAME', 'example.tld')` to be in your `index.php` file!
 */
function getDomain($subDomain = null): string
{
    $sub = $subDomain ? $subDomain . '.' : '';
    return getUrlScheme() . '://' . $sub . (defined('DOMAIN_NAME') ? DOMAIN_NAME : 'localhost') . (defined('APP_PORT') ? ':' . APP_PORT : '');
}
