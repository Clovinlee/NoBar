<!-- footer-area -->
<footer>
    <div class="footer-top-wrap">
        <div class="container">
            <div class="footer-menu-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="footer-logo">
                            <a href="index.html"><img class="imageLogo" src="{{ asset('assets/img/logo/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="footer-menu">
                            <nav>
                                <ul class="navigation">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ url('/nowplaying') }}">Movie</a></li>
                                    <li><a href="{{ url('/membership') }}">Membership</a></li>
                                    <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                                </ul>
                                <div class="footer-search">
                                    <form action="#">
                                        <input type="text" placeholder="Find Favorite Movie">
                                        <button><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-quick-link-wrap">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="quick-link-list">
                            <ul>
                                <li><a href="{{url('/faq')}}">FAQ</a></li>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2021. All Rights Reserved By <a href="index.html">NoBar</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="payment-method-img text-center text-md-right">
                        <img src="{{ asset('assets/img/images/card_img.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->