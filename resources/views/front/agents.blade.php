@extends('front.layout.main.main')

@section('content')	
<div id="main-wrapper">

        <!-- ============================ Page Title Start================================== -->
        <div class="page-title pt-md-5" style="background-color:#324B4B">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        
                        <h2 class="ipt-title text-white">All Agents</h2>
                        <span class="ipn-subtitle">Lists of our all agents</span>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================ Page Title End ================================== -->
        
        <!-- ============================ Agent List Start ================================== -->
        <section>
        
            <div class="container">
            
                <!-- row Start -->
                <!-- <div class="row">
                
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Search agents">
                                <i class="ti-search"></i>
                            </div>
                        </div>	
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <a href="#" class="btn search-btn">Find Agents</a>
                    </div>
                    
                </div> -->
                <!-- /row -->
                
                <div class="row">
                @for ($i = 0; $i < 10; $i++)
                    <!-- Single Agent -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="agents-grid">
                            
                            <div class="jb-bookmark"><a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Bookmark"><i class="ti-bookmark"></i></a></div>
                            <div class="agent-call"><a href="#"><i class="lni-phone-handset"></i></a></div>
                            <div class="agents-grid-wrap">
                                
                                <div class="fr-grid-thumb">
                                    <a href="javascript:void(0)">
                                        <div class="overall-rate">4.4</div>
                                        <img src="{{asset('assets/site/img/default_user.svg')}}" class="img-fluid mx-auto" alt="" />
                                    </a>
                                </div>
                                <div class="fr-grid-deatil">
                                    <h5 class="fr-can-name"><a href="#">Colin H. Renda</a></h5>
                                    <span class="fr-position"><i class="lni-map-marker"></i>3599 Huntz Lane</span>
                                    <div class="fr-can-rating">
                                        <i class="ti-star filled"></i>
                                        <i class="ti-star filled"></i>
                                        <i class="ti-star filled"></i>
                                        <i class="ti-star filled"></i>
                                        <i class="ti-star"></i>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="fr-grid-info">
                                <ul>
                                    <li>NAME<span>AGENT NAME</span></li>
                                    <li>Email<span>colin@gmail.com</span></li>
                                    <li>Phone<span>91 123 456 7859</span></li>
                                </ul>
                            </div>
                            
                            <div class="fr-grid-footer">
                                <a href="#" class="btn btn-outline-warning full-width">CONTACT AGENT<i class="ti-arrow-right ml-1"></i></a>
                            </div>
                            
                        </div>
                    </div>
                    @endfor
                    
                </div>
            </div>
                    
        </section>
        <!-- ============================ Agent List End ================================== -->
        
        
        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
        

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    
@endsection

@section('custom_js')

@endsection
