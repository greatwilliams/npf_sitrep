<!DOCTYPE html>
<html>
<head>
    <title>Dependent Dropdowns</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Select Location</h1>

    <div>
        <label for="state">State:</label>
        <select id="state" name="state">
            <option value="">Select State</option>
            @foreach ($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach
        </select>
    </div>

    <div style="margin-top: 20px;">
        <label for="city">City:</label>
        <select id="city" name="city" disabled>
            <option value="">Select City</option>
        </select>
    </div>

    <script>
        $(document).ready(function() {
            $('#state').on('change', function() {
                var stateId = $(this).val();
                if (stateId) {
                    $.ajax({
                        url: "{{ route('locations.get_cities') }}",
                        type: "GET",
                        data: { state_id: stateId },
                        dataType: "json",
                        success: function(data) {
                            $('#city').empty();
                            $('#city').append('<option value="">Select City</option>');
                            if (data.length > 0) {
                                $.each(data, function(key, value) {
                                    $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                                $('#city').prop('disabled', false);
                            } else {
                                $('#city').prop('disabled', true);
                            }
                        }
                    });
                } else {
                    $('#city').empty();
                    $('#city').append('<option value="">Select City</option>');
                    $('#city').prop('disabled', true);
                }
            });
        });
    </script>
</body>
</html>