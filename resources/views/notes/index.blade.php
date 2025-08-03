@extends('notes.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Laravel CRUD Example</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <a class="btn btn-success btn-sm" href="{{ route('notes.create') }}"><i class="fa fa-plus"></i> Create New Note</a>
        </div>

        {{-- Search Form --}}
        <form action="{{ route('notes.search') }}" method="GET" class="mb-4 d-flex">
            <input 
                type="text" 
                name="search" 
                value="{{ request()->search }}" 
                class="form-control me-2" 
                placeholder="Search by title or content">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{ route('notes.index') }}" class="btn btn-secondary ms-2">Show All</a>
        </form>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($notes as $index => $note)
                    <tr>
                        <td>{{ $notes->firstItem() + $index }}</td>
                        <td>{{ $note->title }}</td>
                        <td>{{ $note->content }}</td>
                        <td>
                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('notes.show', $note->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('notes.edit', $note->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($notes->isEmpty())
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        {!! $notes->links() !!}

    </div>
</div>  

@endsection
