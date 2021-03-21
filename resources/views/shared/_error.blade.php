@if(count($errors) > 0)
<div class="alrt alert-danger">
    <div class="mt-2"><b>
        Error occurs
    </b></div>
    <ul class="mt-2 mb-2">
        @foreach($errors->all() as $error)
          <li><i class="glyphicon glyphicon-remove">
              {{ $error }}
          </i></li>
        @endforeach
    </ul>
</div>
@endif
