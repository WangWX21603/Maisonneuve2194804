@extends('layouts.app')
@section('title', 'Accueil')
@section('content')


<div class="container my-5">
    <div class ="nav justify-content-end">
        <a href="{{ route('etudiant.create')}}" class="btn btn-primary">
        @lang('lang.add_student')
        </a>
    </div>
    
    <p class="fw-semibold fs-3">@lang('lang.student_list')</p>

    <table class="table table-hover my-4">
        <thead class="bg-secondary text-center">
            <tr>
            <th scope="col" class="text-white">@lang('lang.name')</th>
            <th scope="col" class="text-white">@lang('lang.email')</th>
            <th scope="col" class="text-white">@lang('lang.phone')</th>

            <th scope="col" class="text-white">@lang('lang.address')</th>
            </tr>
        </thead>
        <tbody>
            @forelse($etudiants as $etudiant)
                <tr>
                    <td scope="row"><a href="{{ route('etudiant.show', $etudiant->id) }}" class="text-decoration-none text-black text-left">{{ $etudiant->nom }}</a> </td>
                    <td scope="row"><a href="{{ route('etudiant.show', $etudiant->id) }}" class="text-decoration-none text-black text-left">{{ $etudiant->email }}</a></td>
                    <td scope="row"><a href="{{ route('etudiant.show', $etudiant->id) }}" class="text-decoration-none text-black text-left">{{ $etudiant->phone }}</a></td>
                    <td scope="row"><a href="{{ route('etudiant.show', $etudiant->id) }}" class="text-decoration-none text-black text-left">{{ $etudiant->adresse }}</a></td>
                </tr>
            @empty
                <li class="text-danger">@lang('lang.article_empty')</li>
            @endforelse
        </tbody>
    </table>
    
    <div class="text-center py-3 fw-semibold">{{ $etudiants }}</div>
                
</div>



@endsection