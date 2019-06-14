<?php

function is_active(string $arg)
{
    return $arg !== null && request()->segment(1) == $arg ? 'active' : '';

}

function imploding_other_files($file)
{
    return isset($file) && $file != '' ? implode('###', $file) : '';
}