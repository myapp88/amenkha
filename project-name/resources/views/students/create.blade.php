@extends('students.layout')

@section('content')
<div class="container mt-5">
    <h2>إضافة طالب جديد</h2>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <div class="mb-3">
            <label>الاسم</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>الإيميل</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>الهاتف</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>
@endsection