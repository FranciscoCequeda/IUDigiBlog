@extends('dashboard.layout')
@section('content')
    <a class="btn btn-success mt-3" href="{{ route('posts.create') }}">Crear Publicacion</a>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Publicado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->title }}</td>
                        <td>{{ $post->publicado == 'Not' ? 'No' : 'Si' }}</td>
                        <td>
                            <a class="btn btn-warning mr-2" href="{{ route('posts.edit', $post) }}"
                                style="display: inline-block;">Editar</a>
                            <a class="btn btn-primary mr-2" href="{{ route('posts.show', $post) }}"
                                style="display: inline-block;">Ver</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection