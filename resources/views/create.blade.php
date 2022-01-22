@extends('layouts.app')
@section('content')
<div class="row d-flex align-items-center justify-content-center">
    <div class="card shadow">
        <div class="card-body">
            <form action="/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Project Name</label>
                    <input type="text" class="form-control  @error('name')
                    is-invalid
                    @enderror" name="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Client </label>
                    <input type="text" class="form-control  @error('client')
                    is-invalid
                    @enderror" name="client" value="{{ old('client') }}"> @error('client')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Leader</label>
                    <input type="text" class="form-control  @error('leader')
                    is-invalid
                     @enderror" name="leader" value="{{ old('leader') }}"> @error('leader')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control  @error('email')
                    is-invalid
                @enderror" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control  @error('image')
                    is-invalid
                @enderror" name="image"> @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" class="form-control  @error('start_date')
                    is-invalid
                @enderror" name="start_date" value="{{ old('start_date') }}"> @error('start_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" class="form-control  @error('end_date')
                    is-invalid
                @enderror" name="end_date" value="{{ old('end_date') }}"> @error('end_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <p>Progress</p>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="progress">
                                    <div class="progress-bar" data-length="30" role="progressbar" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                                <input type="range" id="range" max="100" min="0" class="form-control" name="progress">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
    var bar = document.querySelector('.progress-bar'),
			    range = document.querySelector('#range');
 
			range.value = bar.style.width;
 
			range.addEventListener('input', function(e) {
			    bar.style.width = range.value +"%";
			    bar.innerHTML = range.value + "%";
			});
</script>
@endsection