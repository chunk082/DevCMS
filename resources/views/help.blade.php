@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Help Center
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="silver">{{ config('app.name') }} Way</h5>
                        <img src="{{ asset('img/help/safetytips1_n.png') }}" alt class="float-right" loading="lazy">
                        <p>Welcome to the {{ config('app.name') }} Hotel, where fun and excitement are always around the corner! 🎉 To ensure that everyone has the best experience possible, we've created The {{ config('app.name') }} Way - our special set of rules that keeps our community safe and friendly. 🌈</p>
                        <p>It's important to know that these rules and regulations can change without notice. As a member of our awesome {{ config('app.name') }} community, you agree to follow these terms and conditions. 😊 If you don't, there may be sanctions applied to your account.</p>
                        <p>But don't worry! If you have any questions or concerns about The {{ config('app.name') }} Way, our friendly Hotel Staff are always here to help. 💬 Now, go ahead and click the button below to read The {{ config('app.name') }} Way and join us in creating a fantastic environment for all! 🚀</p>
                        <div class="mt-3">
                            <a href="{{ url('/help/dev-way') }}" class="btn btn-primary">
    The {{ config('app.name') }} Way &raquo;
</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="silver">Ban Appeals</h5>
                        <img src="{{ asset('img/help/safetytips5_n.png') }}" class="float-right" alt loading="lazy">
                        <p> If you think you've been unfairly banned from our super cool hotel, no worries - we're here to help! 🌟 All you need to do is submit a ticket 🎟️ and let us know what happened.</p>
                        <p class="mb-0">We'll check it out and give you a fair chance to return to the awesome world of {{ config('app.name') }}! 🕺💃 So go ahead, share your side of the story, and let's get you back in on the fun! 😄</p>
                        <div class="mt-3">
                            <a href="/help/tickets/create" class="btn btn-primary">Submit a ban appeal &raquo;</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="silver">Password Recovery</h5>
                        <img src="{{ asset('img/help/habboway_5a.png') }}" class="float-right" alt loading="lazy">
                        <p>Forgotten your password and been locked out of your account? 🤔 No need to worry, we've got a solution for you! 🎉 If you can't remember your password, you can submit a ticket to request a password change. To do this, simply provide us with the following information:</p>
                        <ul>
                            <li>Username (leave blank if forgotten):</li>
                            <li>Email (leave blank if forgotten):</li>
                            <li>IP address (leave blank if forgotten):</li>
                            <li>Any other details</li>
                        </ul>
                        <p>We'll do our best to help you get back into your account as soon as possible! 🚀</p>
                        <p>But wait, there's more! 🌟 If you know the email linked to your account, you can use the super handy automated forgotten password tool on our homepage!</p>
                        <p class="mb-0">Just follow the steps, and you'll be back in the wonderful world of {{ config('app.name') }} in no time! 😄 So go ahead and choose the option that works best for you, and let's get back to having fun together! 🎊</p>
                        <div class="mt-3">
                            <a href="/help/tickets/create" class="btn btn-primary">Submit a ticket &raquo;</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="silver">VPN Whitelisting</h5>
                        <img src="{{ asset('img/help/habboway_2b.png') }}" class="float-right" alt loading="lazy">
                        <p>We know that sometimes you might need to use a VPN or proxy connection while visiting our fantastic hotel! 🏨 But since we want to keep our community safe and free from toxicity, we block these connections by default. 🛡️</p>
                        <p>However, we understand that there are exceptions, and we're here to help! 🌟 If you find yourself in one of these situations, you can request VPN whitelisting:</p>
                        <ol>
                            <li>You're not using a VPN but still got flagged somehow. 🚩</li>
                            <li>You're at school or university and need a VPN to access {{ config('app.name') }}. 🏫</li>
                            <li>You're on public connections that might be flagged as a VPN. 📱</li>
                        </ol>
                        <p>Please note that if using a VPN is optional for you, we usually deny the request. This is just to make sure we maintain a positive and friendly environment for all our users! 😄</p>
                        <p class="mb-0">To request VPN whitelisting, simply submit a ticket with an explanation of your situation, and we'll do our best to help you out! Together, let's keep the {{ config('app.name') }} Hotel experience amazing for everyone! 🎉</p>
                        <div class="mt-3">
                            <a href="/help/tickets/create" class="btn btn-primary">Submit whitelist request &raquo;</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="silver">Scam Reports</h5>
                        <img src="{{ asset('img/help/safetytips7_n.png') }}" class="float-right" alt loading="lazy">
                        <p>Hey {{ config('app.name') }} buddies! 🎉 We know that sometimes, unfortunately, users might try to scam others out of their coins, diamonds, or furniture. 😢 But don't worry, we've got your back! We don't tolerate this kind of behavior, and we're here to help you report it. 🌟</p>
                        <p>Have you been scammed? 😨</p>
                        <p>If so, we're here to assist! Just follow the template below and include it in a ticket under the 'Scam Reports' option:</p>
                        <ul>
                            <li>Scammed by:</li>
                            <li>Date of Scam:</li>
                            <li>Items Scammed:</li>
                            <li>Evidence (if available):</li>
                        </ul>
                        <p class="mb-0">Remember, it's important to be honest and true to yourself! 🌈 Nobody likes a trickster, and stealing won't make you rich - it makes you a criminal. 😔 By reporting scams, we can work together to keep the {{ config('app.name') }} Hotel a fun, safe, and amazing place for everyone! 🎊</p>
                        <div class="mt-3">
                            <a href="/help/tickets/create" class="btn btn-primary">Submit a scam report &raquo;</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="silver">Room Ads</h5>
                        <img src="{{asset('img/help/safetytips6_n.png') }}" alt class="float-right" loading="lazy">
                        <p>Hey there, {{ config('app.name') }} friends! 🌟 Did you know that you can make your room even cooler by displaying images in it? 😮 That's right! With room background furniture, you can embed images directly into your room on the hotel! 🖼️</p>
                        <p>However, by default, you won't have the furniture access or permission to do this. But no worries, you can apply for it! 🎉 All you need to do is submit a ticket and let us know why you'd like to have these awesome room ad rights. 📝</p>
                        <p class="mb-0">Once you've got the permission, you'll be able to customize your room and make it truly one-of-a-kind! 🌈 So go ahead and tell us why you need those rights, and let's take your room to the next level together! 🚀</p>
                        <div class="mt-3">
                            <a href="/help/tickets/create" class="btn btn-primary">Submit a ticket &raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="silver">GOTW Rules</h5>
                        <p>GOTW, or Gamer of the Week is all about celebrating the top events players from the past seven days. 🏆 For every hotel alerted event you win, you'll earn both GOTW points and diamonds! 💎 So put your gaming skills to the test and aim for the top!</p>
                        <p>Curious about the rules? No problem! Click the link below & you'll find all the information you need to become a GOTW pro.</p>
                        <p class="mb-0">Get ready to shine as the next Gamer of the Week! 🚀</p>
                        <div class="mt-3">
                            <a href="/help/gotw-rules" class="btn btn-primary">GOTW Rules &raquo;</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="silver">Something else?</h5>
                        <p>We know that sometimes you might have questions, concerns, or just need a little help that doesn't fit into any specific category. No worries, we've got you covered! 🌟</p>
                        <p>For anything else that you need assistance with, simply select the 'Other' option when submitting a ticket. 📝</p>
                        <p class="mb-0">Our friendly and helpful Hotel Staff will be more than happy to get in touch and provide the support you need. 🤗 So go ahead, reach out to us for any reason, big or small, and let's make your {{ config('app.name') }} experience the best it can be! 🚀</p>
                        <div class="mt-3">
                            <a href="/help/tickets/create" class="btn btn-primary">Submit a ticket &raquo;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   @endsection