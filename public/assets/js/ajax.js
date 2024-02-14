$(document).ready(function() {
    $('#ajaxButton').click(function() {
        $.ajax({
            url: "{{ route('ajax.example') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                // Add any additional data you want to send with the request
            },
            success: function(response) {
                console.log(response.message);
                // Handle success response
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                // Handle error response
            }
        });
    });
});
