<?php

namespace App\Http\Controllers\Housekeeping\Hotel;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use App\Services\RconService;

class PermissionsController extends Controller
{

    protected $rcon;

    // Inject RconService
    public function __construct(RconService $rcon)
    {
        $this->rcon = $rcon;

         DB::listen(function ($query) {
            \Log::info("SQL Query: " . $query->sql, $query->bindings);
        });
    }

    public function index($rankId = null)
    {
        if ($rankId) {
        $permissions = Permission::find($rankId);

        if (!$permissions) {
            // Return JSON error if rank not found
            return response()->json(['message' => 'Rank not found.'], 404);
        }

        // Return permissions as JSON
        return response()->json(['permissions' => $permissions]);
    }

        $ranks = Permission::all();
        $permissionGroups = [
            'Room Management' => [
                'cmd_roomalert', 'cmd_roomcredits', 'cmd_roomeffect', 'cmd_roommute',
                'cmd_reload_room', 'cmd_roompixels', 'cmd_roompoints', 'cmd_roomgift',
                'cmd_roomitem', 'cmd_roomeffect'
            ],
            'User Moderation' => [
                'cmd_ban', 'cmd_ip_ban', 'cmd_machine_ban', 'cmd_kickall', 'cmd_softkick',
                'cmd_unban', 'cmd_disconnect', 'cmd_mute', 'cmd_unmute', 'cmd_super_ban',
                'cmd_staffalert', 'cmd_staffonline', 'cmd_summon', 'cmd_summonrank'
            ],
            'Event Commands' => [
                'cmd_event', 'cmd_alert', 'cmd_masscredits', 'cmd_massduckets',
                'cmd_masspoints', 'cmd_massbadge', 'cmd_massgift', 'cmd_massduckets'
            ],
            'Chat and Interaction' => [
                'cmd_say', 'cmd_say_all', 'cmd_shout', 'cmd_shout_all',
                'cmd_word_quiz', 'cmd_wordquiz', 'cmd_pull', 'cmd_push',
                'cmd_gift', 'cmd_talk', 'cmd_pet_info', 'cmd_pickall'
            ],
            'Furniture and Room Tools' => [
                'cmd_empty', 'cmd_empty_bots', 'cmd_empty_pets', 'cmd_pickall',
                'cmd_setmax', 'cmd_reload_room', 'cmd_unload', 'cmd_roommute',
                'cmd_roomcredits', 'cmd_roomeffect', 'cmd_roomitem'
            ],
            'Administrative Commands' => [
                'cmd_update_achievements', 'cmd_update_bots', 'cmd_update_catalogue',
                'cmd_update_config', 'cmd_update_guildparts', 'cmd_update_hotel_view',
                'cmd_update_items', 'cmd_update_navigator', 'cmd_update_permissions',
                'cmd_update_pet_data', 'cmd_update_plugins', 'cmd_update_polls', 
                'cmd_update_texts', 'cmd_update_wordfilter', 'cmd_update_calendar',
                'cmd_update_youtube_playlists', 'cmd_add_youtube_playlist'
            ],
            'Special Permissions' => [
                'acc_supporttool', 'acc_helper_use_guide_tool', 'acc_helper_give_guide_tours',
                'acc_debug', 'acc_modtool_ticket_q', 'acc_modtool_user_logs',
                'acc_modtool_user_alert', 'acc_modtool_user_kick', 'acc_modtool_user_ban',
                'acc_nomute', 'acc_trade_anywhere', 'acc_helper_judge_chat_reviews',
                'acc_guildgate', 'acc_moverotate', 'acc_placefurni', 'acc_unlimited_bots',
                'acc_unlimited_pets', 'acc_hide_ip', 'acc_hide_mail', 'acc_not_mimiced',
                'acc_chat_no_flood', 'acc_staff_chat', 'acc_staff_pick', 'acc_enteranyroom'
            ],
            'Movement and Miscellaneous' => [
                'cmd_superpull', 'cmd_pull', 'cmd_push', 'cmd_transform',
                'cmd_diagonal', 'cmd_danceall', 'cmd_setrotation', 'cmd_sitdown',
                'cmd_hoverboard', 'cmd_warp', 'cmd_teleport',
                'cmd_moonwalk', 'cmd_mimic', 'cmd_fastwalk'
            ],
            'Economy Management' => [
                'cmd_credits', 'cmd_duckets', 'cmd_points', 'cmd_masscredits', 
                'cmd_massduckets', 'cmd_masspoints', 'cmd_give_rank', 'cmd_promote_offer',
                'auto_credits_amount', 'auto_pixels_amount', 'auto_gotw_amount', 'auto_points_amount'
            ],
            'Account Control' => [
                'cmd_ip_ban', 'cmd_machine_ban', 'cmd_disconnect', 'cmd_unban',
                'cmd_machine_ban', 'cmd_softkick', 'cmd_brb', 'cmd_nuke', 
                'cmd_explain', 'cmd_closedice', 'cmd_set', 'acc_closedice_room'
            ],
            'Miscellaneous Commands' => [
                'cmd_setmax', 'cmd_set_poll', 'cmd_setpublic', 'cmd_setspeed',
                'cmd_shutdown', 'cmd_update_catalogue', 'cmd_filterword', 'cmd_plugins',
                'cmd_massbadge', 'cmd_massgift', 'cmd_reload_room', 'cmd_disable_effects'
            ],
        ];

            logHousekeepingActivity("User: " . Auth::user()->username . " has viewed the permissions page.");
        return view('housekeeping.permissions.index', compact('ranks', 'permissionGroups'));
    }

   public function updatePermissions(Request $request, $rankId)
{
    \Log::info("Updating permissions for rank: $rankId");
    \Log::info("Request data: ", $request->all());

    try {
        // Find the permission record for the given rank
        $permission = Permission::findOrFail($rankId);
        $rankName = $permission->rank_name ?? 'Unknown';

        // Get valid columns for the `permissions` table
        $validKeys = array_keys($permission->getAttributes()); // Dynamically fetch table columns

        // Only keep keys that exist in the database table
        $data = array_intersect_key($request->all(), array_flip($validKeys));

        // Cast all values to strings to match ENUM('0', '1')
        foreach ($data as $key => $value) {
            $data[$key] = (string) $value;
        }

        // Update the permission record
        $permission->update($data);

        logHousekeepingActivity("User: " . Auth::user()->username . " Has updated permissions for Rank: {$rankId} ({$rankName})");

        // Optionally send an RCON command to notify the server
        \Log::info("Permissions updated for rank: $rankId");
        $this->sendUpdatePermissionsRcon();

        return response()->json(['message' => 'Permissions updated successfully.']);
    } catch (\Exception $e) {
        // Log the exact error message and stack trace
        \Log::error('Error updating permissions: ' . $e->getMessage());
        \Log::error($e->getTraceAsString());


        return response()->json(['error' => 'Failed to update permissions.'], 500);
    }
}

    // Send RCON command to the server to notify about permission changes
    protected function sendUpdatePermissionsRcon()
    {
        try {
            // Use the RconService to send the updatePermissions command
            $response = $this->rcon->sendPacket('update_permissions');

            if ($response) {
                return true; // Successfully sent
            }
        } catch (\Exception $e) {
            // Handle error, log exception, and show user-friendly message if necessary
            \Log::error('Failed to send RCON updatePermissions: ' . $e->getMessage());
        }

        return false;
    }
}