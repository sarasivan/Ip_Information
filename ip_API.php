<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IP Info</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<style>
/* Custom CSS for gradient background */
.table-gradient {
    background: linear-gradient(to right, #f7ac06, #ff5252); /* Adjust colors as needed */
    color: white;
}

/* Fade-in animation */
@keyframes fade-in {
    0% { opacity: 0; }
    100% { opacity: 1; }
}

.fade-in {
    animation: fade-in 0.5s ease-in-out forwards;
}
</style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">IP Information</h2>
    <form id="searchForm">
        <div class="form-group">
            <input type="text" class="form-control" id="ipAddress" name="ipAddress" placeholder="Enter IP Address">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <table class="table table-striped table-bordered mt-4 table-gradient" id="ipInfoTable" style="display: none;">
        <tr>
            <td>IP:</td>
            <td><span id="ip"></span></td>
        </tr>
        <tr>
            <td>Hostname:</td>
            <td><span id="hostname"></span></td>
        </tr>
        <tr>
            <td>City:</td>
            <td><span id="city"></span></td>
        </tr>
        <tr>
            <td>Region:</td>
            <td><span id="region"></span></td>
        </tr>
        <tr>
            <td>Country:</td>
            <td><span id="country"></span></td>
        </tr>
        <tr>
            <td>Location:</td>
            <td><span id="loc"></span></td>
        </tr>
        <tr>
            <td>Organization:</td>
            <td><span id="org"></span></td>
        </tr>
        <tr>
            <td>Postal Code:</td>
            <td><span id="postal"></span></td>
        </tr>
        <tr>
            <td>Timezone:</td>
            <td><span id="timezone"></span></td>
        </tr>
    </table>
</div>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $('#searchForm').submit(function(event) {
        event.preventDefault();
        var ipAddress = $('#ipAddress').val();
        if(ipAddress.trim() !== '') {
            $.ajax({
                url: 'https://ipinfo.io/' + ipAddress + '?token=7788978aacbb74',
                dataType: 'json',
                success: function(data){
                    $('#ip').text(data.ip);
                    $('#hostname').text(data.hostname);
                    $('#city').text(data.city);
                    $('#region').text(data.region);
                    $('#country').text(data.country);
                    $('#loc').text(data.loc);
                    $('#org').text(data.org);
                    $('#postal').text(data.postal);
                    $('#timezone').text(data.timezone);
                    $('#ipInfoTable').addClass('fade-in').css('display', 'table');
                }
            });
        } else {
            alert("Please enter an IP address");
        }
    });
});
</script>


</body>
</html>
