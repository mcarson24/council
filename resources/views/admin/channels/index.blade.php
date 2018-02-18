@extends('admin.layout.app')

@section('administration-content')
	<p class="mb-8">
        <a class="btn bg-blue" @click="$modal.show('channel-form', {type: 'post', channel: ''})">
            New Channel <span class="glyphicon glyphicon-plus"></span>
        </a>
    </p>
    <channel-form></channel-form>
    <channels :channels="{{ $channels }}"></channels>
@endsection
