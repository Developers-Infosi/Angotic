@extends('layouts.merge.site')
@section('titulo', 'Error 404')
@section('content')
    <div class="error" id="error">
        <div class="container">
            <div class="content centered"><img style="width:500px;" src="/htdocs_error/something-lost.png">
                <h1>404 Not Found!</h1>
                <p style="font-size:22px;" class="sub-header text-block-narrow"> We're sorry, the page you have looked for does not exist in our content!</p>
            </div>
        </div>
    </div>
   
@endsection
