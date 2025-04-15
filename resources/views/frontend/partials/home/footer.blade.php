<!-- Footer Start -->
<footer id="contact">
    <div class="footer-top" data-aos="fade-up">
        <div class="footer-logo">
            <img src="{{ $data['footer_logo'] ?? 'assets-2/img/logo-footer.png'}}" alt="">
            <span>Burger House</span>
        </div>
    </div>
    <div class="footer-middle">
        <p class="footer-desc" data-aos="fade-up">{{ $data['footer_desc'] ?? ''}}</p>
        <div class="footer-contact">
            <div class="footer-contact-item" data-aos="fade-up">
                <img src="assets-2/img/icons/location.svg" alt="" class="footer-contact-icon">
                <a class="footer-contact-text" data-fancybox="" data-src="#map-popup" onclick="$.fancybox.close()" href="javascript:;">{{ $data['location'] ?? ''}}</a>
            </div>
            <div class="footer-contact-item" data-aos="fade-up">
                <img src="assets-2/img/icons/email.svg" alt="" class="footer-contact-icon">
                <a href="mailto:{{ $data['email'] ?? ''}}" class="footer-contact-text">{{ $data['email'] ?? ''}}</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom" data-aos="fade-up">
        <p class="footer-copyright">{{ $data['footer_desc'] ?? ''}}</p>
        <div class="footer-social">
            <a href="{{ $data['instagram'] ?? ''}}" class="instagram"><i class="fab fa-instagram"></i></a>
            <a href="{{ $data['facebook'] ?? ''}}" class="facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="{{ $data['twitter'] ?? ''}}" class="twitter"><i class="fab fa-twitter"></i></a>
            <a href="{{ $data['whatsapp'] ?? ''}}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>
</footer>
<!-- Footer End -->

<!-- Scroll Up Start -->
<div class="scroll-up">
    <div class="scroll-up__icon"><i class="fa fa-arrow-up"></i></div>
</div>
<!-- Scroll Up End -->

<!-- Yandex Map Start -->
<div class="popup popup--sign" id="map-popup" style="display: none;">
    <div class="popup-header">
        <h2 class="popup-title upper">Büyükdere Cad., 22A, Istanbul, Turkey</h2>
    </div>
    <div class="popup-main">
        <div id="map"></div>
    </div>
</div>
<!-- Yandex Map End -->

<!-- Mobile Menu Start -->
<nav class="cd-nav-container burger-menu" id="cd-nav">
    <div class="rmenu_header">
        <div class="rmenu_header-left">
            <a href="/" class="rmenu_logo" title="">
                <img src="{{ $data['logo'] }}" alt="logo">
            </a>
        </div>
        <div class="rmenu_header-right">
            <div class="call-delivery custom-primary">
                <span class="call-delivery-label">Call for Delivery</span>
                <a href="#"
                   class="call-delivery-number" target="_blank">{{ $data['call_delivery_number'] ?? ''}}</a>
            </div>
            <div class="cd-close-nav">
                <img src="assets-2/img/icons/close.svg" alt="close">
            </div>
        </div>
    </div>
    <ul class="rmenu_list">
        <li><a class="page-scroll" href="#header">Home</a></li>
        <li><a class="page-scroll" href="#menu">Menu</a></li>
        <li><a class="page-scroll" href="#events">Events</a></li>
        <li><a class="page-scroll" href="#reservation">Reservation</a></li>
        <li><a class="page-scroll" href="#gallery">Gallery</a></li>
        <li><a class="page-scroll" href="#contact">Contact Us</a></li>
    </ul>
</nav>

<div class="cd-overlay"></div><!-- /.cd-overlay -->
<!-- Mobile Menu End -->
