
@if($errors->any())

    <div class="row">
        <div class="col-md-10">
            <div class="alert alert-danger">

                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach

            </div>
        </div>
    </div>
@endif