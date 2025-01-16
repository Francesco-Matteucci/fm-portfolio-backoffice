@extends('layouts.app')

@section('content')
<div class="container my-4 animate__animated animate__fadeIn">
    <h1>Crea Nuovo Progetto</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="card p-4">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo *</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="repo_url" class="form-label">Repository URL</label>
            <input type="url" name="repo_url" class="form-control" id="repo_url" value="{{ old('repo_url') }}">
            @error('repo_url')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tech_stack" class="form-label">Tech Stack (es: Laravel,Vue,JS)</label>
            <input type="text" name="tech_stack" class="form-control" id="tech_stack" value="{{ old('tech_stack') }}">
            @error('tech_stack')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Copertina</label>
            <input type="file" name="cover_image" class="form-control" id="cover_image">
            @error('cover_image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection
