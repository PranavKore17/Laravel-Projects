<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laravel DropDown</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h2>Laravel DropDown</h2>
                <form action="">
                    <div class="form-group mb-3">
                        <select id="country_dd" class="form-control">
                            <option value="">Select Country</option>
                            @foreach ($countries as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group mb-3">
                        <select id="state_dd" class="form-control">
                            {{-- <option value="">Select State</option> --}}
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <select id="city_dd" class="form-control">
                            {{-- <option value="">Select City</option> --}}
                        </select>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#country_dd').change(function(event) {
                var idCountry = this.value;
                //alert(idCountry);
                $('#state_dd').html('');

                $.ajax({
                    url: {{ url( route('fetch-state')) }},
                    type: 'POST',
                    datatype: 'json',
                    data:{country_id: idCountry, _token:"{{ csrf_token() }}"},
                    success: function(response){
                        alert('response.status');
                        $('#state_dd').html(response.html);
                        $('#city_dd').html('<option value="">Select City</option>');

                    }
                });
            });
        });
    </script>
</body>

</html>
