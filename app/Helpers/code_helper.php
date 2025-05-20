<?php

// timestamp_helper.php

if (!function_exists('converted_day')) {
    function converted_day($timestamp_ms)
    {
        // Convert milliseconds to seconds
        $timestamp_s = $timestamp_ms / 1000;

        // Create DateTime object with UTC timezone
        $date = new \DateTime("@$timestamp_s"); // Using the "@" symbol to create from a Unix timestamp
        $date->setTimezone(new \DateTimeZone('Asia/Jakarta')); // Set to GMT+7 (Asia/Jakarta)

        // Get the day of the week and translate to Bahasa Indonesia
        $day_of_week = $date->format('l'); // Full day name (e.g., "Monday")

        // Translate the day to Indonesian
        $days_in_indonesia = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];

        return $days_in_indonesia[$day_of_week];
    }
}

if (!function_exists('converted_date')) {
    function converted_date($timestamp_ms)
    {
        // Convert milliseconds to seconds
        $timestamp_s = $timestamp_ms / 1000;

        // Create DateTime object with UTC timezone
        $date = new \DateTime("@$timestamp_s"); // Using the "@" symbol to create from a Unix timestamp
        $date->setTimezone(new \DateTimeZone('Asia/Jakarta')); // Set to GMT+7 (Asia/Jakarta)

        // Format the date
        return $date->format('d/m/Y');
    }
}

if (!function_exists('converted_time')) {
    function converted_time($timestamp_ms)
    {
        // Convert milliseconds to seconds
        $timestamp_s = $timestamp_ms / 1000;

        // Create DateTime object with UTC timezone
        $date = new \DateTime("@$timestamp_s"); // Using the "@" symbol to create from a Unix timestamp
        $date->setTimezone(new \DateTimeZone('Asia/Jakarta')); // Set to GMT+7 (Asia/Jakarta)

        // Format the time
        return $date->format('H:i:s');
    }
}
