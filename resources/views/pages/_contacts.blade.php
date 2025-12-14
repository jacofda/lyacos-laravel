@extends('layouts.app')

@section('meta')
<title>Contact Information | {{config('app.name')}}</title>
<link rel="canonical" href="{{config('app.url')}}contact">
{!! RecaptchaV3::initJs() !!}
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



                <div class="col-md-8">
                    <div class="m-t-30">

                        {!! Form::open(['url' => url('lyacosnet'), 'role' => 'form', 'name' => 'lyacosnet','class' => 'widget-contact-form', 'id' => 'lyacosnet']) !!}
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="name">Name</label>
                                    <input type="text" aria-required="true" name="name" class="form-control required name" placeholder="Your name" value="{{ old('name') }}">

								    @if ($errors->has('name'))
								        <span class="error">
								            <strong class="color-danger">{{ $errors->first('name') }}</strong>
								        </span>
								    @endif

                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="email">Email</label>
                                    <input type="text" aria-required="true" name="email" class="form-control required email" id="autocomplete-email" placeholder="Your email" value="{{ old('email') }}">

								    @if ($errors->has('email'))
								        <span class="error">
								            <strong class="color-danger">{{ $errors->first('email') }}</strong>
								        </span>
								    @endif

                                </div>
                            </div>

							<div class="form-group">
								<label for="emailTo">Send to</label>
								<select name="emailTo" class="form-control">
									<option value="">Choose recipient</option>
									<option value="lyacos(at)lyacos.net">Dimitris Lyacos - Author</option>
									{{-- <option value="shorshasullivan(at)yahoo.com">Shorsha Sullivan - English Translator</option> --}}
									<option value="michel.volkovitch(at)wanadoo.fr">Michel Volkovitch - French Translator</option>
									<option value="nmwanek(at)gruene-eule.at">Nina-Maria Wanek - German Translator</option>
                                    <option value="tatiamtvarelidze(at)gmail.com">Tatia Mtvarelidze - Georgian Translator</option>
									<option value="info(at)shoestring-press.com">Shoestring Press - UK Publisher</option>
									<option value="post(at)verlagshaus-berlin.de">Verlagshaus Berlin - German Publisher</option>
                                    <option value="lemieldesanges(at)gmail.com">Le Miel des Anges - French Publisher</option>
									<option value="giacomo.gasperini(at)gmail.com">Info - Website Admin</option>
								</select>

							</div>

                            <div class="form-group">
                                <label for="description">Message</label>
                                <textarea type="text" name="description" rows="5" class="form-control required" placeholder="Write here ...">{{ old('description') }}</textarea>

							    @if ($errors->has('description'))
							        <span class="error">
							            <strong class="color-danger">The Message must not be empty</strong>
							        </span>
							    @endif

                            </div>

                            {!! RecaptchaV3::field('lyacosnet') !!}
                            <button class="btn btn-default" type="submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>

                        {!! Form::close() !!}

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget">
                        <h4>Main Contact</h4>
                        <div class="post-thumbnail-list">
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    Dimitris Lyacos Email<br>
                                    <span class="post-category"><i class="fa fa-at"></i> lyacos(at)yahoo.co.uk</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <h4>Other contacts</h4>
                        <div class="post-thumbnail-list">
                            {{-- <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    Shorsha Sullivan - English Translator<br>
                                    <span class="post-category"><i class="fa fa-at"></i> shorshasullivan(at)yahoo.com</span>
                                </div>
                            </div> --}}
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    Michel Volkovitch - French Translator<br>
                                    <span class="post-category"><i class="fa fa-at"></i> michel.volkovitch(at)wanadoo.fr</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    Nina-Maria Wanek - German Translator<br>
                                    <span class="post-category"><i class="fa fa-at"></i> nmwanek(at)gruene-eule.at</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    Tatia Mtvarelidze - Georgian Translator<br>
                                    <span class="post-category"><i class="fa fa-at"></i> tatiamtvarelidze(at)gmail.com</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    Shoestring Press - UK Publisher<br>
                                    <span class="post-category"><i class="fa fa-at"></i> info(at)shoestring-press.com</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    Verlagshaus Berlin - German Publisher<br>
                                    <span class="post-category"><i class="fa fa-at"></i> post(at)verlagshaus-berlin.de</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    Le Miel des Anges - French Publisher<br>
                                    <span class="post-category"><i class="fa fa-at"></i> lemieldesanges(at)gmail.com</span>
                                </div>
                            </div>
                            <div class="post-thumbnail-entry">
                                <div class="post-thumbnail-content">
                                    Info - Website Admin<br>
                                    <span class="post-category"><i class="fa fa-at"></i> giacomo.gasperini(at)gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>





@stop
