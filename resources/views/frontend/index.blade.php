@extends('frontend.layouts.app')

@section('content')

<section id="home" class="main-banner parallaxie" style="background: url('{{asset(@$settingdata->slider_image)}}')">
    <div class="heading">
        <h1>Welcome to {{@$settingdata->name}}</h1>
        <h3 class="cd-headline clip is-full-width">
            <span>Lorem Ipsum Dolor Sit Amet </span>
            <span class="cd-words-wrapper">

               
                @foreach ($categoriesview as $key => $cat)
                    <b class="{{ $key == 0 ? 'is-visible' : '' }}">{{ $cat->name }}</b>
                @endforeach
            </span>
            <div class="btn-ber">
                <a class="get_btn hvr-bounce-to-top" href="#">Get started</a>
                <a class="learn_btn hvr-bounce-to-top" href="#">Learn More</a>
            </div>
        </h3>
    </div>
</section>
{{-- End Section --}}



<div id="about" class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="message-box">
                    <h2>Welcome to {{@$settingdata->name}}</h2>
                    <p>
                        {!! @$settingdata->about_description !!}
                    </p>


                    <a href="#" class="sim-btn hvr-bounce-to-top"><span>Contact Us</span></a>
                </div><!-- end messagebox -->
            </div><!-- end col -->

            <div class="col-md-6">
                <div class="right-box-pro wow fadeIn">
                    <img src="{{asset(@$settingdata->about_image)}}" alt="" class="img-fluid img-rounded">
                </div><!-- end media -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div id="services" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3>{{@$servicessection->section_header}}</h3>
            <p>{{@$servicessection->section_message}}</p>
        </div><!-- end title -->

        <div class="row">

            @foreach ($services as $item)
            <div class="col-md-4">
                <div class="services-inner-box">
                    <div class="ser-icon">
                        <i class="{{$item->icon_tag}}"></i>
                    </div>
                    <h2>{{$item->name}}</h2>
                    <p>{!! Str::limit($item->description,120) !!}</p>
                </div>
            </div><!-- end col -->

            @endforeach

        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<div id="portfolio" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3>{{@$portfoliosection->section_header}}</h3>
            <p>{{@$portfoliosection->section_message}}</p>
        </div><!-- end title -->

        <div class="gallery-menu row">
            <div class="col-md-12">
                <div class="button-group filter-button-group text-center">
                    <button class="active" data-filter="*">All</button>

                    @foreach ($categories as $category)
                        <button data-filter=".gal_{{ @$category->id }}">{{ @$category->name }}</button>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="gallery-list row">
            @foreach ($servicimage as $item)
                <div class="col-md-4 col-sm-6 gallery-grid gal_{{ @$item->category_id }}">
                    <div class="gallery-single fix">
                        <img src="{{ asset(@$item->image) }}" class="img-fluid" alt="Image">
                        <div class="img-overlay">
                            <a href="{{ asset(@$item->image) }}" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="fa fa-picture-o"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
</div>


{{-- <div id="blog" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Blog</h3>
            <p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-4 col-sm-6 col-lg-4">
                <div class="post-box">
                    <div class="post-thumb">
                        <img src="uploads/blog-01.jpg" class="img-fluid" alt="post-img" />
                        <div class="date">
                            <span>06</span>
                            <span>Aug</span>
                        </div>
                    </div>
                    <div class="post-info">
                        <h4>Quisque auctor lectus interdum nisl accumsan venenatis.</h4>
                        <ul>
                            <li>by admin</li>
                            <li>Apr 21, 2018</li>
                            <li><a href="#"><b> Comments</b></a></li>
                        </ul>
                        <p>Etiam materials ut mollis tellus, vel posuere nulla. Etiam sit amet massa sodales aliquam at eget quam. Integer ultricies et magna quis.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-lg-4">
                <div class="post-box">
                    <div class="post-thumb">
                        <img src="uploads/blog-02.jpg" class="img-fluid" alt="post-img" />
                        <div class="date">
                            <span>06</span>
                            <span>Aug</span>
                        </div>
                    </div>
                    <div class="post-info">
                        <h4>Quisque auctor lectus interdum nisl accumsan venenatis.</h4>
                        <ul>
                            <li>by admin</li>
                            <li>Apr 21, 2018</li>
                            <li><a href="#"><b> Comments</b></a></li>
                        </ul>
                        <p>Etiam materials ut mollis tellus, vel posuere nulla. Etiam sit amet massa sodales aliquam at eget quam. Integer ultricies et magna quis.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-lg-4">
                <div class="post-box">
                    <div class="post-thumb">
                        <img src="uploads/blog-03.jpg" class="img-fluid" alt="post-img" />
                        <div class="date">
                            <span>06</span>
                            <span>Aug</span>
                        </div>
                    </div>
                    <div class="post-info">
                        <h4>Quisque auctor lectus interdum nisl accumsan venenatis.</h4>
                        <ul>
                            <li>by admin</li>
                            <li>Apr 21, 2018</li>
                            <li><a href="#"><b> Comments</b></a></li>
                        </ul>
                        <p>Etiam materials ut mollis tellus, vel posuere nulla. Etiam sit amet massa sodales aliquam at eget quam. Integer ultricies et magna quis.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div> --}}

{{-- <div id="team" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Our Team</h3>
            <p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="uploads/img-2.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="title">Kristiana</h3>
                        <span class="post">Web Designer</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-skype"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="uploads/img-4.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="title">Miranda joy</h3>
                        <span class="post">Web Designer</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-skype"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="uploads/img-1.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="title">Williamson</h3>
                        <span class="post">Web Developer</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-skype"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="our-team">
                    <div class="pic">
                        <img src="uploads/img-3.jpg">
                    </div>
                    <div class="team-content">
                        <h3 class="title">Steve Thomas</h3>
                        <span class="post">Web Developer</span>
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-skype"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- <div id="pricing" class="section lb">
    <div class="container">
        <div class="section-title text-center">
            <h3>Pricing</h3>
            <p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus.</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <svg x="0" y="0" viewBox="0 0 360 220">
                        <g>
                            <path fill="#28a9e2" d="M0.732,193.75c0,0,29.706,28.572,43.736-4.512c12.976-30.599,37.005-27.589,44.983-7.061
                                c8.09,20.815,22.83,41.034,48.324,27.781c21.875-11.372,46.499,4.066,49.155,5.591c6.242,3.586,28.729,7.626,38.246-14.243
                                s27.202-37.185,46.917-8.488c19.715,28.693,38.687,13.116,46.502,4.832c7.817-8.282,27.386-15.906,41.405,6.294V0H0.48
                                L0.732,193.75z"></path>
                        </g>
                        <text transform="matrix(1 0 0 1 69.7256 116.2686)" fill="#fff" font-size="78.4489">$10</text>
                        <text transform="matrix(0.9566 0 0 1 197.3096 83.9121)" fill="#fff" font-size="29.0829">.99</text>
                        <text transform="matrix(1 0 0 1 233.9629 115.5303)" fill="#fff" font-size="15.4128">/Month</text>
                    </svg>
                    <div class="pricing-content">
                        <h3 class="title">Standard</h3>
                        <ul class="pricing-content">
                            <li><b>50GB</b> Disk Space</li>
                            <li><b>50</b> Email Accounts</li>
                            <li><b>50GB</b> Bandwidth</li>
                            <li><b>10</b> Subdomains</li>
                            <li><b>15</b> Domains</li>
                        </ul>
                        <a href="#" class="sim-btn hvr-bounce-to-top pricingTable-signup">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="pricingTable blue">
                    <svg x="0" y="0" viewBox="0 0 360 220">
                        <g>
                            <path fill="#28a9e2" d="M0.732,193.75c0,0,29.706,28.572,43.736-4.512c12.976-30.599,37.005-27.589,44.983-7.061
                                c8.09,20.815,22.83,41.034,48.324,27.781c21.875-11.372,46.499,4.066,49.155,5.591c6.242,3.586,28.729,7.626,38.246-14.243
                                s27.202-37.185,46.917-8.488c19.715,28.693,38.687,13.116,46.502,4.832c7.817-8.282,27.386-15.906,41.405,6.294V0H0.48
                                L0.732,193.75z"></path>
                        </g>
                        <text transform="matrix(1 0 0 1 69.7256 116.2686)" fill="#fff" font-size="78.4489">$20</text>
                        <text transform="matrix(0.9566 0 0 1 197.3096 83.9121)" fill="#fff" font-size="29.0829">.99</text>
                        <text transform="matrix(1 0 0 1 233.9629 115.5303)" fill="#fff" font-size="15.4128">/Month</text>
                    </svg>
                    <div class="pricing-content">
                        <h3 class="title">Business</h3>
                        <ul class="pricing-content">
                            <li><b>60GB</b> Disk Space</li>
                            <li><b>60</b> Email Accounts</li>
                            <li><b>60GB</b> Bandwidth</li>
                            <li><b>15</b> Subdomains</li>
                            <li><b>20</b> Domains</li>
                        </ul>
                        <a href="#" class="sim-btn hvr-bounce-to-top pricingTable-signup">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="pricingTable red">
                    <svg x="0" y="0" viewBox="0 0 360 220">
                        <g>
                            <path fill="#28a9e2" d="M0.732,193.75c0,0,29.706,28.572,43.736-4.512c12.976-30.599,37.005-27.589,44.983-7.061
                                c8.09,20.815,22.83,41.034,48.324,27.781c21.875-11.372,46.499,4.066,49.155,5.591c6.242,3.586,28.729,7.626,38.246-14.243
                                s27.202-37.185,46.917-8.488c19.715,28.693,38.687,13.116,46.502,4.832c7.817-8.282,27.386-15.906,41.405,6.294V0H0.48
                                L0.732,193.75z"></path>
                        </g>
                        <text transform="matrix(1 0 0 1 69.7256 116.2686)" fill="#fff" font-size="78.4489">$30</text>
                        <text transform="matrix(0.9566 0 0 1 197.3096 83.9121)" fill="#fff" font-size="29.0829">.99</text>
                        <text transform="matrix(1 0 0 1 233.9629 115.5303)" fill="#fff" font-size="15.4128">/Month</text>
                    </svg>
                    <div class="pricing-content">
                        <h3 class="title">Premium</h3>
                        <ul class="pricing-content">
                            <li><b>70GB</b> Disk Space</li>
                            <li><b>70</b> Email Accounts</li>
                            <li><b>70GB</b> Bandwidth</li>
                            <li><b>20</b> Subdomains</li>
                            <li><b>25</b> Domains</li>
                        </ul>
                        <a href="#" class="sim-btn hvr-bounce-to-top pricingTable-signup">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div> --}}

<div id="contact" class="section db">
    <div class="container">
        <div class="section-title text-center">
            <h3>{{@$contactsection->section_header}}</h3>
            <p>{{@$contactsection->section_message}}</p>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-12">
                <div class="contact_form">
                    <div id="message"></div>
                    <form id="contactForm" action="{{route('message.store')}}"  method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="name" type="text" name="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="phone" type="tel" name="phone" placeholder="Your Phone" required="required" data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" name="message" placeholder="Your Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button id="sendMessageButton" class="sim-btn hvr-bounce-to-top" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->


@endsection
