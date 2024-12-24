<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
    <h1>Insert District</h1>
    <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Description</label>
    <input type="text" class="form-control" id="exampleInputDescription" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputLocation" class="form-label">Location</label>
    <input type="text" class="form-control" id="exampleInputLocation" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputCategory" class="form-label">Category</label>
    <input type="text" class="form-control" id="exampleInputCategory" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputOrganizer" class="form-label">Organizer</label>
    <input type="text" class="form-control" id="exampleInputOrganizer" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputTicketPrice" class="form-label">Ticket Price</label>
    <input type="text" class="form-control" id="exampleInputTicketPrice" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputSdate" class="form-label">Start Date</label>
    <input type="date" class="form-control" id="exampleInputSdate" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEdate" class="form-label">End Date</label>
    <input type="date" class="form-control" id="exampleInputEdate" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputStime" class="form-label">Start Time</label>
    <input type="time" class="form-control" id="exampleInputStime" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEtime" class="form-label">End Time</label>
    <input type="time" class="form-control" id="exampleInputEtime" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPhone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="exampleInputPhone" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleImages" class="form-label">Images</label>
    <input type="file" class="form-control" id="exampleImages" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>