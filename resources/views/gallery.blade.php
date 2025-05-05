@extends('layouts.app')

@section('title')
    {{ config('app.name') }} - Photo Gallery
@endsection

@section('content')
        <div id="notification-center"></div>
    <div class="row align-items-center mb-3" id="gallery-header">
        <div class="{{ Auth::check() ? 'col-lg-9 col-12' : 'col-12' }}">
            <div class="banner">
                <h4>Photo Gallery</h4>
            </div>
        </div>
        
        @auth
        <div class="col-lg-3 col-12">
            <div class="card mb-0" id="photo-stats">
                <div class="card-body p-3">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <div class="me">
                                <img src="https://imager.habboon.pw/?figure={{ Auth::user()->look ?? '' }}&direction=3&head_direction=3&gesture=sml&headonly=1" alt="Glee" loading="lazy">
                            </div>
                        </div>
                        <div class="col-8">
                            <p class="stats mb-0">
                                <i class="fas fa-camera-retro"></i> {{ $photoCount }} photo(s) <br/>
                                <i class="fas fa-heart"></i> {{ $likedCount }} liked <br/>
                                <i class="fas fa-thumbs-up"></i> {{ $totalLikes }} likes(s) <br/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endauth
    </div>
        
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="row" id="photos">
                    @foreach($photos as $photo)
    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
        <div class="card photo">
            <div class="card-body p-0">
                <div class="image" id="photo-{{ $photo->id }}" style="background-image: url('{{ $photo->url }}');">
                    <div class="actions">
                        <a href="#" class="like-photo" data-id="{{ $photo->id }}">
                            <i class="fas fa-heart {{ $photo->liked_by_user ? 'liked' : '' }}"></i>&nbsp;
                            <span class="like-count-{{ $photo->id }}">{{ $photo->likes_count }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-footer blue">
                <div class="row align-items-center">
                    <div class="col-3">
                        <div class="me">
                            <img src="https://imager.habboon.pw/?figure={{ $photo->look }}&direction=3&head_direction=3&gesture=sml&headonly=1" alt="{{ $photo->username }}" loading="lazy">
                        </div>
                    </div>

                    <div class="col-9">
                        <p>
                            <a href="#">{{ $photo->username }}</a>
                            <br/>
                            <span style="color: #fff;">{{ \Carbon\Carbon::parse($photo->timestamp)->format('d/m/y') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary load-photos">Load more photos</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script') <!-- Adding a dedicated section for scripts -->
     <script>
        $(document).ready(function() {
            let pageId = 2;

            $('.load-photos').on('click', function (e) {
                e.preventDefault();

                $.post('/gallery', {'page': pageId}, function (response) {
                    // update the page id
                    pageId++;

                    if (response.data.last_page < pageId) {
                        $('.load-photos').fadeOut();
                    }

                    response.data.forEach((item, index) => {
                        const card = generatePhotoCard(item, index);
                        $('#photos').append(card);
                    });

                    // notify the user
                    showNotification(pageId, 'New photos have been loaded!');

                    $('html, body').animate({scrollTop: '+=600px'}, 800);
                });
            });

            function generatePhotoCard(item, index) {
                const userId = 293530;
                const likedClass = item.likes.some(like => like.id === userId) ? 'liked' : '';
                const cardColor = (index % 3 === 0) ? 'blue' : (index % 2 === 0) ? 'aqua' : 'dark-blue';

                return `
                    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                        <div class="card photo">
                            <div class="card-body p-0">
                                <div class="image" id="photo-${item.id}" style="background-image: url(https://static.habboon.pw/camera/${item.static_name});">
                                    <div class="actions">
                                        <a href="#" class="like-photo" data-id="${item.id}">
                                            <i class="fas fa-heart ${likedClass}"></i>&nbsp;
                                            <span class="like-count-${item.id}">${item.likes.length}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer ${cardColor}">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <div class="me">
                                            <img src="https://imager.habboon.pw/?figure=${item.user.look}&direction=3&head_direction=3&gesture=sml&headonly=1" alt="${item.user.username}" loading="lazy">
                                        </div>
                                    </div>

                                    <div class="col-9">
                                        <p>
                                            <a href="#">${item.user.username}</a>
                                            <br/>
                                            <span style="color: #fff;">${moment.unix(item.timestamp).format('DD/MM/YYYY')}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
            }

            $(document).on('click', '.like-photo', function (e) {
    e.preventDefault();

    const photoId = $(this).data('id');
    const url = `/gallery/${photoId}/toggle-like`;

    $.post(url, {}, function (response) {
        if (response.status === 'liked') {
            $(`#photo-${photoId} .fas`).addClass('liked'); // Add the "liked" class
        } else {
            $(`#photo-${photoId} .fas`).removeClass('liked'); // Remove the "liked" class
        }

        // Update the like count immediately
        $(`.like-count-${photoId}`).text(response.likes_count);
    }).fail(function () {
        alert('You must be logged in to like a photo.');
    });
});

            function showNotification(id, message) {
                $('#notification-center').prepend('<div class="alert alert-' + id + '">' + message + '</div>');

                setTimeout(function () {
                    $('.alert-' + id).fadeOut();
                }, 3500);
            }
        });
    </script>
@endsection
