<option value="">Pilih RT</option>
@foreach ($rt as $r)
<option value="{{ $r->id }}">{{ $r->rt }}</option>
@endforeach
