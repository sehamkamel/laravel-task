@extends('notes.layout')

@section('content')
<div class="container">
    <h1>Trash Bin</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($trashedNotes->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>content</th>
                    <th>Delete Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trashedNotes as $note)
                    <tr>
                        <td>{{ $loop->iteration + $i }}</td>
                        <td>{{ $note->title }}</td>
                        <td>{{ $note->content }}</td>
                        <td>{{ $note->deleted_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <!-- زر الاسترجاع -->
                            <form action="{{ route('notes.restore', $note->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('هل تريد استرجاع هذه الملاحظة؟')">Restore</button>
                            </form>

                            <!-- زر الحذف النهائي -->
                            <form action="{{ route('notes.forceDelete', $note->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف النهائي؟')">permanent Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- روابط الصفحات -->
        {{ $trashedNotes->links() }}

    @else
        <p>No Notes in the Trash Bin</p>
    @endif

    <a href="{{ route('notes.index') }}" class="btn btn-primary mt-3">Back to Notes</a>
</div>
@endsection
