<!-- hero-area-start -->
<section class="hero-area">
    <div class="row">
        <div class="col-lg-12">
            <div class="hero-slider">
                @foreach ($sliders as $slider)    
                    <div class="items">
                        <img class="img-fluid" src="{{asset($slider->slider_image)}}" alt="{{ $slider->title }}" title="{{ $slider->title }}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- hero-area-end -->
