@if (count($errors))
  <div class="row">
    <div class="col s12">
      <div class="card red darken-2 white-text">
        <div class="card-content">
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endif
