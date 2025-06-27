@if(!empty($images) && count($images) > 0)
    @foreach($images as $image)
        <div class="swiper-slide">
            <img class="img-fluid" src="{{asset($image->image_url)}}" alt="Product" title="Product"/>
        </div>
    @endforeach
@endif