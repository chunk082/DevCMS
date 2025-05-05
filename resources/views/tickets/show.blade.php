@extends('layouts.app')

@section('title', config('app.name') . ' - Tickets')

@section('content')
    <!-- Full-width Alert -->
    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning w-100" role="alert">
                <span>This request is currently in the <strong>{{ strtolower($ticket->status) }}</strong>. A staff member will check this out soon.</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row justify-content-center" style="margin-top: 15px;">
        <div class="col-lg-8 order-lg-1 order-2">
            <!-- Acknowledgment Alert -->
            <div class="alert alert-success">
                We have received your request, check back soon.
            </div>

            <!-- Ticket Initial Response -->
            <h5 class="silver">Ticket Initial Response</h5>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2 col-2">
                            <img src="https://imager.habboon.pw/?figure={{ $ticket->user->look ?? 'default-avatar' }}&size=m&direction=3&head_direction=3&gesture=sml&headonly=1" data-toggle="tooltip" data-placement="top" title="{{ $ticket->user->username ?? 'User' }}">
                        </div>
                        <div class="col-lg-10 col-10">
                            <p>
                                <a href="#">{{ $ticket->user->username ?? 'User' }}</a> 
                                <small class="float-right text-muted">{{ $ticket->created_at->diffForHumans() }}</small>
                            </p>
                            <p class="text mb-0">{!! nl2br(e($ticket->message)) !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Automatic Response -->
            <h5 class="silver">Automatic Response</h5>
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-2">
                            <img src="https://imager.habboon.pw?figure=hr-100.hd-180-1.ch-210-66.lg-270-82.sh-290-91&amp;size=m&amp;direction=3&amp;head_direction=3&amp;gesture=sml&amp;headonly=1" data-toggle="tooltip" data-placement="top" title="System">
                        </div>
                        <div class="col-lg-10 col-10">
                            <p><a href="#">System</a></p>
                            <p class="text">Your ticket has been escalated to Senior Moderation.</p>
                            <p class="text mb-0">We'll be in touch shortly.</p>
                        </div>
                    </div>
                </div>
            </div>

           <!-- Responses Section -->
<h5 class="silver">Responses</h5>

<!-- Display User and Staff Responses from respond_messages -->
@if (!empty($ticket->respond_messages))
    @foreach ($ticket->respond_messages as $response)
        <div class="card mb-2">
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- User Avatar -->
                    <div class="col-lg-2 col-2">
                        <img src="https://imager.habboon.pw/?figure={{ $response['username'] === Auth::user()->username ? Auth::user()->look : 'default_avatar' }}&size=m&direction=3&head_direction=3&gesture=sml&headonly=1" 
                             data-toggle="tooltip" 
                             data-placement="top" 
                             title="{{ $response['username'] }}">
                    </div>

                    <!-- Username and Message -->
                    <div class="col-lg-10 col-10">
                        <p>
                            <a href="#">{{ $response['username'] }}</a>
                            <small class="float-right text-muted">{{ \Carbon\Carbon::parse($response['timestamp'])->diffForHumans() }}</small>
                        </p>
                        <p class="text mb-0">{!! nl2br(e($response['message'])) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

            <!-- Write a Response Section -->
            @if ($ticket->status === 'Open')
                <h5 class="silver mt-4">Write a Response</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('support.ticket.response', $ticket->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="response_message" cols="5" rows="3" class="form-control" placeholder="Write your response here..." required></textarea>
                            </div>
                            <input type="hidden" name="type" value="response">
                            <div class="form-group mb-0 mt-3">
                                <button type="submit" class="btn btn-primary btn-block">Respond</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>

        <!-- Right Sidebar -->
        <div class="col-lg-4 order-lg-2 order-1">
        @if ($ticket->ticket_type === 'Proxy Whitelist')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Information</h5>
                <hr />
                <p style="margin-bottom: 0;">
                    <strong>Requested IP Address:</strong> 193.43.135.221<br/><br/>
                </p>
                <p class="mb-0">
                    <strong>ISP:</strong> PacketHub S.A.<br/>
                    <strong>City:</strong> Oswego<br/>
                    <strong>Country Code:</strong> US<br/>
                </p>
            </div>
        </div>
@endif
</div>
@endsection
