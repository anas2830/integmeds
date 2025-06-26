@props(['images' => [], 'videos' => []])


{{-- === Image Thumbnails === --}}
@if(!empty($images) && count($images) > 0)
    @foreach($images as $image)
        <div>
            <img class="img-fluid"
                    src="{{ asset($image->image_url) }}"
                    alt="product image thumbnail" />
        </div>
    @endforeach
@endif

{{-- === YouTube Video Thumbnails with Icon === --}}
@if(!empty($videos) && count($videos) > 0)
    @foreach($videos as $video)
        @php
            // $youtubeId = \Illuminate\Support\Str::afterLast($video->video_url, '/embed/');
            $thumbUrl = "https://images.vexels.com/media/users/3/137425/isolated/preview/f2ea1ded4d037633f687ee389a571086-youtube-icon-logo.png?w=360";
        @endphp
        <div style="position: relative;">
            <img class="img-fluid" src="{{ $thumbUrl }}" alt="video thumbnail" />
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#ffffffcc" viewBox="0 0 24 24">
                    <path d="M10 16.5l6-4.5-6-4.5v9z"/>
                    <path d="M24 0v24H0V0h24z" fill="none"/>
                </svg>
            </div>
        </div>
    @endforeach
@endif

