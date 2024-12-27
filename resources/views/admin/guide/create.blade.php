<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c5a4938a4c.js" crossorigin="anonymous"></script>  

    <title>Guides Create</title>
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
    <h1>Insert Guides Details</h1>
    <div class="mb-3">
    <label for="exampleInputFirstname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="exampleInputFirstname" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputLastname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="exampleInputLastname" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="exampleInputAddress" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPhone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="exampleInputPhone" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputdob" class="form-label">Date of Birth</label>
    <input type="text" class="form-control" id="exampleInputdob" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputCountry" class="form-label">Country</label>
    <input type="text" class="form-control" id="exampleInputCountry" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputLanguages" class="form-label">Languages</label><i class="fa-solid fa-circle-plus" id="addLanguages"></i>
    <div id="languagediv">

    </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputWebsites" class="form-label">Websites</label>
    <input type="text" class="form-control" id="exampleInputWebsites" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleProfile" class="form-label">Profile</label>
    <input type="file" class="form-control" id="exampleProfile" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleCV" class="form-label">CV</label>
    <input type="file" class="form-control" id="exampleCV" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="CitizenshipcardNo" class="form-label">Citizenship Card Number</label>
    <input type="file" class="form-control" id="CitizenshipcardNo" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="CitizenshipcardFront" class="form-label">Citizenship Card(Front)</label>
    <input type="file" class="form-control mb-3" id="CitizenshipcardFront" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="Citizenshipcardback" class="form-label">Citizenship Card(Back)</label>
    <input type="file" class="form-control" id="Citizenshipcardback" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleCertificate" class="form-label">Governmental Guide Certificate</label>
    <input type="file" class="form-control" id="exampleCertificate" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="Experiences" class="form-label">Experiences</label><i class="fa-solid fa-circle-plus" id="addExperiences"></i>
    <div id="experiences">

    </div>
  </div>

  
  <button type="submit" class="btn btn-success">Submit</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
    const addLanguages = document.getElementById("addLanguages");
    const languagediv = document.getElementById("languagediv");
    const addExperiences = document.getElementById("addExperiences");
    const experiences = document.getElementById("experiences");
    addLanguages.addEventListener("click", function (event) {
      event.preventDefault();
      languagediv.innerHTML +=`<input type="text" class="form-control mb-3" id="languages" aria-describedby="emailHelp">`;
    });
    addExperiences.addEventListener("click", function (event) {
      event.preventDefault();
      experiences.innerHTML +=`<input type="text" class="form-control mb-3" id="Experiences" aria-describedby="emailHelp">`;
    });
  </script>
  </body>
</html>