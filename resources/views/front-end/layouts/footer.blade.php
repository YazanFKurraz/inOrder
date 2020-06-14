<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>
                            {{$settings->about_us}}
                        </p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>
                            {{$settings->loaction}}
                        </a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>
                            {{$settings->phone}}
                            </a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>
                            {{$settings->email}}
                            </a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                            @foreach($categories->take(5) as $category)
                        <ul class="footer-links">
                            <li><a href="{{route('product.category',['id'=>$category->id])}}">{{$category->name}}</a></li><br>
                        </ul>
                        @endforeach
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="{{route('contact.create')}}">Contact Us</a></li>
                            <li><a href="#">return Orders</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                        @guest
                        <li><a href="{{route('userLogin')}}"><i class="fa fa-user-o"></i>login</a></li>
                        <li><a href="{{route('userRegiater')}}"><i class="fa fa-user-o"></i>Register</a></li>
                            @else
                        <li><a>
                            {{ Auth::user()->name }}
                            </a></li>
                        @endguest
                            <li><a href="{{route('cart.index')}}">View Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://darkcodeswebsite.000webhostapp.com/" target="_blank">DarkCode</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
                <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->


<!-- jQuery Plugins -->
<script src="{{asset('website/js/jquery.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.=js')}}"></script>
<script src="{{asset('website/js/slick.min.js')}}"></script>
<script src="{{asset('website/js/nouislider.min.js')}}"></script>
<script src="{{asset('website/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('website/js/main.js')}}"></script>
<!-- <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
       @include('sweet::alert')
