@extends('layouts.app')

@section('meta')
<title>404 - Page not found</title>
@stop

@section('content')

<section class="m-t-80 p-b-150">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="page-error-404">404</div>
            </div>
            <div class="col-md-6">
                <div class="text-left">
                    <h1 class="text-medium">Ooops, we can not find the page</h1>
                    <p class="lead">
                        The page you are looking for could have been removed, or it could have change name.
                    </p>
                    <div class="seperator m-t-20 m-b-20"></div>

                    <div class="search-form">
                        <p>Try search here</p>
                                    
                        {!! Form::open(['method' => 'get', 'url' => url('results'), 'class' => 'form-inline']) !!}   
                            <div class="input-group input-group-lg">
                                <input type="text" name="q" class="form-control" value="" placeholder="type and search ...">
                                <span class="input-group-btn">
                                    <button class="btn color btn-default" type="submit"><i class="fa fa-search"></i></button>                                   
                                </span>
                            </div>
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@stop