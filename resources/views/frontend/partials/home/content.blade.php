
<!-- Loading Overlay Start -->
<div class="loading-overlay">
    <div class="spinner">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- Loading Overlay End -->


<!-- Header Start -->
<header id="header">
    <nav class="navbar affix-top">
        <div id="navbar_content">
            <div class="navbar-header">
                <a class="navbar-brand custom-primary" href="javascript:void(0)">
                    <img src="{{ $data['logo'] }}" alt="logo"> Burger House
                </a>
                <a href="#cd-nav" class="cd-nav-trigger burger-menu-icon">
                    <span><i class="fa fa-bars" aria-hidden="true"></i></span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <div class="navbar-right">
                    <div class="call-delivery">
                        <img src="assets-2/img/delivery-icon.png" alt="" class="call-delivery-icon">
                        <span class="call-delivery-number custom-primary">Call for Delivery
                            <a href="tel:{{ $data['call_delivery_number'] }}" target="_blank">
                                {{ $data['call_delivery_number'] }}
                            </a>
                            </span>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a class="page-scroll" href="#header">Home</a></li>
                        <li><a class="page-scroll" href="#menu">Menu</a></li>
                        <li><a class="page-scroll" href="#events">Events</a></li>
                        <li><a class="page-scroll" href="#reservation">Reservation</a></li>
                        <li><a class="page-scroll" href="#gallery">Gallery</a></li>
                        <li><a class="page-scroll" href="#contact">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- Header End -->

<!-- Banner Start -->
<div id="banner" class="banner">
    <div class="banner-slider">
        @foreach (($data['banner_title'] ?? []) as $index => $title)
            <div class="banner-slider__item">
                <div class="banner-slider__text custom-primary">
                    <h3 class="banner-subtitle" data-aos="fade-up">
                        {{ $data['banner_subtitle'][$index] ?? 'Your Subtitle Here' }}
                    </h3>
                    <h1 class="banner-title" data-aos="fade-up" data-aos-duration="1800">
                        {{ $title }} <span>Burger</span>
                    </h1>
                </div>
                <div class="banner-slider__media">
                    <img src="{{ asset($data['banner_image'][$index] ?? 'assets-2/img/banner/625x490.jpg') }}"
                         alt=""
                         style="height: 425px; width: 690px; object-fit: cover;"
                         class="banner-image"
                         data-aos="zoom-in">
                    @if (!empty($data['banner_price_off'][$index]))
                        <div class="banner-badge" data-aos="fade-right">
                            <div class="banner-price">
                                {{ $data['banner_price_off'][$index] }}% <span>Off</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Banner End -->

<!-- Banner Grid Start -->
<div class="banner-grid">

    <!-- First Row: 1 Big + 2 Small -->
    <div class="banner-grid-row">
        <div class="banner-grid-column" data-aos="fade-up">
            <a href="" title="" class="banner-grid-big">
                <div class="banner-grid-text">
                    <h4 class="banner-grid-subject">{{ $data['banner_grid_subject'][0] ?? '' }}</h4>
                    <h3 class="banner-grid-title">{{ $data['banner_grid_title'][0] ?? '' }}</h3>
                </div>
                <img src="{{ asset($data['banner_grid_image'][0] ?? 'src/assets/img/banner-grid/555x390.jpg') }}" style="height: 390px; width: 555px; object-fit: cover;" alt="" class="banner-grid-image">
            </a>
        </div>

        <div class="banner-grid-column">
            <a href="" title="" class="banner-grid-small" data-aos="fade-up">
                <div class="banner-grid-text">
                    <h4 class="banner-grid-subject">{{ $data['banner_grid_subject'][1] ?? '' }}</h4>
                    <h3 class="banner-grid-title">{{ $data['banner_grid_title'][1] ?? '' }}</h3>
                </div>
                <img src="{{ asset($data['banner_grid_image'][1] ?? 'src/assets/img/banner-grid/555x180.jpg') }}" style="height: 180px; width: 555px; object-fit: cover;" alt="" class="banner-grid-image">
            </a>

            <a href="" title="" class="banner-grid-small" data-aos="fade-up">
                <div class="banner-grid-text">
                    <h4 class="banner-grid-subject">{{ $data['banner_grid_subject'][2] ?? '' }}</h4>
                    <h3 class="banner-grid-title">{{ $data['banner_grid_title'][2] ?? '' }}</h3>
                </div>
                <img src="{{ asset($data['banner_grid_image'][2] ?? 'src/assets/img/banner-grid/555x180.jpg') }}" style="height: 180px; width: 555px; object-fit: cover;" alt="" class="banner-grid-image">
            </a>
        </div>
    </div>

    <!-- Remaining banners in 2-column layout -->
    @php
        $remainingSubjects = array_slice($data['banner_grid_subject'] ?? [], 3);
        $remainingTitles = array_slice($data['banner_grid_title'] ?? [], 3);
        $remainingImages = array_slice($data['banner_grid_image'] ?? [], 3);
    @endphp

    @for ($i = 0; $i < count($remainingSubjects); $i += 2)
        <div class="banner-grid-row">
            <div class="banner-grid-column" data-aos="fade-up">
                <a href="" title="" class="banner-grid-big">
                    <div class="banner-grid-text">
                        <h4 class="banner-grid-subject">{{ $remainingSubjects[$i] ?? '' }}</h4>
                        <h3 class="banner-grid-title">{{ $remainingTitles[$i] ?? '' }}</h3>
                    </div>
                    <img src="{{ asset($remainingImages[$i] ?? 'src/assets/img/banner-grid/555x180.jpg') }}" style="height: 180px; width: 555px; object-fit: cover;" alt="" class="banner-grid-image">
                </a>
            </div>

            @if (isset($remainingSubjects[$i + 1]))
                <div class="banner-grid-column" data-aos="fade-up">
                    <a href="" title="" class="banner-grid-big">
                        <div class="banner-grid-text">
                            <h4 class="banner-grid-subject">{{ $remainingSubjects[$i + 1] }}</h4>
                            <h3 class="banner-grid-title">{{ $remainingTitles[$i + 1] }}</h3>
                        </div>
                        <img src="{{ asset($remainingImages[$i + 1] ?? 'src/assets/img/banner-grid/555x180.jpg') }}" style="height: 180px; width: 555px; object-fit: cover;" alt="" class="banner-grid-image">
                    </a>
                </div>
            @endif
        </div>
    @endfor

</div>
<!-- Banner Grid End -->


<!-- Menu Slider Start -->
<section class="section" id="menu">
    <div class="section-header text-center">
        <h5 class="section-label label" data-aos="fade-up">{{ $data['section_label'][0] ?? '' }}</h5>
        <h2 class="section-title" data-aos="fade-up">{{ $data['section_title'][0] ?? '' }}</h2>
        <p class="section-subtitle text-center" data-aos="fade-up">
            {{ $data['section_subtitle'][0] ?? '' }}
        </p>
    </div>


    <div id="menu-slider" class="menu-slider" data-aos="fade-up">
        @foreach ($data['menu_slider_item_title'] as $index => $title)
            <div class="menu-slider-item">
                <div class="menu-slider-item-image">
                    <img src="{{ asset($data['menu_slider_item_image'][$index] ?? 'assets-2/img/menu-slider/410x270.jpg') }}" style="height: 270px; width: 410px; object-fit: cover;" alt="" class="menu-slider-item-burger">
                </div>
                <div class="menu-slider-item-desc">
                    <h4 class="menu-slider-item-title">{{ $title }}</h4>
                    <p class="menu-slider-item-subtitle">{{ $data['menu_slider_item_subtitle'][$index] }}</p>
                    <a href="single-product" class="button">Order Now</a>
                </div>
            </div>
        @endforeach


    </div>
</section>
<!-- Menu Slider End -->

<!-- Events Start -->
<section class="section" id="events">
    <div class="events">
        <div class="events-wrapper">
            @foreach ($data['events_item_image'] as $index => $events_item_image)
            <div class="events-item">
                <div class="section-header">
                    <h5 class="events-section-label" data-aos="fade-up">{{ $data['events_section_label'][$index] }}</h5>
                    <h2 class="events-section-title" data-aos="fade-up">{{ $data['events_section_title'][$index] }}</h2>
                    <p class="events-section-subtitle" data-aos="fade-up">
                        {{ $data['events_section_subtitle'][$index] }}
                    </p>
                </div>
                <img src="{{ asset($events_item_image ?? 'assets-2/img/events/575x445.jpg') }}" style="height: 575px; width: 445px; object-fit: cover;" alt="" class="events-item-image" data-aos="zoom-in">
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Events End -->

<!-- Gallery Start -->
<div class="container section" id="gallery" data-aos="fade-up">
    <div class="title-block" data-aos="fade-up">
        <h1 class="section-title text-center">Gallery</h1>
    </div>
    <div id="photo_gallery" class="list1" data-aos="fade-up">
        <div class="row">
            @foreach ($data['photo_gallery'] as $index => $photo_gallery)
            <div class="col-md-4 col-lg-3 item">
                <a href="{{ asset($photo_gallery ?? 'assets-2/img/gallery/placeholder-1280x853.png') }}" class="block fancybox" data-fancybox-group="fancybox">
                    <div class="content">
                        <img src="{{ asset($photo_gallery ?? 'assets-2/img/gallery/placeholder-285x277.png') }}" style="height: 285px; width: 277px; object-fit: cover;" alt="sample">
                        <div class="zoom">
                            <span class="zoom_icon"><i class="fa fa-search-plus"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Gallery End -->

<!-- Reservation Start -->
<section class="section" id="reservation">
    <div class="reservation">
        <div class="reservation-left">
            <img src="assets-2/img/reservation/burger.png" alt="" data-aos="fade-up">
            <img src="assets-2/img/reservation/bottle.png" alt="" data-aos="fade-up">
        </div>
        <div class="reservation-center">
            <div class="section-header text-center">
                <h5 class="section-label" data-aos="fade-up">Reservation</h5>
                <h2 class="section-title" data-aos="fade-up">Book Your Table</h2>
            </div>
            <form class="reservation-form" method="post">
                <div class="row">
                    <div class="col-sm-6" data-aos="fade-up">
                        <div class="form-group form_pos">
                            <input type="text" name="name" required="" placeholder="Name" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6" data-aos="fade-up">
                        <div class="form-group form_pos">
                            <input type="email" name="email" required="" placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6" data-aos="fade-up">
                        <div class="form-group form_pos">
                            <input type="text" name="date" required="" placeholder="Date" class="form-control" id="reserv_date">
                        </div>
                    </div>
                    <div class="col-sm-6" data-aos="fade-up">
                        <div class="form-group form_pos">
                            <input type="text" name="time" required="" placeholder="Time" class="form-control" id="reserv_time">
                        </div>
                    </div>
                    <div class="col-sm-6" data-aos="fade-up">
                        <div class="form-group form_pos">
                            <input type="number" name="people" required="" placeholder="People" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6" data-aos="fade-up">
                        <button type="submit" class="button">Find a table</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="reservation-right">
            <img src="assets-2/img/reservation/burger-food.png" alt="" data-aos="fade-up">
        </div>
    </div>
</section>
<!-- Reservation End -->
