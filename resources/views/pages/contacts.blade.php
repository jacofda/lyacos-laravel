@extends('layouts.app')

@section('meta')
<title>Contact Information | {{config('app.name')}}</title>
<link rel="canonical" href="{{config('app.url')}}contact">

<style>
.main-text p{
  font-size:2rem;
}
.fs14{
  font-size:1.4rem ! important;
}
.fs15{
  font-size:1.5rem ! important;
}

.fs18{
  font-size:1.5rem ! important;
}
.mb-0{margin-bottom:0 ! important}
  .mb-1{margin-bottom:0.25rem ! important;}
.p-0{padding:0 ! important;}
.dark{color:#000;}
</style>
@stop

@section('content')

<section id="page-title" class="page-title-classic">
        <div class="container">
            <div class="breadcrumb">
            </div>
            <div class="page-title">
                <h1>Contact</h1>
                <h2>Submit a request</h2>
            </div>
        </div>
    </section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
                  <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
                  <li class="active">Contacts</li>
                </ul>
            </nav>
            <div id="menu-responsive-icon">
                <i class="fa fa-reorder"></i>
            </div>
        </div>
    </div>


    <section>
        <div class="container">
            <div class="row">


@if(session('message'))
    <div id="modalStripTop" class="modal-strip modal-auto-open modal-bottom" data-delay="1000">
        <div class="container text-center">
            <div class="text-center p-10">{{session('message')}}</div>
            <div class="text-center p-10"><button type="button" class="btn btn-rounded btn-light btn-outline btn-sm m-l-20 modal-close">Dismiss</button></div>
        </div>
    </div>
@endif



                <div class="col-md-7 main-text">
<br><br>

                        <p><b class="dark">DIMITRIS LYACOS</b> IS REPRESENTED BY <b  class="dark">EDELWEISS LITERARY AGENCY</b>. FOR ALL ENQUIRIES CONTACT:</p>
                        <p class="fs18">

                          ANDREA CARNEVALE<br>
                          <a href="mailto:andreacarnevale@agenziaedelweiss.com">andreacarnevale(at)agenziaedelweiss.com</a>
                        </p>
<br><br>
                </div>
                <div class="col-md-5">
<br><br>
                    <div class="widget mb-0" style="background:#f3f3f3; padding:12px 20px">
                        <h4 class="mb-1 fs14">EDELWEISS LITERARY AGENCY</h4>
                        <div class="post-thumbnail-list mb-0 p-0">
                            <div class="post-thumbnail-entry mb-0 p-0">
                                <div class="post-thumbnail-content mb-0">
                                    <a href="https://www.agenziaedelweiss.com" class="mb-0">agenziaedelweiss.com</a>
                                    <p class="mb-0">Viale A. Ciamarra 198, 00173 – Roma<p>
                                    <p style="margin-top:-2.4rem;" class="mb-0"><span class="post-category"><i class="fa fa-at"></i> info(at)agenziaedelweiss.com</span>
                                    <span class="post-category"><i class="fa fa-phone"></i> +39 06 7290 7291</span></p>
                                </div>
                            </div>

                        </div>
                    </div>
<br><br>
                </div>
            </div>
        </div>
    </section>





@stop
