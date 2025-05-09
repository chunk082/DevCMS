<?php

use App\Http\Middleware\RedirectIfUnauthenticated;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\Blacklisted;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------
| Home Controllers
|--------------------------
*/

use App\Http\Controllers\Home\BannedController;
use App\Http\Controllers\Home\UserController;


/*
|--------------------------
|Marketplace Controllers 
|--------------------------
*/

use App\Http\Controllers\Marketplace\MarketplaceController;

/*
|--------------------------
|Store Controllers 
|--------------------------
*/

use App\Http\Controllers\Store\CryptoController;
use App\Http\Controllers\Store\StoreController;

/*
|--------------------------
|Account Settings Controllers 
|--------------------------
*/

use App\Http\Controllers\Account\AccountSettingsController;
use App\Http\Controllers\Account\DiscordOAuthController;

/*
|--------------------------
|Community Controllers 
|--------------------------
*/

use App\Http\Controllers\Community\SupportController;
use App\Http\Controllers\Community\StaffApplicationController;
use App\Http\Controllers\Community\NewsController;
use App\Http\Controllers\Community\CommunityCameraWebController;
use App\Http\Controllers\Community\StaffController;
use App\Http\Controllers\Community\CommunityController;
use App\Http\Controllers\Community\LeaderBoardController;
use App\Http\Controllers\Community\TheWayController;

/*
|--------------------------
|Client Controllers 
|--------------------------
*/

use App\Http\Controllers\Client\ClientAuthenticateController;
use App\Http\Controllers\Client\NitroController;

/*
|--------------------------
|Housekeeping Controllers 
|--------------------------
*/

use App\Http\Controllers\Housekeeping\HousekeepingAuthController;
use App\Http\Controllers\Housekeeping\DashboardController;

use App\Http\Controllers\Housekeeping\Hotel\UsersController;
use App\Http\Controllers\Housekeeping\Hotel\PermissionsController;
use App\Http\Controllers\Housekeeping\Hotel\HotelAlertRCONController;
use App\Http\Controllers\Housekeeping\Hotel\RoomChatlogsController;
use App\Http\Controllers\Housekeeping\Hotel\PrivateChatlogsController;
use App\Http\Controllers\Housekeeping\Hotel\BannedUsersController;
use App\Http\Controllers\Housekeeping\Hotel\GiveBadgeController;
use App\Http\Controllers\Housekeeping\Hotel\WordFilterController;

use App\Http\Controllers\Housekeeping\Website\CameraWebController;
use App\Http\Controllers\Housekeeping\Website\ManageArticlesController;
use App\Http\Controllers\Housekeeping\Website\SiteSupportController;
use App\Http\Controllers\Housekeeping\Website\MaintenanceController;
use App\Http\Controllers\Housekeeping\Website\CreateArticlesController;
use App\Http\Controllers\Housekeeping\Website\ArticleCommentsController;
use App\Http\Controllers\Housekeeping\Website\BannersController;
use App\Http\Controllers\Housekeeping\Website\HousekeepingSiteSettingsController;

use App\Http\Controllers\Housekeeping\Admin\WebTabsController;
use App\Http\Controllers\Housekeeping\Admin\HousekeepingActivityLogController;
use App\Http\Controllers\Housekeeping\Admin\StaffApplicationsController;
use App\Http\Controllers\Housekeeping\Admin\PasswordRestoreController;
use App\Http\Controllers\Housekeeping\Admin\VPNBlacklistController;
use App\Http\Controllers\Housekeeping\Admin\ClientWhitelistController;
use App\Http\Controllers\Housekeeping\Admin\VoucherController;
use App\Http\Controllers\Housekeeping\Admin\ThemeController;
use App\Http\Controllers\Housekeeping\Admin\SyncBadgesController;

use App\Http\Controllers\Housekeeping\Catalogue\CatalogPagesController;
use App\Http\Controllers\Housekeeping\Catalogue\CatalogItemsController;
use App\Http\Controllers\Housekeeping\Catalogue\FurnitureController;

use App\Http\Controllers\Housekeeping\Store\StoreLogController;

use App\Http\Controllers\Housekeeping\Emulator\EmulatorSettingsController;
use App\Http\Controllers\Housekeeping\Emulator\EmulatorTextsController;

/*
|-------------------------
| Testing Aread
|-------------------------
*/


/*
|--------------------------
| Main Routes
|--------------------------
*/

Route::middleware(['blacklisted'])->group(function () {

/* Index Page */
Route::get('/', function () {
    return Auth::check() ? redirect('/me') : app(\App\Http\Controllers\Community\NewsController::class)->index();
})->name('home');
Route::get('/banned', BannedController::class, '__invoke')->name('banned');

/* Me Page */
Route::middleware([
    'auth:web',
    config('jetstream.auth_session'),
    'verified',
    'banned',
])->group(function () {
    Route::get('/me', [NewsController::class, 'dashboard'])->name('dashboard');
});

Route::get('/staff-application', [StaffApplicationController::class, 'create'])->name('staff.application');
Route::post('/staff-application', [StaffApplicationController::class, 'store'])->name('staff.application.submit');

/* Maintenance Page */

Route::get('/maintenance', function () {
    return view('maintenance');
})->name('maintenance');

/* Account Settings */

Route::middleware(['auth'])->group(function () {
    Route::get('/account/', [AccountSettingsController::class, 'showPreferences'])->name('account.account');
    
    Route::post('/account/', [AccountSettingsController::class, 'updatePreferences'])->name('account.account.update');

    Route::get('/account/email', [AccountSettingsController::class, 'showEmailForm'])->name('account.email');
    Route::post('/account/email', [AccountSettingsController::class, 'updateEmail'])->name('account.email.update');

    Route::get('/account/password', [AccountSettingsController::class, 'showUpdatePassword'])->name('account.password');

    Route::post('/account/password', [AccountSettingsController::class, 'updatePassword'])->name('account.password.update');

    Route::get('/account/discord', [DiscordOAuthController::class, 'show'])->name('account.discord');

    Route::get('/account/discord/authorize', [DiscordOAuthController::class, 'redirectToDiscord'])->name('account.discord.authorize');

    Route::post('/account/discord/unlink', [DiscordOAuthController::class, 'unlink'])->name('account.discord.unlink');
});

Route::middleware(['web'])->group(function () {
    Route::get('/account/discord/callback', [DiscordOAuthController::class, 'handleCallback'])->name('discord.callback');
});




/* Nitro Client */

// Nitro Client Route with Middleware
Route::get('/client', NitroController::class)
    ->middleware(['auth', 'reauthenticate', 'check.vpn']) 
    ->name('nitro-client');

// Show the re-authentication form (GET)
Route::get('/client/authenticate', [ClientAuthenticateController::class, 'showForm'])
    ->name('client.authenticate');

// Handle the re-authentication form (POST)
Route::post('/client/authenticate', [ClientAuthenticateController::class, 'handle'])
    ->name('client.authenticate.post');

// If client is blocked (optional)
Route::get('/client/blocked', function () {
    return view('client.blocked');
})->name('client.blocked');

// Authentication Route for Client Re-Authentication
Route::match(['get', 'post'], '/client/authenticate', [ClientAuthenticateController::class, 'handle'])
    ->name('client.authenticate');
    
/* Community Pages */

Route::get('/community', [CommunityController::class, 'index'])->name('community');
Route::get('/articles', [NewsController::class, 'AllArticles'])->name('AllArticles');
Route::get('/articles/{id}-{name?}', [NewsController::class, 'GetRecents'])->name('articles.show');
Route::post('/comments', [NewsController::class, 'storeComment'])->name('comments.store');
Route::get('/community/gotw', [LeaderBoardController::class, 'GOTW'])->name('gotw');
Route::get('/community/leaderboards', [LeaderBoardController::class, 'MostStuff'])->name('leaderboards');
Route::get('/community/online-players', [UserController::class, 'onlinePlayers'])->name('players');
Route::get('/community/staff', [StaffController::class, 'index'])->name('staff');
Route::get('/community/snowflake', [LeaderBoardController::class, 'showSnowFlakes'])->name('snowflake');

/* Photo Gallery */

Route::get('/gallery', [CommunityController::class, 'gallery'])->name('gallery');
Route::post('/gallery/{photoId}/toggle-like', [CommunityCameraWebController::class, 'toggleLike']);

/* Marketplace Pages */

Route::get('/marketplace', [MarketplaceController::class, 'showMarketplace'])->name('marketplace');

/* Store Page */

Route::get('/store', [CryptoController::class, 'wallet'])
    ->middleware(App\Http\Middleware\RedirectIfUnauthenticated::class)
    ->name('store');

Route::get('/store/payment/{id}', [CryptoController::class, 'show'])->name('payment.show');
Route::post('/store/payment', [CryptoController::class, 'store'])->name('payment.store');
Route::get('/store/payment/{id}/status', [CryptoController::class, 'status']);
Route::get('/store/payment/{payment}/check-address', [CryptoController::class, 'checkAddressDebug'])->name('payment.checkAddress');

Route::post('/store/purchase', [StoreController::class, 'purchase'])->name('store.purchase');
Route::post('/store/gift-vip', [StoreController::class, 'giftVIP'])->name('store.gift.vip');



/* Help Pages */
Route::get('/help', function () {
    return view('help');
})->name('help');

Route::get('/help/dev-way', [TheWayController::class, 'index'])->name('theway');

/* Support Ticket Routes */

Route::get('help/tickets', [SupportController::class, 'index'])->name('tickets.index'); // List all tickets
Route::get('help/tickets/create', [SupportController::class, 'create'])->name('tickets.create'); // Show ticket form
Route::post('help/tickets', [SupportController::class, 'store'])->name('tickets.store'); // Store a new ticket
Route::get('help/tickets/{id}', [SupportController::class, 'show'])->name('tickets.show');
Route::post('/support/tickets/{id}/respond', [SupportController::class, 'replyToTicket'])->name('support.ticket.response');

});

/*
|--------------------------
|Housekeeping Routes
|--------------------------
*/

Route::prefix('housekeeping')->group(function () {
    // Main housekeeping entry point
    Route::get('/', function () {
        if (Auth::guard('housekeeping')->check()) {
            // Redirect authenticated users to the dashboard
            return redirect()->route('housekeeping.dashboard');
        }

        // Serve the login form if not authenticated, without changing the URL to /login
        return app()->call('App\Http\Controllers\Housekeeping\HousekeepingAuthController@showLoginForm');
    })->name('housekeeping');

    // Explicit GET route for /housekeeping/login
    Route::get('login', [HousekeepingAuthController::class, 'showLoginForm'])->name('housekeeping.login');

    // POST route for handling login submissions
    Route::post('login', [HousekeepingAuthController::class, 'login'])->name('housekeeping.login.submit');

    // POST route for handling logout
    Route::post('logout', [HousekeepingAuthController::class, 'logout'])->name('housekeeping.logout');


    Route::middleware(['auth:housekeeping', 'rank:5', 'hknotification'])->group(function () {
        // Dashboard route with the name `housekeeping.dashboard`
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('housekeeping.dashboard');

        /* Hotel Column */ 

        Route::get('users', [UsersController::class, 'index'])->middleware('check.hk:view_users')->name('housekeeping.users.index');
        Route::get('users/search', [UsersController::class, 'search'])->middleware('check.hk:view_users')->name('housekeeping.users.search');
        Route::get('users/clones/{user}', [UsersController::class, 'clones'])->middleware('check.hk:view_users')->name('housekeeping.users.clones');
        Route::put('users/{id}', [UsersController::class, 'update'])->middleware('check.hk:edit_user')->name('housekeeping.users.update');
        Route::post('users/{user}/ban', [UsersController::class, 'banUser'])->middleware('check.hk:ban_users')->name('housekeeping.banUser');

        Route::get('/hotel/roomchatlogs', [RoomChatlogsController::class, 'getRoomChats'])->middleware('check.hk:manage_room_chatlogs')->name('housekeeping.hotel.roomchatlogs');
        Route::get('/roomchatlogs', [RoomChatlogsController::class, 'getRoomChats'])->middleware('check.hk:manage_room_chatlogs')->name('housekeeping.roomchatlogs');

        Route::get('/hotel/privatechatlogs', [PrivateChatlogsController::class, 'getPrivateChats'])->middleware('check.hk:manage_private_chatlogs')->name('housekeeping.hotel.privatechatlogs');
        Route::get('/privatechatlogs', [PrivateChatlogsController::class, 'getPrivateChats'])->middleware('check.hk:manage_private_chatlogs')->name('housekeeping.privatechatlogs');

        Route::get('/hotel/hotel-alert', [HotelAlertRCONController::class, 'show'])->name('housekeeping.hotel.alert');
        Route::post('/hotel/hotel-alert', [HotelAlertRCONController::class, 'sendHotelAlert'])->name('hotel.alert.send');

        Route::get('/hotel/badges', [GiveBadgeController::class, 'index'])->middleware('check.hk:view_badges')->name('housekeeping.hotel.badges');
        Route::post('/hotel/badges/give', [GiveBadgeController::class, 'giveBadge'])->middleware('check.hk:manage_badges')->name('housekeeping.hotel.givebadge');
        Route::delete('/hotel/badges/{id}', [GiveBadgeController::class, 'destroy'])->middleware('check.hk:manage_badges')->name('housekeeping.hotel.badges.destroy');

        Route::get('/hotel/wordfilters', [WordFilterController::class, 'index'])->name('housekeeping.hotel.wordfilter');
        Route::post('/wordfilter', [WordFilterController::class, 'store'])->name('housekeeping.hotel.wordfilter.store');
        Route::delete('/wordfilter/{key}', [WordFilterController::class, 'destroy'])->name('housekeeping.hotel.wordfilter.destroy');

        Route::get('/permissions/{rankId?}', [PermissionsController::class, 'index'])->middleware('check.hk:view_permissions')->name('housekeeping.permissions.index');
        Route::put('/permissions/{rankId}', [PermissionsController::class, 'updatePermissions'])->middleware('check.hk:manage_permissions')->name('housekeeping.permissions.update');


        /* Website Column */

        Route::get('/banners', [BannersController::class, 'index'])->middleware('check.hk:view_banners')->name('housekeeping.website.banners');
        Route::post('/banners', [BannersController::class, 'store'])->middleware('check.hk:create_banners')->name('housekeeping.website.store');
        Route::put('/banners/{id}', [BannersController::class, 'update'])->middleware('check.hk:update_banners')->name('housekeeping.website.update');
        Route::delete('/banners/{id}', [BannersController::class, 'destroy'])->middleware('check.hk:delete_banners')->name('housekeeping.website.destroy');

        Route::get('/article/comments', [ArticleCommentsController::class, 'index'])->name('housekeeping.articles.comments');
        Route::delete('/article/comments/{id}', [ArticleCommentsController::class, 'destroy'])->name('housekeeping.articles.comments.destroy');

        Route::get('/support-tickets', [SiteSupportController::class, 'index'])->middleware('check.hk:view_webtickets')->name('housekeeping.support.siteticket');
        Route::get('/support-tickets/{id}', [SiteSupportController::class, 'show'])->middleware('check.hk:view_webtickets')->name('housekeeping.support.show');
        Route::post('/support-tickets/handle', [SiteSupportController::class, 'handle'])->middleware('check.hk:reply_webticket')->name('housekeeping.support.handle');
        Route::post('/support/reply/{id}', [SiteSupportController::class, 'reply'])->middleware('check.hk:reply_webticket')->name('housekeeping.support.reply');

        Route::get('/users/bannedusers', [BannedUsersController::class, 'index'])->middleware('check.hk:ban_users')->name('housekeeping.users.bannedusers');
        Route::delete('/users/bannedusers/{id}', [BannedUsersController::class, 'destroy'])->middleware('check.hk:unban_user')->name('housekeeping.users.bannedusers.destroy');

        Route::get('/camera/cameraweb', [CameraWebController::class, 'index'])->name('housekeeping.camera.cameraweb');
        Route::delete('/camera/{id}', [CameraWebController::class, 'destroy'])->name('housekeeping.camera.destroy');

        //Route::put('/banners/{id}', [BannersController::class, 'update'])->name('housekeeping.banners.update');

        /* Calatalog Settings */ 

        Route::prefix('catalog-pages')->name('housekeeping.catalog.pages.')->group(function () {
            Route::get('/', [CatalogPagesController::class, 'index'])->name('index'); // List pages
            Route::post('/store', [CatalogPagesController::class, 'store'])->name('store'); // Store new page
            Route::put('/update/{id}', [CatalogPagesController::class, 'update'])->name('update'); // Update catalog page
            Route::delete('/delete/{id}', [CatalogPagesController::class, 'destroy'])->name('delete'); // Delete catalog page
        });

        Route::prefix('catalog-items')->name('housekeeping.catalog.items.')->group(function () {
            Route::get('/', [CatalogItemsController::class, 'index'])->name('index'); // List items
            Route::post('/store', [CatalogItemsController::class, 'store'])->name('store'); // Store new item
            Route::put('/update/{id}', [CatalogItemsController::class, 'update'])->name('update'); // Update item
            Route::delete('/delete/{id}', [CatalogItemsController::class, 'destroy'])->name('delete'); // Delete item
        });

        Route::prefix('furniture')->name('housekeeping.catalog.furniture.')->group(function () {
            Route::get('/', [FurnitureController::class, 'index'])->name('index'); // List items
            Route::get('/edit/{id}', [FurnitureController::class, 'edit'])->name('edit'); // <-- Add this
            Route::post('/store', [FurnitureController::class, 'store'])->name('store'); // Store new item
            Route::put('/update/{id}', [FurnitureController::class, 'update'])->name('update'); // Update item
            Route::delete('/delete/{id}', [FurnitureController::class, 'destroy'])->name('delete'); // Delete item
        });


        /* Store Section */
        Route::prefix('store')->name('housekeeping.store.')->group(function () {
            Route::get('/transactions', [StoreLogController::class, 'index'])->name('transactions');
            Route::get('/wallet', [StoreLogController::class, 'wallet'])->name('wallet');
        });


        /* Emulator Settings */

         Route::prefix('emulator')->name('housekeeping.emulator.settings.')->group(function () {
            Route::get('/', [EmulatorSettingsController::class, 'index'])->name('index'); 
            Route::put('/update/{key}', [EmulatorSettingsController::class, 'update'])->name('update');
            
        });

        Route::prefix('emulator')->name('housekeeping.emulator.texts.')->group(function () {
            Route::get('/texts', [EmulatorTextsController::class, 'index'])->name('index'); 
            Route::put('/texts/update/{key}', [EmulatorTextsController::class, 'update'])->name('update');
        });

        /* Admin Section Rank 7 ONLY */

        Route::get('/admin/activitylogs', [HousekeepingActivityLogController::class, 'index'])->name('housekeeping.admin.activitylogs');

        Route::get('/website/maintenance', [MaintenanceController::class, 'index'])->name('housekeeping.admin.maintenance');
        Route::post('/website/maintenance', [MaintenanceController::class, 'updateMaintenance'])->name('housekeeping.admin.maintenance.update');

        Route::get('admin/staffapps', [StaffApplicationsController::class, 'index'])->name('housekeeping.admin.staffapps');
        Route::post('admin/staffapps/promote', [StaffApplicationsController::class, 'promote'])->name('housekeeping.admin.staffapps.promote');
        Route::delete('admin/staffapps/reject', [StaffApplicationsController::class, 'reject'])->name('housekeeping.admin.staffapps.reject');

        Route::get('/password-restore', [PasswordRestoreController::class, 'showRestoreForm'])->name('housekeeping.admin.passwordrestore');
        Route::post('/password-restore', [PasswordRestoreController::class, 'restore'])->name('housekeeping.admin.passwordrestore.post');

        Route::get('/voucher', [VoucherController::class, 'index'])->name('housekeeping.admin.voucher');
        Route::post('/voucher/store', [VoucherController::class, 'store'])->name('housekeeping.admin.voucher.post');
        Route::delete('delete/{voucher}', [VoucherController::class, 'destroy'])->name('housekeeping.admin.voucher.delete');
        
        Route::get('/blacklist', [VPNBlacklistController::class, 'index'])->name('housekeeping.admin.blacklist');
        Route::post('/blacklist/store', [VPNBlacklistController::class, 'store'])->name('housekeeping.admin.blacklist.store');
        Route::delete('/blacklist/delete/{id}', [VPNBlacklistController::class, 'destroy'])->name('housekeeping.admin.blacklist.destroy');
        
        Route::get('/whitelist', [ClientWhitelistController::class, 'index'])->name('housekeeping.admin.whitelist');
        Route::post('/whitelist/store', [ClientWhitelistController::class, 'store'])->name('housekeeping.admin.whitelist.store');
        Route::delete('/whitelist/delete/{id}', [ClientWhitelistController::class, 'destroy'])->name('housekeeping.whitelist.destroy');

        Route::get('/theme', [ThemeController::class, 'index'])->name('housekeeping.admin.theme');
        Route::post('/theme', [ThemeController::class, 'update'])->name('housekeeping.admin.theme.update');

        Route::get('/admin/webtabs', [WebTabsController::class, 'index'])->name('housekeeping.admin.webtabs');
        Route::post('/admin/webtabs', [WebTabsController::class, 'updateWebTabs'])->name('housekeeping.admin.webtabs.update');

        Route::get('/admin/syncbadges', [SyncBadgesController::class, 'index'])->name('housekeeping.admin.syncbadges');
        Route::post('/admin/syncbadges/run', [SyncBadgesController::class, 'runSyncHabboSync'])->name('housekeeping.admin.syncbadges.run');
        Route::post('/admin/syncbadges/run', [SyncBadgesController::class, 'runSyncHabboonSync'])->name('housekeeping.admin.syncbadges.run');



        Route::resource('articles', CreateArticlesController::class)->names([
            'create' => 'housekeeping.articles.create',
            'store' => 'housekeeping.articles.store',
            'show' => 'housekeeping.articles.show',
        ]);

        Route::resource('articles', ManageArticlesController::class)
        ->only(['index', 'edit', 'update', 'destroy'])
        ->names([
            'index' => 'housekeeping.articles.manage',
            'edit' => 'housekeeping.articles.edit',
            'update' => 'housekeeping.articles.update',
            'destroy' => 'housekeeping.articles.destroy',
        ]);
    });
});