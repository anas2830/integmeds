@props(['images' => [], 'videos' => []])

{{-- === Show Images First === --}}
@if(!empty($images) && count($images) > 0)
    @foreach($images as $image)
        <figure class="border-radius-10">
            <img class="img-fluid" src="{{ asset($image->image_url) }}" alt="product image">
        </figure>
    @endforeach
@endif


{{-- === Show YouTube Videos After Images === --}}
@if(!empty($videos) && count($videos) > 0)
    @foreach($videos as $video)
        @php
            $embedUrl = convertYoutubeToEmbed($video->video_url) ?? '';
        @endphp

        @if($embedUrl)
            <figure class="border-radius-10">
                <iframe width="100%" height="500"
                    src="{{ $embedUrl }}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>
                </iframe>
            </figure>
        @else
            <p>Invalid video URL</p>
        @endif
    @endforeach
@endif