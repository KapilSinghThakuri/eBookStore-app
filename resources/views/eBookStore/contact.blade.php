@extends('eBookStore.layout.main')

@section('main')

    <!-- Page Header Start -->
    <div class="container-fluid mb-5 " 
    style="background-image: url('{{ asset("eBookStore/img/cover3.jpg") }}');
    background-position: center; background-repeat: no-repeat; background-size: cover; height: 500px; width: 100%;">

        <div class="d-flex flex-column align-items-center justify-content-start" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mt-4 mb-3" 
            style="color: papayawhip;">Contact Us</h1>

        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" id="message" placeholder="Message"
                                required="required"
                                data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <h5 class="font-weight-semi-bold mb-3">Get In Touch</h5>
                <p>Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat clita ipsum justo sed.</p>
                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Store 1</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Kalanki, Kathmandu, Nepal</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@eBookStore.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+977 9864575047</p>
                </div>
                <div class="d-flex flex-column">
                    <h5 class="font-weight-semi-bold mb-3">Store 2</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>New City, Bharatpur, Chitwan</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@eBookStore.com</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+977 9864575047</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection