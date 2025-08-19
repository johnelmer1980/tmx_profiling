<?php
// This file takes the ThreatMetrix Session Query API Response and outputs it to the screen in a readable format.
// In a production implementation, this would not be done. Instead the results should be captured by the back-end
// and stored in a database or other system that utilizes the ThreatMetrix response.
// Prints the individual attribute key value pairs
function print_attribute($key, $value)
{
    if(isset($value))
    {
        if(is_array($value))
        {
            $value = implode(", ", $value);
        }
        echo "$key: $value<br>";
    }
    else
    {
        echo "$key: Unknown<br>";
    }
}

//prints attributes in a table
function print_attribute_table($key, $value)
{
    if(isset($value))
    {
        if(is_array($value))
        {
            $value = implode(", ", $value);
        }
        echo "<tr><th>$key</th><td>$value</td></tr>";
    }
    else
    {
        echo "<tr><th>$key</th><td>Unknown</td></tr>";
    }
}

//prints the attributes with a tooltip
function print_attribute_tooltip($key, $value)
{
    if(isset($value))
    {
        if(is_array($value))
        {
            $value = implode(", ", $value);
        }
        echo "<span id=\"" . str_replace(' ', '', $key) . "\" title=\"$key\" data-toggle=\"popover\" data-trigger=\"focus\" data-content=\"\" tabindex=\"0\" role=\"button\"><span class=\"key_tooltip\">$key: </span><span class=\"value\">$value</span></span><br />";
    }
    else
    {
        echo "<span class=\"key\">$key: </span><span class=\"value_unknown\">Unknown</span><br>";
    }
}

// Function to print the key/value pairs
function print_kvp($kvp)
{
    foreach($kvp as $key => $value)
    {
        print_attribute($key, $value);
    }
}

// Function to print the key/value pairs in a table
function print_kvp_table($kvp)
{
    foreach($kvp as $key => $value)
    {
        print_attribute_table($key, $value);
    }
}


// Function to print specific key/value pairs
function print_specific($kvp, $vars)
{
    foreach($kvp as $key => $value)
        foreach($vars as $string)
            if($key == $string)
            {
                print_attribute($key, $value);
            }
}

function print_kvp_tooltip($kvp)
{
    foreach($kvp as $key => $value)
    {
        print_attribute_tooltip($key, $value);
    }
}

// Parses the API results into an associative array
function parse_api($api_result)
{
    $kvs = explode("&", $api_result);
    $results = array();
    foreach($kvs as $string)
    {
        $kv = explode("=", $string);
        if(isset($kv[0]) && isset($kv[1]))
        {
            $value = urldecode($kv[1]);
            if(isset($results[$kv[0]]))
            {
                // Make an array of the values
                if(!is_array($results[$kv[0]]))
                {
                    $results[$kv[0]] = array($results[$kv[0]]);
                }
                array_push($results[$kv[0]], $value);
            }
            else
            {
                $results[$kv[0]] = $value;
            }
        }
    }

    return $results;
}
?>