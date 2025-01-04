<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Hachi+Maru+Pop&family=Jaro:opsz@6..72&family=Pacifico&family=Yuji+Mai&display=swap" rel="stylesheet">  <title>Home Page</title>
    <style>
        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .navbar{
            height: 90px;
            background-color: #E4DFDA;
         
        }
        #logo
        {
            width: 70px;
            height: 70px;   
            border-radius: 19px;
        }
        

.nav-item{
 margin-left: 20px;


}
.nav-link
{
    color: black;
     font-size: 0.9rem;
     font-weight: bold;
     /* font-family: "Yuji Mai", serif; */
     /* font-family: "Jaro", serif; */
     /* font-family: "Pacifico", cursive; */
     font-family: "Hachi Maru Pop", serif;
   
}
#search-bar{
    font-family: "Hachi Maru Pop", serif; 
    width: 280px;
}
#search-input::placeholder
{
    font-size: 0.8rem;
    font-family: "Yuji Mai", serif;
    font-weight: bold;
}
.dropdown-menu
{
    font-family: "Hachi Maru Pop", serif;
    border-radius: 10px;
    background-color:;
}
.dropdown-item:hover
{
    background-color: #E4DFDA;
}
#carouselExampleAutoplaying
{
    width: 90%;
    margin: auto;
   margin-top: 20px;
   border-radius: 20px;
}
#carouselExampleAutoplaying, .carousel-item, img
{
    height: 900px;
    border-radius: 20px;
}
#places
        {
            width: 100%;
         height: 500px;  
         display: flex;
         flex-direction: row; 
         justify-content:space-between;
      
         overflow-x: auto; 
         white-space: nowrap;
        }
    
        .card{
        height: 450px;
          display: inline-block; 
          flex: 0 0 30%;
        margin-right: 20px; 
        overflow-y: scroll;   
        }
        .card img{
          width: 100%;
          height:60%;
          object-fit: cover;

         
        }
        /* .card-text {
            word-wrap: break-word; /* This ensures the text wraps */
     /*  } */
     .heading{
     font-family: "Pacifico", cursive;
     font-size: 40px;
margin: 30px 0 10px 30px;

     }
     #notification{
      width: 100%;
      height: 200px;
      border: 1px solid black;
     }
     
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary container-fluid">
  <div class="container-fluid">
   <img src="{{ asset('images/logo.jpg') }}" alt="" id="logo">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('managePlaces')}}">Places</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="{{route('manageAdventureActs')}}">Advenact</a>
        </li>   
   
   
        <li class="nav-item">
          <a class="nav-link" href="{{route('manageVehicleHub')}}">Vehiclehub</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('manageRestaurants')}}">Restaurants</a>
        </li>
       
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Available Services
          </a>
          <ul class="dropdown-menu">


     <li class="nav-item">
          <a class="nav-link" href="{{route('manageHotels')}}">Hotels</a>
        </li>
     

              <li class="nav-item">
          <a class="nav-link" href="{{route('manageEvents')}}">Events</a>
        </li> 
     <li class="nav-item">
          <a class="nav-link" href="{{route('manageGuides')}}">Guides</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="{{route('manageHomestay')}}">Homestay</a>
        </li> 
 <li class="nav-item">
          <a class="nav-link" href="{{route('manageCafes')}}">Cafe</a>
        </li>
           <li class="nav-item">
          <a class="nav-link" href="{{route('manageCategories')}}">Category</a>
        </li>
            <li><a class="dropdown-item border-bottom" href="#">Currency Conversion</a></li>
            <li><a class="dropdown-item border-bottom" href="#">Map</a></li> 
            <li><a class="dropdown-item border-bottom" href="#">Weather</a></li>
            <li><a class="dropdown-item border-bottom" href="{{ route('loginView')}}">login</a></li>
            <li><a class="dropdown-item border-bottom" href="{{ route('registerView')}}">register</a></li>
            <li><a class="dropdown-item" href="">Dashboard</a></li> 
            <li class="nav-item">
          <a class="nav-link" href="{{route('manageDistricts')}}">District</a>
        </li>
          </ul>
        </li>
       
      </ul>
      <form class="d-flex" role="search" id="search-bar">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search-input">
        <button class="btn btn-outline-dark" type="submit" id="search-btn">Search</button>
      </form>
    </div>
  </div>
</nav>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('images/hote19.jpg')}}" class="d-block w-100 img-cover" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/vah3.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/veh9.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/veh6.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/home8.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/home9.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/home11.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/hote1.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/hote4.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/hote5.jpg')}}" class="d-block w-100" alt="...">
    </div>
   
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<h3 class="heading">Places</h3>
<section id="places" class="py-2">
<div class="card">
  <img src="{{ asset('images/even3.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card">
  <img src="{{ asset('images/even4.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card">
  <img src="{{ asset('images/even7.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/even5.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/even10.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/even11.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/even12.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/even13.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/even9.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/even7.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card t
      hello tot he ewpioweufiofnsjfdsgjkdghvjdkvjkdfvitle and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/even1.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    </section>

    <h1 class="heading">Events</h1>
<section id="places" class="py-2">
<div class="card">
  <img src="{{ asset('images/hote1.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card">
  <img src="{{ asset('images/hote4.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card">
  <img src="{{ asset('images/hote5.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/hote6.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/hote7.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/hote9.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/hote11.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/hote12.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/hote13.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/hote15.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card t
      hello tot he ewpioweufiofnsjfdsgjkdghvjdkvjkdfvitle and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/hote16.jpg')}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text text-wrap">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>