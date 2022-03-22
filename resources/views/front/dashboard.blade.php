@extends('front.layout.app')
	@section('title', 'dashboard')

	@section('content')
    <div>
    	Welcome {{session()->get('user_info')['user_id']}}
    </div>
	@endsection

	@section('footer')
	@parent
	@endsection