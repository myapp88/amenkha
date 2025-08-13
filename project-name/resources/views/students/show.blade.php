@extends('students.layout')

@section('content')
<div class="container mt-5">
    <h2>بيانات الطالب</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $student->name }}</h5>
            <p class="card-text"><strong>الإيميل:</strong> {{ $student->email }}</p>
            <p class="card-text"><strong>الهاتف:</strong> {{ $student->phone }}</p>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">رجوع</a>
        </div>
    </div>
</div>
@endsection