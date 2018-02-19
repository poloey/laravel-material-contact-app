@extends('master')
@section('content')
<div class="container">
  <div class='p-5 mt-2 teal white-text'>
    <h2>All contacts</h2>
  </div>
  <div class='row'>
    <div class='col s12'>
      <div class='all-contact'>
        @foreach ($contacts as $contact)
          <div class='custom-cart text-center'>
            <div>
              <div class='contact-image'>
                <a href='{{ route('contacts.show', ['contact' => $contact->id]) }}'>
                  <img src='{{Storage::url($contact->image)}}' class="contact-avatar" alt=''/ alt="{{$contact->name}}'s avatar">
                </a>
              </div>
              <h3><a href="{{ route('contacts.show', ['contact' => $contact->id]) }}">
                {{ $contact->name }}
              </a></h3>
              <p><span class='strong'>mobile:</span> {{ $contact->name }}</p>
              
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class='row'>
    <div class='col s12'>
      <div class='text-center p-4'>
        {{$contacts->links('vendor.pagination.materializecss')}}
      </div>
    </div>
  </div>
</div>
@endsection

