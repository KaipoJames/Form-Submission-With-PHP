<?php
function modify_title($input)
{
    $output = ob_get_contents();
    if (ob_get_length() > 0) {
        ob_end_clean();
    }
    $patterns = array("/<title>(.*?)<\/title>/");
    $replaced = array("<title>$input</title>");
    $output = preg_replace($patterns, $replaced, $output);
    echo $output;
}