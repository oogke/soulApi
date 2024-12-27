<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/c5a4938a4c.js" crossorigin="anonymous"></script>
  <title>District Create</title>
  <style>
    form {
      width: 600px;
      margin: auto;
      margin-top: 90px;
      border: 2px solid gray;
      padding: 40px;
      border-radius: 20px;
    }

    form h1 {
      text-align: center;
      font-family: cursive;
      background-color: rgb(220, 220, 220);
      margin-bottom: 20px;

    }
  </style>
</head>

<body>

  <form>
    <h1>Insert adventures</h1>
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
      <input type="text" class="form-control" id="exampleInputDescription" aria-describedby="emailHelp"
        name="description">
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
      <label for="exampleInputPrice" class="form-label">Price</label>
      <input type="text" class="form-control" id="exampleInputPrice" aria-describedby="emailHelp" name="price">
    </div>
    <div class="mb-3">
      <label for="exampleInputDuration" class="form-label">Duration</label>
      <input type="text" class="form-control" id="exampleInputDuration" aria-describedby="emailHelp" name="duration">
    </div>
    <div class="mb-3">
      <label for="exampleInputRequirements" class="form-label">Requirements</label><i class="fa-solid fa-circle-plus"
        id="addrequirements"></i>
      <div id="requirements">

      </div>
    </div>
    <div class="mb-3">
      <h3>Is seasonal?</h3>
      <label for="exampleInputIs_seasonal" class="form-label">True</label>
      <input type="radio" class="form-radio-input" id="exampleInputIs_seasonal" aria-describedby="emailHelp"
        name="is_seasonal" value="true">

      <label for="exampleInputIs_seasonal" class="form-label">False</label>
      <input type="radio" class="form-radio-input" id="exampleInputIs_seasonal" aria-describedby="emailHelp"
        name="is_seasonal" value="false">
    </div>
    <div class="mb-3">
      <label for="exampleInputBestSeason" class="form-label">Best Season</label><i class="fa-solid fa-circle-plus"
        id="addSeasons"></i>
      <div id="BestSeasons">

      </div>
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail" class="form-label">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="email">
    </div>
    <div class="mb-3">
      <label for="exampleInputWebsite" class="form-label">Website</label>
      <input type="text" class="form-control" id="exampleInputWebsite" aria-describedby="emailHelp" name="website">
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
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
  <script>
    const addSeasons = document.getElementById("addSeasons");
    const BestSeasons = document.getElementById("BestSeasons");
    const addrequirements = document.getElementById("addrequirements");
    const requirements = document.getElementById("requirements");
    addSeasons.addEventListener("click", function (event) {
      event.preventDefault();
      BestSeasons.innerHTML += `<input type="text" class="form-control mb-3" id="exampleInputBestSeasons" aria-describedby="emailHelp" name="BestSeasons">`;
    });
    addrequirements.addEventListener("click", function (event) {
      event.preventDefault();
      requirements.innerHTML += `<input type="text" class="form-control mb-3" id="exampleInputRequirements" aria-describedby="emailHelp" name="requirements">`;
    });
  </script>
</body>

</html>