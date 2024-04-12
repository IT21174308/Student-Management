<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('getResolution'))
{
    function getResolution()
    {
        $width = isset($_SERVER['HTTP_X_SCREEN_WIDTH']) ? $_SERVER['HTTP_X_SCREEN_WIDTH'] : 0;
        $height = isset($_SERVER['HTTP_X_SCREEN_HEIGHT']) ? $_SERVER['HTTP_X_SCREEN_HEIGHT'] : 0;

        if ($width == 0 || $height == 0) {
            $resolution = '<script>document.write(screen.width + "x" + screen.height);</script>';
            return $resolution;
        }

        return $width . 'x' . $height;
    }
}

