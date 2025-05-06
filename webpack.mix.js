const mix = require('laravel-mix');
const fs = require('fs');
const path = require('path');

// Set the active theme dynamically
const activeTheme = process.env.THEME || 'default'; // Default to 'default' theme

// Only copy the selected theme's CSS to `app.css` before building
mix.before(() => {
    const themePath = path.resolve(__dirname, 'resources/assets/web/css', `${activeTheme}.css`);
    const destinationPath = path.resolve('resources/assets/web/css/app.css');

    if (fs.existsSync(themePath)) {
        fs.copyFileSync(themePath, destinationPath);
        console.log(`Using theme: ${activeTheme}`);
    } else {
        throw new Error(`Theme file not found: ${themePath}`);
    }
});

// Compile CSS only for the app.css (theme-specific)
mix.css('resources/assets/web/css/app.css', 'public/assets/web/')
   .version();

// Reduce processing time. (Web Only)
mix.copy('resources/assets/web/js/vendor.js', 'public/assets/web/vendor.js')
   .copy('resources/assets/web/js/app.js', 'public/assets/web/app.js')
   .js('resources/assets/web/js/manifest.js', 'public/assets/web/')
   .version();

// Handle dynamic cache-busting
mix.setPublicPath('public');
