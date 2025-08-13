@extends('students.layout')

@section('content')
<div class="container mt-5">
    <h2>تعديل بيانات الطالب</h2>
    <form method="POST" action="{{ route('students.update', $student->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>الاسم</label>
            <input type="text" name="name" value="{{ $student->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>الإيميل</label>
            <input type="email" name="email" value="{{ $student->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>الهاتف</label>
            <input type="text" name="phone" value="{{ $student->phone }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>
@endsection