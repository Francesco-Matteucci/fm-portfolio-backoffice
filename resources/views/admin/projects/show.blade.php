@extends('layouts.app')

@section('content')
<div class="container my-4 animate__animated animate__fadeIn">
    <h1 class="mb-3 text-center">Dettagli Progetto</h1>

    <div class="card p-4 text-center">
        <h2 class="mb-3">{{ $project->title }}</h2>

        @if($project->cover_image)
            <div class="d-flex justify-content-center mb-3">
                <img src="{{ asset('storage/' . $project->cover_image) }}"
                     alt="Cover"
                     class="img-fluid"
                     style="max-width: 300px; object-fit: cover;">
            </div>
        @endif

        {{-- Contenuto testuale --}}
        @if($project->description)
            <p>{{ $project->description }}</p>
        @endif

        <p><strong>Tech Stack:</strong> {{ $project->tech_stack ?: 'N/D' }}</p>

        <p>
            <strong>Repo:</strong>
            @if($project->repo_url)
                <a href="{{ $project->repo_url }}" target="_blank">{{ $project->repo_url }}</a>
            @else
                Non disponibile
            @endif
        </p>
    </div>

    <div class="text-center mt-3">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Torna ai Progetti</a>
    </div>
</div>
@endsection
