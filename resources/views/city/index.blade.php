@extends('layout.main')

@section('content')


    @include('continent.create')

    @foreach ($list as $item)

        @include('continent.edit')

    @endforeach

    <div class="col-md-12" align="right" style="margin-bottom: 11px;margin-top: 11px;">
        <a data-toggle="modal" data-target="#create" href="#" class="btn btn-sm btn-primary">+ Continent</a>
    </div>
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
                        <form style="display: inline-block;" onsubmit="return confirm('Do you want to remove this record?');" action="{{ route('continent.destroy',[$item->id]) }}" method="post">
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