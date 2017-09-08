@extends('layouts.siteMain')
@section('content')
<section class="banner-inner-wrap">
            <figure>
                {!!HTML::image(config('global.siteImages')."prod-dt-banner.jpg")!!}
            </figure>
            
            <div class="banner-info-wrap">
                <div class="container">
                    <div class="banner-info-in">
                        <h2>Contact Us</h2>
                      <!--   <div class="page-link">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
</section>
<section class="contact-wrap sec-pad">
        <div class="container">
            <div class="contact-sec">
                <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact-form">
                        <div class="form-top">
                            <ul>
                                <li><label><i class="fa fa-mobile" aria-hidden="true"></i> PHONE</label> <span>(33) 3566 8890</span></li>
                                <li><label><i class="fa fa-map-marker" aria-hidden="true"></i> ADDRESS</label> <p>1600 Pennsylvanla Ave NW, Washington,
DC 20500, United States Of America</p></li>
                                <li><label><i class="fa fa-envelope" aria-hidden="true"></i> EMAIL</label> <a href="#">a.banda@maiian.mx</a></li>
                            </ul>
                        </div>
                        
                        <div class="contact-form-btm">
                            <form action="#" method="post">
                                
                                <form-field>
                                    <part-field><input type="text" name="" value="" placeholder="First Name"></part-field>
                                    <part-field><input type="text" name="" value="" placeholder="Last Name"></part-field>
                                </form-field>
                                
                                <form-field>
                                    <input type="email" name="" value="" placeholder="Email">
                                </form-field>
                                
                                <form-field>
                                    <input type="tel" name="" value="" placeholder="Phone">
                                </form-field>
                                
                                 <form-field>
                                    <textarea placeholder="Comment">
                                     
                                    </textarea>
                                </form-field>
                                
                                <form-field>
                                    <input type="submit" name="" value="Submit">
                                </form-field>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="map-sec">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d230171.47334107943!2d-74.13739356145635!3d40.71307452548784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1503299833597" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection