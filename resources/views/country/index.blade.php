@extends('layout.main')

@section('content')


    @include('country.create')

    @foreach ($list as $item)

        @include('country.edit')

    @endforeach


    <div class="col-md-12" style="padding-top: 11px;">

        <label for="">Filter Continent</label>
        <select name="" id="continent_select">
            <option value="">--Select--</option>
            @foreach ($continents as $continent)
                <option {{ ( request()->filled('continent_id') && $continent->id == request('continent_id'))? 'selected':'' }} value="{{ $continent->id }}">{{ $continent->name }}</option>
            @endforeach
        </select>

    </div>


    @if (request()->filled('continent_id'))
    <div class="col-md-12" align="right" style="margin-bottom: 11px;margin-top: 11px;">
        <a data-toggle="modal" data-target="#create" href="#" class="btn btn-sm btn-primary">+ Country</a>
    </div>
    @endif

    <div class="col-md-12">
        <table class="table">

            <tr>

                <th>
                    Name
                </th>
                <th>
                    Created
                </th>
                <th>
                    Action
                </th>

            </tr>


            @foreach ($list as $item)

                <tr>

                    <td>
                        {{ $item->name }}
                    </td>

                    <td>
                        {{ $item->created_at }}
                    </td>

                    <td>
                        <a data-toggle="modal" data-target="#edit{{ $item->id }}" href="#" class="btn btn-sm btn-info">Edit</a>
                        <form style="display: inline-block;" onsubmit="return confirm('Do you want to remove this record?');" action="{{ route('country.destroy',[$item->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>

                </tr>

            @endforeach

        </table>
    </div>



@endsection


@section('script')

    <script>

        (function($){

            $(function(){

                ///jquery stuffs...
                $('#continent_select').on('change',function () {

                    var vl = $(this).val();

                    location.href =  `{{ route('country.index') }}?continent_id=${vl}`;

                });


            });

        })(jQuery);


    </script>

@endsection