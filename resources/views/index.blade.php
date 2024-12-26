<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Home Page</title>
    <style>
        .btn{
margin-top: 30px;
margin-left: 40px;
        }
    </style>
</head>
<body>
    
<a href="{{ route('registerView')}}"><button class="btn  btn-warning a">Register</button></a>
    <a href="{{ route('loginView')}}"><button class="btn  btn-dark a">Login</button></a>
   <button class="btn  btn-danger a" id="logout-btn">logout</button>
   <a href="{{route('emailVerify')}}">Send Email</a>
   <hr>
   
 
   <div class="btns">
<a href="{{ route('manageDistricts')}}"><button class="btn  btn-danger a">Districts</button></a>
<br><a href="{{ route('managePlaces')}}"><button class="btn  btn-dark a">Places</button></a>
<br><a href="{{ route('manageHotels')}}"><button class="btn  btn-danger a">Hotels</button></a>
<br><a href="{{ route('manageRestaurants')}}"><button class="btn  btn-primary a">Restaurants</button></a>
<br><a href="{{ route('manageCafes')}}"><button class="btn  btn-secondary a">Cafes</button></a>
<br><a href="{{ route('manageEvents')}}"><button class="btn  btn-info a">Events</button></a>
<br><a href="{{ route('manageGuides')}}"><button class="btn  btn-success a">Guides</button></a>
<br><a href="{{ route('manageVehicleHub')}}"><button class="btn  btn-light a">VehicleHub</button></a>
<br><a href="{{ route('manageCategories')}}"><button class="btn  btn-warning a">Categories</button></a>
<br><a href="{{ route('manageAdventureActs')}}"><button class="btn  btn-secondary a">Adventure Acts</button></a>
<br><a href="{{ route('manageUsers')}}"><button class="btn  btn-danger a">Users</button></a>
<br><a href="{{ route('manageHomestay')}}"><button class="btn  btn-success a">Homestay</button></a>

</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
       const logout = document.getElementById('logout-btn');
logout.addEventListener('click', function (event) {
    event.preventDefault();
    const token = localStorage.getItem('token');
    fetch('/api/logout', {
        method: "POST",
        headers: {
            'Authorization': `Bearer ${token}`
        }
    }).then(response => {
        return response.json();
    }).then(data => {
        // If you have some conditions, you can check like:
        // if (data.status == true && data.message == "You logged out successfully") {
        window.location.href = "/loginView";
        // }
    }).catch(err => {
        console.log(err);
    });
});


    </script>
</body>
</html>