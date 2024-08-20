@extends('layouts.layout  ')

@section('title', 'Event Details')

@section('content')
  {{-- upcoming events --}}
  <div class="my-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 col-md-6 col-sm-12 col-xs-12 h-100">
          <img src="{{ asset('images/events/event_2.png') }}" alt="" class="w-100">
        </div>
        <div class="col-12 col-lg-6 col-md-6 col-sm-12 col-xs-12 align-items-center justify-content">
          <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ratione?</h3>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam modi pariatur eligendi ipsa itaque nobis
            quas? Temporibus consectetur sit accusantium. Numquam, iusto? Recusandae quia ullam provident magni laboriosam
            blanditiis ad cupiditate dignissimos quidem eaque soluta amet, corporis eveniet corrupti doloribus quos
            molestiae consequuntur culpa impedit commodi, beatae quae. Assumenda nemo obcaecati, tempore incidunt id,
            aspernatur rem laborum ducimus ipsa rerum repellat quisquam distinctio.
          </p>
        </div>
      </div>
    </div>
  </div>
@endsection
