<footer class="position-relative mt-5">
    @if($currentTheme === 'Christmas')
    <div class="christmas-trees"></div>
    @endif
        <div id="footer" class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 d-lg-block d-none">
                        <h4 class="mb-3">Online Users</h4>
                         @if($online_user_count > 0)
                            @foreach($onlineUsers as $user)
                                 <div class="avatar {{ $loop->iteration % 2 == 0 ? 'dark-gray' : 'light-gray' }}">
<img src="https://imager.habboon.pw/?figure={{ $user->look }}&direction=3&head_direction=3&gesture=sml&headonly=1" alt="{{ $user->username }}"  data-toggle="tooltip" data-placement="top" title="{{ $user->username }}" loading="lazy">
                                </div>
                            @endforeach
                            @else
                            <p>No users online.</p>
                            @endif
                    </div>
                    <div class="col-lg-3 col-6">
                        <h4 class="mb-3">Help</h4>
                        <ul class="links">
                            <li class="mb-1">
                                <a href="/help" aria-label="Help">
                                    <i class="fas fa-question" style="left: -5px;margin-top: 2px;"></i>
                                     Help
                                </a>
                            </li>
                            <li class="mb-1">
                                <a href="/help/tickets" aria-label="Tickets">
                                    <i class="fas fa-ticket-alt" style="left: -6px;margin-top: 2px;"></i>
                                     Tickets
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--- <div class="col-lg-3 col-6">
                        <h4 class="mb-3">Social</h4>
                        <ul class="social">
                            <li>
                                <a href="#" target="_blank" rel="noopener" aria-label="Facebook">
                                    <i class="fab fa-facebook-square"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" rel="noopener" aria-label="Twitter">
                                    <i class="fab fa-twitter-square"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" rel="noopener" aria-label="Snapchat">
                                    <i class="fab fa-snapchat-square"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" rel="noopener" aria-label="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank" rel="noopener" aria-label="Instagram">
                                    <i class="fab fa-discord"></i>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
        <div id="legal-footer">
            <p>{{ config('app.name')}} is a not for profit educational project.</p>
        </div>
    </footer>

    @if($currentTheme === 'Christmas')
    <div class="snowflakes" aria-hidden="true">
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
    </div>
@endif