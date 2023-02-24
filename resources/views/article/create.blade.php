@extends('layouts.app')
@section('title', 'Accueil')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="display-one"> @lang('lang.add_article_title')</h1>

        </div>
    </div>
    <div class ="nav justify-content-end mb-3">
            <a href="{{ route('article.index') }}" class="btn btn-outline-primary btn-md mt-5">@lang('lang.return')</a>
    </div>
    <hr>
    <div class="row justify-content-center">

        <div class="col-6">
            <div class="card">
                <form method="post">
                    @csrf
                    
                    @if(!$errors->isEmpty())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{session('success')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <nav class="card-header">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">@lang('lang.english')</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">@lang('lang.french')</button>
                        </div>
                    </nav>

                    <div class="tab-content card-body" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="control-group col-12">
                                <label for="titre">@lang('lang.title_article_en')</label>
                                <input type="text" id="titre" name="titre" class="form-control">
                            </div>
                            <div class="control-group col-12">
                                <label for="contenu">@lang('lang.contenu_article_en')</label>
                                <textarea id="contenu" name="contenu" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="control-group col-12">
                                <label for="titre_fr">@lang('lang.title_article_fr')</label>
                                <input type="text" id="titre_fr" name="titre_fr" class="form-control">
                            </div>
                            <div class="control-group col-12">
                                <label for="contenu_fr">@lang('lang.contenu_article_fr')</label>
                                <textarea id="contenu_fr" name="contenu_fr" class="form-control"></textarea>
                            </div>
                        </div>

                    </div>
                    
                    <div class="card-footer">
                        <input type="submit" value="@lang('lang.save')" class="btn btn-success">
                    </div>


                </form>

            </div>

        </div>


    </div>
</div>


@endsection
