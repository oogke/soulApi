<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c5a4938a4c.js" crossorigin="anonymous"></script>  

    <title>VehicleHub Create</title>
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
    <h1>Insert VehicleHubs</h1>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="name">
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
    <label for="exampleInputVehicles" class="form-label">Vehicles</label><i class="fa-solid fa-circle-plus" id="addVehicles"></i>
    <div id="vehicles">
    </div> 
  </div>
  <div class="mb-3">
    <label for="exampleImage1" class="form-label">Image1</label>
    <input type="file" class="form-control" id="exampleImage1" aria-describedby="emailHelp" name="image1">
  </div>
  <div class="mb-3">
    <label for="exampleImages" class="form-label">Image2</label>
    <input type="file" class="form-control" id="exampleImage2" aria-describedby="emailHelp" name="image2">
  </div>
  <div class="mb-3">
    <label for="exampleImage3" class="form-label">Image3</label>
    <input type="file" class="form-control" id="exampleImage3" aria-describedby="emailHelp" name="image3">
  </div>
  <div class="mb-3">
    <label for="exampleImage4" class="form-label">Image4</label>
    <input type="file" class="form-control" id="exampleImage4" aria-describedby="emailHelp" name="image4">
  </div>
  <div class="mb-3">
    <label for="exampleImage5" class="form-label">Image5</label>
    <input type="file" class="form-control" id="exampleImage5" aria-describedby="emailHelp" name="image5">
  </div>


  <button type="submit" class="btn btn-success" id="submit-btn">Submit</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
const addVehicles=document.getElementById("addVehicles");
const vehicles=document.getElementById("vehicles");
addVehicles.addEventListener("click",function(event)
{
  event.preventDefault();
  vehicles.innerHTML+=`<input type="text" class="form-control mb-3" id="exampleInputVehicles" aria-describedby="emailHelp" name="vehicles[]">  
`;
});
const token=localStorage.getItem("token");
          const submitBtn= document.getElementById("submit-btn");
          submitBtn.addEventListener("click",function(event)
{
  event.preventDefault();

    // Create a FormData object
    const formData = new FormData();

    // Manually append form data
    formData.append("name", document.getElementById("exampleInputName").value);
    formData.append("district", document.getElementById("exampleInputDistrict").value);
    formData.append("description", document.getElementById("exampleInputDescription").value);
    formData.append("location", document.getElementById("exampleInputLocation").value);
    formData.append("phone", document.getElementById("exampleInputPhone").value);
    formData.append("email", document.getElementById("exampleInputEmail").value);
    formData.append("website", document.getElementById("exampleInputWebsites").value);
    formData.append("image1", document.getElementById("exampleImage1").files[0]);
    formData.append("image2", document.getElementById("exampleImage2").files[0]);
    formData.append("image3", document.getElementById("exampleImage3").files[0]);
    formData.append("image4", document.getElementById("exampleImage4").files[0]);
    formData.append("image5", document.getElementById("exampleImage5").files[0]);

    // Collect vehicles data
    const vehicleArray = document.querySelectorAll('input[name="vehicles[]"]');
    for (let i = 0; i < vehicleArray.length; i++) {
        formData.append('vehicles[]', vehicleArray[i].value);
    }
    console.log(formData);

    // Send POST request with form data and authorization token
    // fetch('YOUR_API_ENDPOINT', {
    //     method: 'POST',
    //     headers: {
    //         'Authorization': `Bearer ${token}`,
    //     },
    //     body: formData
    // })
    // .then(response => response.json())
    // .then(data => {
    //     // Handle the response from the server
    //     if (data.success) {
    //         alert("VehicleHub added successfully!");
    //     } else {
    //         alert("Failed to add VehicleHub.");
    //     }
    // })
    // .catch(error => {
    //     console.error('Error:', error);
    //     alert("An error occurred while submitting.");
    // });
  
});
    </script>
</body>
</html>