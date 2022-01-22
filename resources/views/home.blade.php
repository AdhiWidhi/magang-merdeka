@extends('layouts.app')
@section('content')

<h2 class="heading-section">List Project <a href="/create" class="btn btn-dark float-end"><i class="fas fa-plus"></i>
        Add data </a></h2>
<a href="/" class="btn btn-block btn-primary"> Refresh</a>
<div class="row">
    <div class="col-md-12">
        <div class="table">
            <div class="row">
                <div class="col-md-4">
                    <form action="/search" method="GET">
                        <div class="input-group mb-3">
                            <input name="search" type="text" class="form-control" placeholder="Search..."
                                aria-label="Search..." aria-describedby="basic-addon1">

                            <button type="submit"><span class="input-group" id="basic-addon1">
                                    <i class="fas fa-search"></i>
                                </span></button>
                        </div>
                    </form>
                </div>

            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Client</th>
                        <th>Leader</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Progress</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($project as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->client }}
                        </td>
                        <td class="d-flex align-items-center">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/'. $item->image) }}" alt=""
                                        style="width: 50px; border-radius: 5px">
                                </div>
                                <div class="col">
                                    {{ $item->leader }}
                                    <br>
                                    {{ $item->email }}
                                </div>
                            </div>
                        </td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>
                            @if($item->progress == 100)
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100"
                                    aria-valuemin="0" aria-valuemax="100" style="width: {{ $item->progress }}%;">

                                </div>

                            </div>
                            <span class="progress-completed">{{ $item->progress }}%</span>
                            @else
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ $item->progress }}%;">

                                </div>

                            </div>
                            <span class="progress-completed">{{ $item->progress }}%</span>
                            @endif

                        </td>
                        <td>
                            <a href="/edit/{{ $item->id }}" class="btn btn-success btn-block"><i
                                    class="fas fa-pencil-alt"></i></a>
                            <form action="/delete/{{ $item->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Apakah anda sudah yakin ?')"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            {{ $project->links() }}
        </div>
    </div>
</div>
{{-- <script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
    var bar = document.querySelector('.progress-bar'),
			    range = document.querySelector('#range');
 
			range.value = bar.style.width;
 
			range.addEventListener('input', function(e) {
			    bar.style.width = range.value +"%";
			    bar.innerHTML = range.value + "%";
			});
</script> --}}


@endsection