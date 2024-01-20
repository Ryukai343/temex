<header class="pt-5">
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('image/Title01.jpg') }}" class="title" alt="Title1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image/Title02.jpg') }}" class="title" alt="Title2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('image/Title03.jpg') }}" class="title" alt="Title3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        </button>
        <div class="position-absolute top-50 start-50 translate-middle z-1 title py-3 px-5 rounded-3" >
            <h1 class="title text-center ">@yield('header_text')</h1>
        </div>
    </div>
</header>
