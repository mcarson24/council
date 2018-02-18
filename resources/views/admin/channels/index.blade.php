@extends('admin.layout.app')

@section('administration-content')
    <new-channel></new-channel>
    <channels :channels="{{ $channels }}"></channels>
@endsection
