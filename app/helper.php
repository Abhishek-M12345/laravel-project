<?php
if(!function_exists('p'))
{
    function p($data)
    {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}

if(!function_exists('get_formatted_data')) {
    function get_formatted_data($data, $format)
    {
        $formattedData = data($format, strtotime($data));
        return $formattedData;
    }
}
?>