<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c5a4938a4c.js" crossorigin="anonymous"></script>  
    <title>District Create</title>
    <style>
        form
        {
            width:600px;
            margin: auto;
            margin-top: 90px;
            border: 2px solid gray;
            padding: 40px;
            border-radius: 20px;
        }
        form h1{
            text-align: center;
            font-family: cursive;
            background-color: rgb(220,220, 220);
           margin-bottom: 20px;
        
        }
    </style>
</head>
<body>
    
<form>
    <h1>Insert Cafes</h1>
    <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp"  name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputDistrict" class="form-label">District</label>
    <input type="text" class="form-control" id="exampleInputDistrict" aria-describedby="emailHelp" name="district">
  </div>
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Description</label>
    <input type="text" class="form-control" id="exampleInputDescription" aria-describedby="emailHelp" name="description">
  </div>
  <div class="mb-3">
    <label for="exampleInputLocation" class="form-label">Location</label>
    <input type="text" class="form-control" id="exampleInputLocation" aria-describedby="emailHelp" name="location">
  </div>
  <div class="mb-3">
    <label for="exampleInputPhone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="exampleInputPhone" aria-describedby="emailHelp" name="phone">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputWebsites" class="form-label">Website</label>
    <input type="text" class="form-control" id="exampleInputWebsites" aria-describedby="emailHelp" name="website">
  </div>
  <div class="mb-3">
    <label for="exampleImage1" class="form-label">Image1</label>
    <input type="file" class="form-control" id="image1" aria-describedby="emailHelp" name="image1">
  </div>
  <div class="mb-3">
    <label for="exampleImages" class="form-label">Image2</label>
    <input type="file" class="form-control" id="image2" aria-describedby="emailHelp" name="image2">
  </div>
  <div class="mb-3">
    <label for="exampleImage3" class="form-label">Image3</label>
    <input type="file" class="form-control" id="image3" aria-describedby="emailHelp" name="image3">
  </div>
  <div class="mb-3">
    <label for="exampleImage4" class="form-label">Image4</label>
    <input type="file" class="form-control" id="image4" aria-describedby="emailHelp" name="image4">
  </div>
  <div class="mb-3">
    <label for="exampleImage5" class="form-label">Image5</label>
    <input type="file" class="form-control" id="image5" aria-describedby="emailHelp" name="image5">
  </div>
  <button type="submit" class="btn btn-success" id="submit-btn">Submit</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
          const token=localStorage.getItem("token");
          const submitBtn= document.getElementById("submit-btn");
          submitBtn.addEventListener("click",function(event)
{
  event.preventDefault();

  const name = document.getElementById("exampleInputName").value;
const district = document.getElementById("exampleInputDistrict").value;
const description = document.getElementById("exampleInputDescription").value;
const location = document.getElementById("exampleInputLocation").value;
const phone = document.getElementById("exampleInputPhone").value;
const email = document.getElementById("exampleInputEmail").value;
const website = document.getElementById("exampleInputWebsites").value;

const image1 = document.getElementById("image1").files[0];
const image2 = document.getElementById("image2").files[0];
const image3 = document.getElementById("image3").files[0];
const image4 = document.getElementById("image4").files[0];
const image5 = document.getElementById("image5").files[0];

// Create FormData to append values
const formData = new FormData();
formData.append('name', name);
formData.append('district', district);
formData.append('description', description);
formData.append('location', location);
formData.append('phone', phone);
formData.append('email', email);
formData.append('website', website);

if (image1) formData.append('image1', image1);
if (image2) formData.append('image2', image2);
if (image3) formData.append('image3', image3);
if (image4) formData.append('image4', image4);
if (image5) formData.append('image5', image5);

console.log(formData);


fetch("/api/cafes",{
  method: "POST",
  headers:{
    'Authorization':`Bearer ${token}`
  },body:formData
}).then(response=>{
  return response.json();
}).then(data=>{
  console.log(data);
});

});
    </script>
</body>
</html>