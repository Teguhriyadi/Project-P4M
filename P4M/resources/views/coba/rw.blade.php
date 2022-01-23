<option value="">Pilih RW</option>
@foreach ($rw as $r)
<option value="{{ $r->id }}">{{ $r->rw }}</option>
@endforeach
