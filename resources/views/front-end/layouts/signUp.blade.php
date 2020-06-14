<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                @guest
                <p>Sign Up for the <strong>InOrder</strong></p>
                <a class="primary-btn cta-btn" 
                href="#" style="margin-bottom:10px;">Sign Up now</a>
                @else
                <strong>InOrder Social Links</strong></p>

                @endguest	
                    <ul class="newsletter-follow">
                        <li>
                            <a href="{{$settings->facebook_url}}" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="{{$settings->twitter_url}}" target="_blank"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="{{$settings->instagram_url}}" target="_blank"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>