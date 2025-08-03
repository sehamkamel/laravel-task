@extends('layouts.app')

@section('content')
<div class="container">
    <h1>سلة المهملات</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($trashedNotes->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>العنوان</th>
                    <th>المحتوى</th>
                    <th>تاريخ الحذف</th>
                    <th>الإجراءات</th>
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
                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('هل تريد استرجاع هذه الملاحظة؟')">استرجاع</button>
                            </form>

                            <!-- زر الحذف النهائي -->
                            <form action="{{ route('notes.forceDelete', $note->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف النهائي؟')">حذف نهائي</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- روابط الصفحات -->
        {{ $trashedNotes->links() }}

    @else
        <p>لا توجد ملاحظات في سلة المهملات.</p>
    @endif

    <a href="{{ route('notes.index') }}" class="btn btn-primary mt-3">العودة إلى الملاحظات</a>
</div>
@endsection
