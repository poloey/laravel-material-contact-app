@extends('master')
@section('content')
<div class="container">
  <div class='p-5 mt-2 teal white-text'>
    <h2>All contacts</h2>
    @if (!empty($query))
      <h4>Search Results for <span class="red lighten-1 px-2"> {{$query}}</span></h4>
    @endif
  </div>
  <div class='row'>
    <div class='col s12'>
      <div class='all-contact'>
        @foreach ($contacts as $contact)
          <div class='custom-cart text-center'>
            <div>
              <div class='contact-image'>
                <a href='{{ route('contacts.show', ['contact' => $contact->id]) }}'>
                  @if ($contact->image == 'images/default.png')
                    <img src='{{ asset('images/default.png') }}' class="contact-avatar single" alt=''/ alt="{{$contact->name}}'s avatar">
                  @else
                    <img src='{{asset($contact->image)}}' class="contact-avatar single" alt=''/ alt="{{$contact->name}}'s avatar">
                  @endif

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
      @if(!count($contacts))
      <div class="p-5 red lighten-2 white-text mt-2">
        <h3>No records found</h3>
      </div>
      @endif
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

