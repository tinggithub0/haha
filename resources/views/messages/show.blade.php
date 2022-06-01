@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <x-message :mes="$mes[0]" />
        </div>
    </div>
@endsection

