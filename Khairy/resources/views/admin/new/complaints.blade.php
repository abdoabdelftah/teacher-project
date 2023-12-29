@extends('admin.layouts.new-app')
@section('css')

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/select2/select2.css') }}" />
@stop
@section('content')



    <div class="row">


        <div class="card">

            <div class="card-header">

               <h3> الشكاوى والمقترحات</h3>
            </div>

            <div class="card-body">
                @foreach ($complaints as $complaint)
                    <div class="alert alert-primary alert-dismissible mb-0" role="alert">
                        <h4 class="alert-heading d-flex align-items-center"><i
                                class="mdi mdi-chat-alert-outline mdi-24px me-2"></i>{{ $complaint->name }} / {{$complaint->phone_number}}</h4>
                        <p class="mb-0">{{ $complaint->message }}</p>

                        <a href="/admin/guest/complaint/see/{{ $complaint->id }}" class="btn-close">
                        </a>

                    </div>
                    <br>
                @endforeach

            </div>
        </div>

    </div>

@stop

@section('js')

    <script src="{{ asset('admin/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('admin/assets/js/form-layouts.js') }}"></script>



@stop
