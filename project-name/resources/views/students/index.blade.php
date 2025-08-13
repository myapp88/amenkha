@extends('students.layout')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">لوحة إدارة الطلاب</h2>
    @if(session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif
    <a class="btn btn-success mb-3" href="{{ route('students.create') }}">إضافة طالب جديد</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>الاسم</th>
                <th>الإيميل</th>
                <th>الهاتف</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('students.show', $student->id) }}">عرض</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('students.edit', $student->id) }}">تعديل</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('هل تريد الحذف؟')">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection