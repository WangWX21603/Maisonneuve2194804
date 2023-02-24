@extends('layouts.app')
@section('title', 'Creer')
@section('content')

<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-8">
            <div class ="nav justify-content-end mb-3">
                <a href="{{ route('etudiant.index') }}" class="btn btn-outline-primary btn-md mt-5">@lang('lang.return')</a>
            </div>
            <div class="card border-dark">
                <form method="post">
                    @csrf
                    <div class="card-header text-uppercase text-center bg-secondary text-white py-3">
                        <h4>>@lang('lang.add_student')</h4>
                    </div>
                    <div class="card-body">

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

                        <div class="form-group col-12">
                            <label for="nom" class="fw-semibold">@lang('lang.name')</label>
                            <input type="text" id="nom" name="nom" class="form-control text-secondary">
                        </div>
                        <div class="form-group col-12 mt-2">
                            <label for="adresse" class="fw-semibold">@lang('lang.address')</label>
                            <input type="text" name="adresse" id="adresse" class="form-control text-secondary">
                        </div>
                        <div class="form-group col-12 mt-2">
                            <label for="phone" class="fw-semibold">@lang('lang.phone')</label>
                            <input type="text" name="phone" id="phone" class="form-control text-secondary">
                        </div>
                        <div class="form-group col-12 mt-2">
                            <label for="email" class="fw-semibold">@lang('lang.email')</label>
                            <input type="text" name="email" id="email" class="form-control text-secondary">
                        </div>                        
                        <div class="form-group col-12 mt-2">
                            <label for="dateNaissance" class="fw-semibold">@lang('lang.birthday')</label>
                            <input type="text" name="dateNaissance" id="dateNaissance" class="form-control text-secondary">
                        </div>                        
                        <div class="form-group col-12 mt-2">
                            <label for="ville" class="mr-sm-2 fw-semibold">@lang('lang.city')</label>
                            <p>
                                <select class="form-select text-secondary" name="villeId" id="ville">
                                    @foreach($villes as $ville)
                                        <option value="{{ $ville->id }}"  class="form-control" >{{ $ville->nom }}</option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    
                    <div class="text-center mb-4">
                        <input type="submit" value="@lang('lang.save')" class="btn btn-primary">
                    </div>
                </form>


            </div>

        </div>

    </div>
</div>

@endsection