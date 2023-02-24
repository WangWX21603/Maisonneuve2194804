@extends('layouts.app')
@section('title', 'Forum')
@section('content')

@php $locale = session()->get('locale'); @endphp

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">

                <div class ="nav justify-content-end">
                    <a href="{{ route('article.index') }}" class="btn btn-outline-primary btn-md mt-5">@lang('lang.return')</a>
                </div>


                @if($locale == "fr" && $article->titre_fr != null)
                    <h4 class="display-one mt-2">{{ $article->titre_fr }}</h4>
                @else
                    <h4 class="display-one mt-2">{{ $article->titre }}</h4>
                @endif

                @if($locale == "fr" && $article->contenu_fr != null)
                    <p>{{ $article->contenu_fr }}</p>
                @else
                    <p>{{ $article->contenu }}</p>
                @endif

                <strong> @lang('lang.author') : {{ $article->articleHasUser->name }}</strong>
                <p>{{ $article->updated_at }}</p>
                
            </div>
        </div>
    </div>

    @if($user->id == $article->user_id)
    <div class="row text-center">

        <div class="col-6">
            <a href="{{ route('article.edit', $article->id) }}" class="btn btn-success btn-sm">@lang('lang.update')</a>
        </div>

        <div class="col-6">
            <form action="{{ route('article.edit', $article->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="@lang('lang.delete')">
            </form>
        </div>

    </div>
    @endif


@endsection
