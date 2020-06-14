@section('content')

<section class="contact-us">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 text-center padding-t-150">
                        <div class="section-title">
                            <h2 class="text-capitalize h1">get in touch</h2>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-7">

                        <form action="{{route('contact.store')}}" method="POST">
                            @csrf
                            <div class="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" placeholder="Name">
                                       <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : ''}}</span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Email">
                                       <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : ''}}</span>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Message" value="{{ old('message') }}"></textarea>
                                    <span class="text-danger">{{ $errors->has('message') ? $errors->first('message') : ''}}</span>

                                </div>

                                <button type="submit" class="primary-btn cta-btn">Send Message</button>
                            </div>

                        </form>

                    </div>

                    <div class="col-lg-5">
                        <div class="contact-info">
                            <h3 class="text-capitalize">contact information :</h3>
                            <div class="info">

                                <div class="item">
                                    <i class="fa fa-phone"></i>
                                    <div class="details">
                                        <h6 class="text-uppercase">Phone:</h6>
                                        <span>{{$settings->phone}}</span>
                                    </div>
                                </div>

                                <div class="item">
                                    <i class="fa fa-envelope"></i>
                                    <div class="details">
                                        <h6 class="text-uppercase">email:</h6>
                                        <span>{{$settings->email}}</span>
                                    </div>
                                </div>

                                <div class="item">
                                    <i class="fa fa-map-marker"></i>
                                    <div class="details">
                                        <h6 class="text-uppercase">address:</h6>
                                        <span>{{$settings->loaction}}</span>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>



@endsection
@include('front-end.layouts.app')