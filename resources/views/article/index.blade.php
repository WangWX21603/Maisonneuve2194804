@extends('layouts.app')
@section('title', 'Accueil')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12 pt-5" >
            <h1 class="display-one mt-5 mx-2">
                @lang('lang.forum_title')
            </h1>
            <p class="display-one m-2">@lang('lang.forum_description')</p>
            <div class="row text-end m-1">
                <div class ="col-md-8"></div>
                <div class ="col-md-4">
                    <a href="{{ route('article.create')}}" class="btn btn-outline-primary">
                    @lang('lang.add_article')
                    </a>
                </div>
            </div>

            <div class="d-flex align-content-stretch text-center flex-wrap">
                @forelse($articles as $article)
                            <figure class="figure m-2 position-relative rounded-4 flex-fill" style="width: 300px; height: 350px; background-color: #A7BEAE">
                                <div class="h-25 d-inline-block position-absolute top-50 start-50" ></div>
                                <figcaption class="figure-caption position-absolute bottom-0 w-100 rounded-bottom-4 py-2" style="background-color: #E7E8D1">
                                    <p class="p-2"><a href="{{ route('article.show', $article->id) }}" class="text-decoration-none text-black fw-semibold fs-5">{{ $article->titre }}</a></p> 
                                    <p>@lang('lang.author') : <strong>{{ $article->articleHasUser->name }}</strong> </p>
                                    <p>@lang('lang.updated_time') : {{ $article->created_at}}</p>

                                </figcaption>
                            </figure>
                        </article>

                @empty
                    <li class="text-danger">@lang('lang.article_empty')</li>
                @endforelse
            </div>
                   
            <div class="text-center py-3 fw-semibold">{{ $articles->links() }}</div>
        </div>
    </div>
</div>





@endsection