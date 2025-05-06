@extends('housekeeping.app')

@section('title')
    Housekeeping - Sync Badges
@endsection

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">🔁 Sync Habbo Badges</h2>

    <h6>This is a powerful tool.. This will download all badges from Habbo/Habboon into the approciate directly to be used in-game. This will also reflect on the CMS on community page under the latest badges section.... Abuse of this tool will not be tolerated. If caught abusing the tool will result in displanary action (demotion).</h6><br />

    @if(session('consoleOutput'))
        <div class="mb-4">
            <h5>🖥️ Console Output:</h5>
            <div style="background-color: #000; color: #0f0; padding: 15px; font-family: monospace; white-space: pre-wrap; max-height: 500px; overflow-y: scroll; border-radius: 5px;">
                {{ session('consoleOutput') }}
            </div>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex gap-2 mt-3">
    <form method="POST" action="{{ route('housekeeping.admin.syncbadges.run') }}">
        @csrf
        <input type="hidden" name="source" value="habbo">
        <button type="submit" class="btn btn-primary">
            🔄 Sync Habbo Badges
        </button>
    </form>

    <form method="POST" action="{{ route('housekeeping.admin.syncbadges.run') }}">
        @csrf
        <input type="hidden" name="source" value="habboon">
        <button type="submit" class="btn btn-primary">
            🔄 Sync Habboon Badges
        </button>
    </form>
</div>
</div>
@endsection
