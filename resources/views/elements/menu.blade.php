
<div id="logo">
    <a href="{{url('/')}}" class="logo" data-dark-logo="{{ asset('images/logo.png') }}">
        <img src="{{ asset('images/logo.png') }}" alt="{{config('app.name')}} Logo">
    </a>
</div>

<div id="top-search">
    {!! Form::open(['method' => 'get', 'url' => url('results')]) !!}
            <input type="text" name="q" class="form-control" value="" placeholder="Start typing & press  &quot;Enter&quot;">
    {!! Form::close() !!}
</div>

<div class="header-extras">
    <ul>
        <li>
            <a id="top-search-trigger" href="#" class="toggle-item"><i class="fa fa-search"></i><i class="fa fa-close"></i></a>
        </li>
    </ul>
</div>

<div id="mainMenu-trigger">
    <button class="lines-button x"> <span class="lines"></span> </button>
</div>

<div id="mainMenu" class="menu-lines">
    <div class="container">
        <nav>
            <ul>
                <li><a href="{{url('/contact')}}">Contact</a></li>
                <li><a href="{{url('/about-and-press')}}">About & Press</a></li>
                <li><a href="{{url('/media-appearances')}}">Radio & TV</a></li>
                <li><a href="{{url('/readings')}}">Readings & Events</a></li>
                <li><a href="{{url('/reviews')}}">Reviews & Articles</a></li>
                <li><a href="{{url('/publications')}}">Other publications</a></li>
                <li class="dropdown"> <a href="#">Read Excerpts</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/excerpts/greek')}}">Greek (original)</a></li>
                        <li><a href="{{url('/excerpts/english')}}">English</a></li>
                        <li><a href="{{url('/excerpts/german')}}">German</a></li>
                        <li><a href="{{url('/excerpts/french')}}">French</a></li>
                        <li><a href="{{url('/excerpts/spanish')}}">Spanish</a></li>
                        <li><a href="{{url('/excerpts/italian')}}">Italian</a></li>
                        <li><a href="{{url('/excerpts/portuguese')}}">Portuguese</a></li>
                        <li><a href="{{url('/excerpts/dutch')}}">Dutch</a></li>
                        <li><a href="{{url('/excerpts/romanian')}}">Romanian</a></li>
                        <li><a href="{{url('/excerpts/georgian')}}">Georgian</a></li>
                        <li><a href="{{url('/excerpts/bengali')}}">Bengali</a></li>
                        <li><a href="{{url('/excerpts/chinese')}}">Chinese</a></li>
                        <li><a href="{{url('/excerpts/polish')}}">Polish </a> </li>
                        <li><a href="{{url('/excerpts/arabic')}}">Arabic </a> </li>
                        <li><a href="{{url('/excerpts/hebrew')}}">Hebrew </a> </li>
                        <li><a href="{{url('/excerpts/hungarian')}}">Hungarian </a> </li>
                        <li><a href="{{url('/excerpts/swedish')}}">Swedish </a> </li>
                        <li><a href="{{url('/excerpts/albanian')}}">Albanian </a> </li>
                        <li><span>Russian <span class="label label-default label-xxs">Coming Soon</span></span> </li>
                        <li><span>Finnish <span class="label label-default label-xxs">Coming Soon</span></span> </li>
                        <li><span>Japanese <span class="label label-default label-xxs">Coming Soon</span></span> </li>

                        <li><span>Turkish <span class="label label-default label-xxs">Coming Soon</span></span> </li>
                    </ul>
                </li>
                <li class="dropdown"> <a href="#">Books</a>
                    <ul class="dropdown-menu">
                        <li> <a href="{{url('/books/english')}}">English</a> </li>
                        <li> <a href="{{url('/books/german')}}">German</a> </li>
                        <li> <a href="{{url('/books/greek')}}">Greek</a> </li>
                        <li> <a href="{{url('/books/french')}}">French</a> </li>
                        <li> <a href="{{url('/books/portuguese')}}">Portuguese</a> </li>
                        <li> <a href="{{url('/books/italian')}}">Italian</a> </li>
                        <li> <a href="{{url('/books/turkish')}}">Turkish</a> </li>
                    </ul>
                </li>
                @if(!\Auth::guest())
                    <li><a href="{{url('home')}}">Admin</a></li>
                @endif
                <br>

<li><a href="https://lyacos.org" target="_BLANK" onMouseOver="this.style.color='#ffff66'" onMouseOut="this.style.color='#FFF'">DL FOUNDATION</a></li>

                <li><a href="{{url('the-trilogy-in-other-media')}}">The Trilogy in other media</a></li>
                <li><a href="{{url('/books/first-or-out-of-print-editions')}}">First/out of print editions</a></li>
                 <li><a href="{{url('interviews')}}">Interviews</a></li>


            </ul>
        </nav>
    </div>
</div>
