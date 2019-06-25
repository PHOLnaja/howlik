<!-- text input -->
  <div class="form-group">
    <label>{{ $field['label'] }}</label>
    <input
    	type="email"
    	class="form-control"

    	@foreach ($field as $attribute => $value)
    		{{ $attribute }}="{{ $value }}"
    	@endforeach
    	>
  </div>