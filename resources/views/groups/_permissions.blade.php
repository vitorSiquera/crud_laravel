

@php
    use Illuminate\Support\Str;
    $byGroup = collect($permissions)->groupBy(fn($p) => Str::before($p->name, '.'));
@endphp

@foreach($byGroup as $prefix => $items)
  <div class="card mb-3">
    <div class="card-header fw-bold text-uppercase">{{ $prefix }}</div>
    <div class="card-body">
      <div class="row">
        @foreach($items as $p)
          <div class="col-md-3">
            <div class="form-check">
              <input class="form-check-input"
                     type="checkbox"
                     name="permissions[]"
                     value="{{ $p->name }}"
                     id="perm-{{ $p->id }}"
                     @checked(!empty($selected) && in_array($p->name, $selected))>
              <label class="form-check-label" for="perm-{{ $p->id }}">
                {{ Str::after($p->name, $prefix . '.') }}
              </label>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endforeach
