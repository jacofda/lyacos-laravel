@component('mail::message')
# Contact Request

<i>{{$description}}</i>

@component('mail::button', ['url' => 'mailto:'.$email])
{{$name}} - {{$email}}
@endcomponent


@endcomponent
