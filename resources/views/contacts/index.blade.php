@extends('master')
@section('content')
<div class="container">
  <div class='p-5 mt-2 teal white-text'>
    <h2>All contacts</h2>
  </div>
  <div class='row mt-3'>
    @foreach ($contacts->chunk(3) as $contact_chunk)
      @foreach ($contact_chunk as $contact)
          <div class='col s6'>
            <div class='card'>
              <div class='card-content'>
                <div class='contact-image'>
                  <img src='{{Storage::url($contact->image)}}' class="contact-avatar" alt=''/ alt="{{$contact->name}}'s avatar">
                </div>
                <h2>{{ $contact->name }}</h2>
                <p><span class='strong'>mobile:</span> {{ $contact->name }}</p>

                @if ($contact->email)
                  <p><span class='strong'>email:</span> {{ $contact->name }}</p>
                @endif

                @if ($contact->city)
                  <p><span class='strong'>city:</span> {{ $contact->city }}</p>
                @endif
                
                @if ($contact->address)
                  <p><span class='strong'>address</span> {{ $contact->address }}</p>
                @endif
                
                @if ($contact->facebook)
                  <p><span class='strong'>facebook</span> {{ $contact->facebook }}</p>
                @endif
                
                @if ($contact->twitter)
                  <p><span class='strong'>twitter:</span> {{ $contact->twitter }}</p>
                @endif
                
                @if ($contact->linkedin)
                  <p><span class='strong'>linkedin:</span> {{ $contact->linkedin }}</p>
                @endif
                
              </div>
            </div>
          </div>
        @endforeach
    @endforeach
  </div>
  
</div>
@endsection

@push('style')
<style>
  .contact-image {
    width: 100%;
  }
  .contact-avatar {
    width: 70%;
    margin: 10px auto;
    display: block;
  }
  .strong {
    font-weight: bold;
  }
</style>
@endpush