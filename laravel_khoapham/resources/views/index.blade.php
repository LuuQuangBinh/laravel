@extends('layout.app')
@section('content')
    <h3>This is a content of Home Page</h3>
    <h2>
        @if($age>=26)
            {{$name}}
            <br>
            {{$age}}
        @else
            Tuổi phải lớn hơn 26 mới hiển thị tên dc
        @endif
    </h2>
@endsection

