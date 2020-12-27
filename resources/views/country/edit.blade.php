<form action="{{ route('country.update',[$item->id]) }}" method="post">
    <!-- Modal -->
    @csrf
    @method('PUT')

    <div id="edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Country</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    {{--continents--}}

                    <div class="col-md-12">
                        <label for="">Select Continent</label>
                    </div>
                    <div class="col-md-12">
                        <select disabled readonly required name="continent_id" class="form-control" id="">
                            <option value="">--Select--</option>
                            @foreach ($continents as $continent)
                                <option {{ ($continent->id == $item->continent_id)? 'selected':'' }} value="{{ $continent->id }}">{{ $continent->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-12">
                        <label for="">Name</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" type="text" name="name" placeholder="Country Name" value="{{ $item->name }}" />
                    </div>

                    <div class="col-md-12">
                        <label for="">Lat-Lng</label>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" type="text" name="latlng" placeholder="Lat - Long" value="{{ $item->latlng }}" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>