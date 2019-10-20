<footer class="footer-wrapper">
    <div class="container">
        <div class="row">
            <div class="Supporters-slider">
                <?php //echo $this->getLayout()->createBlock('core/template')->setTemplate('custom/sponsor-slider.phtml')->toHtml(); ?>
            </div>
            <div class="footer-links container">
                <div class="row">
                    <div class="Footer-Column col-lg-4 col-md-4 col-xs-12 col-sm-12">
                        <img class="footer-logo" src="{{URL::asset('/media/logo/University of West Attica.png')}}">
                    </div>
                    <div class="Footer-Column col-lg-4 col-md-4 col-xs-12 col-sm-12">
                        <div class="footer-block-content">
                            <li><a href="{{ config('app.blogurl') }}news" title="Our News">Our News</a></li>
                            <li><a href="{{ config('app.url') }}about-us" title="About Piraiot">About Piraiot</a></li>
                            <li><a href="{{ config('app.url') }}contacts" title="Contact us">Contact us</a></li>
                            <li><a href="{{ config('app.url') }}legal" title="Our News">Legal Terms &amp; Conditions</a>
                            </li>
                        </div>
                    </div>
                    <div class="Footer-Column col-lg-4  col-md-4 col-xs-12 col-sm-12">
                        <div class="newsletter-block">
                            <div class="footer-block-content">
                                <p>Follow us</p>
                                <p><a href="https://www.facebook.com/Piraiot/"><i
                                            class="fab fa-facebook-square"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="Footer-Column col-lg-4 col-md-4 col-xs-12 col-sm-12"></div>
                    <div class="Footer-Column col-lg-4 col-md-4 col-xs-12 col-sm-12">
                        <address class="copyright">© 2019 {{ config('app.name') }}. Designed & Developed By Protogerakis
                            Tom
                        </address>
                    </div>
                    <div class="Footer-Column col-lg-4 col-md-4 col-xs-12 col-sm-12"></div>
                </div>
            </div>
        </div>
    </div>

</footer>
