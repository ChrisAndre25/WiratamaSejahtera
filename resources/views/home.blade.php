<x-app title="PT. Wiratama Sejahtera">
    <x-slot name="navbar"></x-slot>
        <div class="masthead" id="home">
            <div class="overlay"></div>
            <div class="container h-100 px-5">
                <div class="row d-flex justify-content-center align-items-center pt-5 mt-5 mb-3">
                    <div class="col-lg-12 col-md-12 py-2 text-center pt-5" style="overflow:hidden;">
                        <div class="wow fadeInUp animated" style="visibility: visible;">
                            <h1 class="masthead-title text-white pb-2 mt-5" style="overflow:hidden;">Welcome to WIS Refrigeration</h1>
                            <h3 class="font-segoe font-weight-light text-white mt-2 pb-2" style="overflow:hidden;">A company specialized in selling cold storage machine products</h3>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 justify-content-center align-items-center">
                    <div class="col-lg-6 bg-white border shadow-sm py-2" style="overflow:hidden;">
                        <div class="wow fadeInUp animated delay-1s" style="visibility: visible;">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-10 col-md-10 pr-lg-0">
                                    <form action="{{ action('ProductController@search') }}" method="POST">
                                        @csrf
                                    <input id="search" name="search" class="border-0 form-control rounded-0" placeholder="Search for products or brands">
                                </div>
                                <div class="col-lg-2 col-md-2 pl-lg-0">
                                    <button type="submit" class="btn btn-sm btn-blue btn-block py-2 px-2 rounded-0"><i
                                            class="fas fa-search"></i></button>
                                        </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="fluid-container bg-gray py-5" id="about-us">
            <div class="container px-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col-9 col-md-7 col-lg-4 text-center order-lg-2 pb-5 pb-lg-0">
                        <div class="wow fadeInUp animated delay-2s" style="visibility: visible;">
                            <img src="{{ asset('images/wisLogo.png') }}" class="w-100">
                        </div>
                    </div>
                    <div class="col-lg-8 order-lg-1 pr-lg-5 text-justify" style="overflow:hidden;">
                        <div class="wow fadeInUp animated delay-3s" style="visibility: visible;">
                            <p class="text-red main-title mb-2">Who We Are</p>
                            <p class="mr-2 h3 font-segoe font-weight-light">PT. Wiratama Sejahtera (WIS) is a company specialized in selling cold storage machine products and also taking the role as a main importer in Indonesia.</p>
                            <p class="mr-2">It is established in 2011 and located in West Jakarta. We provide many kinds of cold storage machine products, such as refrigerants, compressors, evaporators, and many more. We are looking forward for your order soon!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fluid-container bg-gray py-5" id="brands">
            <div class="container px-5">
                <div class="row d-flex justify-content-center text-center">
                    <div class="wow fadeInUp animated delay-3s" style="visibility: visible;">
                    <h1 class="text-red mb-2 font-weight-bold">Brands</h1>
                    <p class="mr-2 h4 font-weight-light">As for brands, we are currently importing 4 brand products which are trusted and can be used worldwide.</p>
                    </div>
                </div>
                <div class="d-flex row justify-content-center">
                    <div class="col-lg-2 col-md-2 d-flex justify-content-center" style="overflow:hidden;">
                        <div class="wow fadeInLeft animated delay-4s" style="visibility: visible;">
                            <img src="/storage/img/Bitzer.png" style="height:100px">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 d-flex justify-content-center" style="overflow:hidden;">
                        <div class="wow fadeInLeft animated delay-4s" style="visibility: visible;">
                        <img src="/storage/img/Henry Technologies.png" style="height:100px">
                        </div> 
                    </div>
                    <div class="col-lg-2 col-md-2 d-flex justify-content-center" style="overflow:hidden;">
                        <div class="wow fadeInLeft animated delay-4s" style="visibility: visible;">
                        <img src="/storage/img/Muller.png" style="height:100px">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 d-flex justify-content-center" style="overflow:hidden;">
                        <div class="wow fadeInLeft animated delay-4s" style="visibility: visible;">
                        <img src="/storage/img/Ziehl-Abegg.png" style="height:100px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fluid-container py-5" id="contact-us">
            <div class="container px-5">
                <div class="row d-flex justify-content-center text-center">
                    <div class="wow fadeIn animated delay-4s" style="visibility: visible;">
                        <h1 class="text-red mb-3 font-weight-bold">Contact Us</h1>
                    </div>
                </div>
                <div class="embed-responsive embed-responsive-21by9 mb-3">
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.886626376124!2d106.81476481536247!3d-6.145926599999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f767363174a9%3A0x6913cfc85df42c35!2sPT.%20Wiratama%20Sejahtera!5e0!3m2!1sen!2sid!4v1600020466528!5m2!1sen!2sid" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-4 col-md-4">
                        <div class="wow fadeIn animated delay-5s" style="visibility: visible;">
                        <h4 class="font-weight-light">Email</h4>
                        <div class="row d-flex justify-content-start align-items-center pl-2">
                            <button class="btn btn-blue" disabled><i class="fas fa-envelope fa-2x"></i></button> 
                            <span class="pl-1 h5 text-muted">wis.refrigeration.02@gmail.com</span>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="wow fadeIn animated delay-5s" style="visibility: visible;">
                        <h4 class="font-weight-light">Whatsapp</h4>
                        <div class="row d-flex justify-content-start align-items-center pl-2">
                            <button class="btn btn-blue" disabled><i class="fab fa-whatsapp fa-2x"></i></button> 
                            <span class="pl-1 h5 text-muted">0877-3796-2053</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="wow fadeIn animated delay-5s" style="visibility: visible;">
                        <h4 class="font-weight-light">Telephone</h4>
                        <div class="row d-flex justify-content-start align-items-center pl-2">
                            <button class="btn btn-blue" disabled><i class="fas fa-phone-alt fa-2x"></i></button> 
                            <span class="pl-1 h5 text-muted">021-6220-1455</span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <x-slot name="footer"></x-slot>
</x-app>

