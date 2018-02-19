@extends('master')
@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="col s12">
      <div class="card teal darken-2 white-text">
        <div class="card-content">
          <h2 class="card-title">
            Add a contact 
          </h2>
        </div>
      </div>
    </div>
  </div>

@include('contacts.errors')
@if (Session::has('message'))
  <div class="card green lighten-1 white-text">
    <div class="card-content">
      <h4>{{Session::get('message')}}</h4>
    </div>
  </div>
@endif

  <div class="row">
    <form class="col s12" method="post" action="{{ route('contacts.store') }}">
      @csrf
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="name" id="name" value="{{old('name')}}">
          <label for="name">Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="mobile" id="mobile" value="{{old('mobile')}}">
          <label for="mobile">mobile</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="Email" id="Email" value="{{old('email')}}">
          <label for="Email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="city" id="city" value="{{old('city')}}">
          <label for="city">city</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="address" id="address" value="{{old('address')}}">
          <label for="address">Address</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="facebook" id="facebook" value="{{old('facebook')}}">
          <label for="facebook">facebook</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="twitter" id="twitter" value="{{old('twitter')}}">
          <label for="twitter">twitter</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="text" name="linkedin" id="linkedin" value="{{old('linkedin')}}">
          <label for="linkedin">linkedin</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <button type="submit" class="btn waves-effect waves-light">Add Contact</button>
        </div>
      </div>


    </form>
  </div>
</div>
@endsection