<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    // Define the table explicitly
    protected $table = 'website_settings';

    // Disable incrementing ID since the table doesn't have one
    public $incrementing = false;

    // Let Laravel know there's no primary key
    protected $primaryKey = null;

    // Disable timestamp columns since the table doesn't have `created_at` and `updated_at`
    public $timestamps = false;

    // Add fillable properties
    protected $fillable = ['staff_application_tab_visible', 'maintenance_mode', 'theme', 'trial_moderator_view'];

    /**
     * Check if the staff application tab is visible.
     */
    public static function isStaffApplicationTabVisible()
    {
        $setting = static::first();
        return $setting ? $setting->staff_application_tab_visible : 'false'; // Default to 'false'
    }

    /**
     * Update the visibility of the staff application tab.
     */
    public static function updateStaffApplicationTab($value)
    {
        $setting = static::first();
        if ($setting) {
            $setting->staff_application_tab_visible = $value;
            $setting->save();
        }
    }

     /**
     * Check if the Trial Moderator view on Staff Page.
     */

    public static function isTrialModView()
    {
        $setting = static::first();
        return $setting ? $setting->trial_moderator_view : 'false'; // Default to 'false'
    }

     /**
     * Update the visibility of the trial mod section.
     */
    public static function updateTrialModView($value)
    {
        $setting = static::first();
        if ($setting) {
            $setting->trial_moderator_view = $value;
            $setting->save();
        }
    }

    /**
     * Check if maintenance mode is enabled.
     */
    public static function isMaintenanceModeEnabled()
    {
        $setting = static::first();
        return $setting ? $setting->maintenance_mode : 'false'; // Default to 'false'
    }

    /**
     * Update maintenance mode.
     */
    public static function updateMaintenanceMode($value)
    {
        $setting = static::first();
        if ($setting) {
            $setting->maintenance_mode = $value;
            $setting->save();
        }
    }

    /**
     * Get the current theme.
     */
    public static function getTheme()
    {
        $setting = static::first();
        return $setting ? $setting->theme : 'default'; // default.css is the default theme
    }

    /**
     * Set the theme.
     */
    public static function setTheme($theme)
    {
        $setting = static::first();
        if ($setting) {
            $setting->theme = $theme;
            $setting->save();
        }
    }

    /**
     * Trigger NPM build for theme updates.
     */
    
    public static function buildTheme($theme)
{

    $theme = strtolower($theme);

    // Full path to npm and node 
    $nodePath = '/usr/bin/node';
    $npmPath = '/usr/bin/npm'; // Update with the output of `which npm`

    // Export PATH and run the build
    $command = "PATH=/usr/local/bin:/usr/bin:/bin THEME={$theme} {$npmPath} run production 2>&1";

    exec($command, $output, $returnVar);

    // Log the output and exit code for debugging
    logger()->info('Theme Build Output: ', $output);
    logger()->info('Theme Build Exit Code: ' . $returnVar);

    return $returnVar === 0; // Return true if the build succeeds
}

}
