@extends('layouts.app')

@section('content')
<div class="container my-4 animate__animated animate__fadeIn">
    <h1>Tutti i Progetti</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Crea Nuovo Progetto</a>

    <div class="card p-3">
        <table class="table table-dark table-hover mb-0">
            <thead>
                <tr>
                    <th class="align-middle">Titolo</th>
                    <th class="align-middle">Copertina</th>
                    <th class="align-middle">Repo URL</th>
                    <th class="align-middle">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td class="align-middle">{{ $project->title }}</td>
                    <td class="align-middle">
                        @if($project->cover_image)
                            <img src="{{ asset('storage/' . $project->cover_image) }}"
                                 alt="Cover"
                                 width="80"
                                 style="object-fit: cover; border-radius: 50%;">
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="align-middle">
                        @if($project->repo_url)
                            <a href="{{ $project->repo_url }}" target="_blank">Link</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="align-middle">
                        <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-success btn-sm">Mostra</a>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Modifica</a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Sei sicuro di voler eliminare questo progetto?')">
                                Elimina
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Nessun progetto trovato</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
