@extends('layouts.app')
@section('meta')
<title>Old Editions Poena Damni- {{config('app.name')}}</title>
<link rel="canonical" href="{{config('app.url')}}books/first-or-out-of-print-editions">
@stop

@section('content')
	<section id="page-title" class="page-title-classic">

        <div class="container">
            <div class="page-title">
                <h1>First/out of print editions</h1>

                <h2 class="i">Old and print out editions</h2>

            </div>
        </div>

	</section>
    <div class="page-menu menu-lines">
        <div class="container">
            <nav>
                <ul>
		          <li><a href="{{url('/')}}"><i class="fa fa-home"></i></a> </li>
		          <li class="active">First/out of print editions</li>
                </ul>
            </nav>

            <div id="menu-responsive-icon">
                <i class="fa fa-reorder"></i>
            </div>

        </div>
    </div>

   <section id="page-content">
        <div class="container">
            <div class="row">

                <div class="row">
                    <div class="col-sm-3">
                        <div class="portfolio-item no-overlay p-0">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-image">
                                    <img src="{{asset('images/old-editions/z213-exit.jpg')}}" alt="Z213: EXIT first edition">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="col-sm-4">
                            <div class="portfolio-attributes style2 p-3">
                                <div class="attribute"><strong>Title:</strong> Z213: EXIT</div>
                                <div class="attribute"><strong>Publisher:</strong> SHOESTRING PRESS</div>
                                <div class="attribute"><strong>Translated by:</strong> Shorsha Sullivan</div>
                                <div class="attribute"><strong>Published: </strong> 1996</div>
                                <div class="attribute"><strong>Edition: </strong> 1st Edition</div>
                            </div>
                        </div>
                        <div class="col-sm-8 pt-3 project-description">
                            <h3 class="p15"> Z213: EXIT marks the beginning of Dimitris Lyacos’ poetic trilogy Poena Damni. Written over the course of seventeen years, in reverse order, the present publication sees the trilogy’s completion. The last episode, The First Death, was the first to appear in 1996, followed by the second, Nyctivoe, in 2001.</h3>
                        </div>

                    </div>
                </div>

                <div class="clearfix"></div><hr><div class="clearfix"></div>


                <div class="row">
                    <div class="col-sm-3">
                        <div class="portfolio-item no-overlay p-0">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-image">
                                    <img src="{{asset('images/old-editions/with-the-people-from-the-bridge-1st-edition.jpg')}}" alt="WITH THE PEOPLE FROM THE BRIDGE first edition">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="col-sm-4">
                            <div class="portfolio-attributes style2 p-3">
                                <div class="attribute"><strong>Title:</strong> WITH THE PEOPLE FROM THE BRIDGE</div>
                                <div class="attribute"><strong>Publisher:</strong> SHOESTRING PRESS</div>
                                <div class="attribute"><strong>Translated by:</strong> Shorsha Sullivan</div>
                                <div class="attribute"><strong>Published: </strong>Apr 2014</div>
                                <div class="attribute"><strong>Edition: </strong> 1st Edition</div>
                            </div>
                        </div>
                        <div class="col-sm-8 pt-3 project-description">
                            <h3 class="p15">There was a room and next to it opne more, and another one beside that and another, and another, a city, but there were no streets there were no passages and there was no going from one place to the other, a hive they were digging and opening and closing from above. [...]</h3>
                        </div>

                    </div>
                </div>

                <div class="clearfix"></div><hr><div class="clearfix"></div>


                <div class="row">
                    <div class="col-sm-3">
                        <div class="portfolio-item no-overlay p-0">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-image">
                                    <img src="{{asset('images/old-editions/the-first-death.jpg')}}" class="img-responsive" style="max-width: 240px" alt="THE FIRST DEATH first edition">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="col-sm-4">
                            <div class="portfolio-attributes style2 p-3">
                                <div class="attribute"><strong>Title:</strong> THE FIRST DEATH</div>
                                <div class="attribute"><strong>Publisher:</strong> SHOESTRING PRESS</div>
                                <div class="attribute"><strong>Translated by:</strong> Shorsha Sullivan</div>
                                <div class="attribute"><strong>Published: </strong> Mar 2000</div>
                                <div class="attribute"><strong>Edition: </strong> 1st Edition</div>
                            </div>
                        </div>
                        <div class="col-sm-8 pt-3 project-description">
                            <h3 class="p15"> The First Death is the third book in the narrative trilogy Poena Damni. This English version has been translated by Shorsha Sullivan and includes illustrations.</h3>
                        </div>

                    </div>
                </div>

                <div class="clearfix"></div><hr><div class="clearfix"></div>

                <div class="row">
                    <div class="col-sm-3">
                        <div class="portfolio-item no-overlay p-0">
                            <div class="portfolio-item-wrap">
                                <div class="portfolio-image">
                                    <img src="{{asset('images/old-editions/nyctivoe.jpg')}}" alt="nyctivoe first edition">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="col-sm-4">
                            <div class="portfolio-attributes style2 p-3">
                                <div class="attribute"><strong>Title:</strong> nytivoe</div>
                                <div class="attribute"><strong>Publisher:</strong> SHOESTRING PRESS</div>
                                <div class="attribute"><strong>Translated by:</strong> Shorsha Sullivan</div>
                                <div class="attribute"><strong>Published: </strong>May 2005</div>
                                <div class="attribute"><strong>Edition: </strong> 1st Edition</div>
                            </div>
                        </div>
                        <div class="col-sm-8 pt-3 project-description">
                            <h3 class="p15">Developed over the course of fifteen years, Dimitris Lyacos' epics trilogy Poena Damni is a somber allegory exploring the utmost limits of the human condition. [...]</h3>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>

@stop
