<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $table = 'website_settings';

    // Use 'key' as primary, string type
    protected $primaryKey = 'key';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['key', 'value'];

    /**
     * Get a setting by key.
     */
    public static function get(string $key, $default = null): ?string
    {
        return static::where('key', $key)->value('value') ?? $default;
    }

    /**
     * Set or update a setting.
     */
    public static function set(string $key, $value): void
    {
        static::updateOrInsert(
            ['key' => $key],
            ['value' => $value]
        );
    }

    /**
     * Check if maintenance mode is enabled.
     */
    public static function isMaintenanceModeEnabled(): bool
    {
        return static::get('maintenance_mode', 'false') === 'true';
    }

    /**
     * Update maintenance mode.
     */
    public static function updateMaintenanceMode(string $value): void
    {
        static::set('maintenance_mode', $value);
    }

    /**
     * Check if the staff application tab is visible.
     */
    public static function isStaffApplicationTabVisible(): bool
    {
        return static::get('staff_application_tab_visible', 'false') === 'true';
    }

    /**
     * Update the visibility of the staff application tab.
     */
    public static function updateStaffApplicationTab(string $value): void
    {
        static::set('staff_application_tab_visible', $value);
    }

    /**
     * Check if Trial Moderator view is visible.
     */
    public static function isTrialModView(): bool
    {
        return static::get('trial_moderator_view', 'false') === 'true';
    }

    /**
     * Update Trial Moderator view setting.
     */
    public static function updateTrialModView(string $value): void
    {
        static::set('trial_moderator_view', $value);
    }

    /**
     * Get the current theme.
     */
    public static function getTheme(): string
    {
        return static::get('theme', 'default');
    }

    /**
     * Update the current theme.
     */
    public static function setTheme(string $theme): void
    {
        static::set('theme', $theme);
    }

    /**
     * Optional: Trigger NPM build for the selected theme.
     */
    public static function buildTheme(string $theme): bool
    {
        $theme = strtolower($theme);

        // Adjust these if npm/node is installed elsewhere
        $nodePath = '/usr/bin/node';
        $npmPath = '/usr/bin/npm';

        $command = "PATH=/usr/local/bin:/usr/bin:/bin THEME={$theme} {$npmPath} run production 2>&1";

        exec($command, $output, $returnVar);

        logger()->info('Theme Build Output: ', $output);
        logger()->info('Theme Build Exit Code: ' . $returnVar);

        return $returnVar === 0;
    }
}
