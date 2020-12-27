<form action="{{ route('country.store') }}" method="post">
<!-- Modal -->
    @csrf
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Country</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                {{--continents--}}

                <div class="col-md-12">
                    <label for="">Select Continent</label>
                </div>
                <div class="col-md-12">
                    <select readonly name="continent_id" class="form-control" id="">
                        <option value="">--Select--</option>
                        @foreach ($continents as $continent)
                            <option {{ ( request()->filled('continent_id') && $continent->id == request('continent_id'))? 'selected':'' }} value="{{ $continent->id }}">{{ $continent->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col-md-12">
                    <label for="">Name</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="name" placeholder="Country Name" />
                </div>

                <div class="col-md-12">
                    <label for="">Lat-Lng</label>
                </div>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="latlng" placeholder="Lat - Long" />
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</form>