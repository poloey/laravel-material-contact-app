@extends('master')
@section('content')
<div class="container">
  <div class='p-5 mt-2 teal white-text'>
    <h2>All contacts</h2>
  </div>
  <div class='row mt-3'>
    <div class='col s12'>
      <div class='card'>
        <div class='card-content text-center'>
          <div class='contact-image'>
            @if ($contact->image == 'images/default.png')
              <img src='{{ asset('images/default.png') }}' class="contact-avatar single" alt=''/ alt="{{$contact->name}}'s avatar">
            @else
              <img src='{{asset($contact->image)}}' class="contact-avatar single" alt=''/ alt="{{$contact->name}}'s avatar">
            @endif
          </div>
          <div class="upload_image">
            @include('contacts.errors')
            <form action='{{ route('contacts.upload_image') }}' method="post" enctype="multipart/form-data">
              @csrf
              <p class="text-center">
                upload a image -  
                <input type='hidden' value="{{$contact->id}}" name="contact_id" />
                <input type='file' name="avatar" />
                <button class="btn waves-effect waves-green mt-2">upload</button>
              </p>
            </form>
          </div>
          <h2>{{ $contact->name }}</h2>
          <div class="mb-3">
            <a class="btn waves-effect teal" href='{{ route('contacts.edit', ['contact' => $contact->id]) }}'>Edit</a>
            <form method="post" class="d-inline-block" action='{{ route('contacts.destroy', ['contact' => $contact->id]) }}'>
              @csrf
              @method('delete')
              <button class="btn waves-effect red" type="submit">Delete</button>
            </form>
          </div>
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
            <p>
              <span class='strong'>facebook</span> {{ $contact->facebook }}
              <a target="_blank" href="https://facebook.com/{{$contact->facebook}}">Link</a>
            </p>
          @endif
          
          @if ($contact->twitter)
            <p>
              <span class='strong'>twitter:</span> {{ $contact->twitter }}
              <a target="_blank" href="https://twitter.com/{{$contact->facebook}}">Link</a>
            </p>
          @endif
          
          @if ($contact->linkedin)
            <p>
              <span class='strong'>linkedin:</span> {{ $contact->linkedin }}
              <a target="_blank" href="https://www.linkedin.com/in/{{$contact->linkedin}}">Link</a>
            </p>
          @endif
          
        </div>
      </div>
    </div>
  </div>
  <div class='py-3 my-3 card page-footer grey-text'>
    <div class='card-content'>
      @include('contacts.errors')
      <h4>
        All statuses - 
          <a class="waves-effect waves-light btn modal-trigger" href="#modal1">
            Add a status
          </a>
       </h4>
    </div>
  </div>

<div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Add a status</h4>
      <form action='{{ route('statuses.store') }}' method="post">
        @csrf
        <input type='hidden' name='contact_id' value="{{$contact->id}}" id=''/>

        <div class='row'>
          <div class='col s12 input-field'>
            <textarea name="content" id="textarea1" class="materialize-textarea"></textarea>
            <label for="textarea1">status text</label>
          </div>
        </div>

        <div class='row'>
          <div class='col s12'>
            <button type="submit" class="btn waves-effect waves-green">Add a status</button>
          </div>
        </div>

      </form>
    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>
          

  @if (Session::has('message'))
    <div class='py-3 my-3 card teal grey-text lighten-4'>
      <div class='card-content'>
        <h2>{{Session::get('message')}}</h2>
      </div>
    </div>
  @endif
  @foreach ($contact->statuses as $status)
    <div class='p-3 my-2 card'>
      <div class='card-content'>
        <div>
          {{$status->content}} - {{$status->created_at->diffForHumans()}}
          <form method="post" class="d-inline-block" action='{{ route('statuses.destroy', ['status' => $status->id])}}'>
            @csrf
            @method('delete')
            <button class="btn waves-effect red" type="submit">Delete</button>
          </form>
        </div>
      </div>
    </div>
  @endforeach

</div> {{-- end container  --}}
@endsection

@push('script')
<script>
  $('.modal').modal();
</script>
@endpush