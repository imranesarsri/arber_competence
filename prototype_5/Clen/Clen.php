<?php
class Clen
{
    public static function Clen($InputValue)
    {
        // Remove leading and trailing whitespace
        $InputValue = trim($InputValue);

        // Convert special characters to HTML entities
        $InputValue = htmlspecialchars($InputValue, ENT_QUOTES, 'UTF-8');

        // Remove HTML and PHP tags
        $InputValue = strip_tags($InputValue);

        // Convert to lowercase
        $InputValue = strtolower($InputValue);

        return $InputValue;
    }
}
