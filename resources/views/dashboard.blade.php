@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="card col-6 p-3 my-5" >
                <div class="card-body">
                    <h5 class="card-title">@lang('lang.forum')</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos eveniet incidunt id blanditiis laudantium rem, inventore explicabo quo dolore? Impedit reprehenderit quidem reiciendis illo dolor eius quis enim nihil dicta!</p>
                    <a href="{{ route('article.index')}}" class="btn btn-outline-primary">@lang('lang.go')</a>
                </div>
            </div>

            <div class="card col-6 p-4 my-5" >
                <div class="card-body">
                    <h5 class="card-title">@lang('lang.document_directory')</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellendus fugiat corrupti at iste ducimus dolorum eum numquam accusantium? Expedita culpa accusantium id, consequatur facere sunt voluptas quam aliquid sit!</p>
                    <a href="{{ route('file.index')}}" class="btn btn-outline-primary">@lang('lang.go')</a>
                </div>
            </div>

        </div>

    </div>

@endsection


