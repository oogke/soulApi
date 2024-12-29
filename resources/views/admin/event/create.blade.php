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
    <h1>Insert Events</h1>
    <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
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
      const submitBtn= document.getElementById("submit-btn");
      const token=localStorage.getItem("token");
      submitBtn.addEventListener("click",function(event)
      {
  event.preventDefault();

  const name = document.getElementById("exampleInputName").value;
            const district = document.getElementById("exampleInputDistrict").value;
            const description = document.getElementById("exampleInputDescription").value;
            const location = document.getElementById("exampleInputLocation").value;
            const category = document.getElementById("exampleInputCategory").value;
            const organizer = document.getElementById("exampleInputOrganizer").value;
            const ticketPrice = document.getElementById("exampleInputTicketPrice").value;
            const sdate = document.getElementById("exampleInputSdate").value;
            const edate = document.getElementById("exampleInputEdate").value;
            const stime = document.getElementById("exampleInputStime").value;
            const etime = document.getElementById("exampleInputEtime").value;
            const phone = document.getElementById("exampleInputPhone").value;
            const email = document.getElementById("exampleInputEmail").value;
            const image1 = document.getElementById("exampleImage1").files[0];
            const image2 = document.getElementById("exampleImage2").files[0];
            const image3 = document.getElementById("exampleImage3").files[0];
            const image4 = document.getElementById("exampleImage4").files[0];
            const image5 = document.getElementById("exampleImage5").files[0];

            // Create FormData and append all fields
           
            const formData = new FormData();
            formData.append('name', name);
            formData.append('district', district);
            formData.append('description', description);
            formData.append('location', location);
            formData.append('category', category);
            formData.append('organizer', organizer);
            formData.append('ticket_price', ticketPrice);
            formData.append('start_date', sdate);
            formData.append('end_date', edate);
            formData.append('start_time', stime);
            formData.append('end_time', etime);
            formData.append('phone', phone);
            formData.append('email', email);
            formData.append('image1', image1);
            formData.append('image2', image2);
            formData.append('image3', image3);
            formData.append('image4', image4);
            formData.append('image5', image5);
            console.log(formData);

           
            fetch('/api/events', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                body: formData
            }).then(response => {
                if (response.ok) {
                    alert('Event added successfully!');
                } else {
                    alert('Failed to add event. Please try again.');
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
});
    </script>
</body>
</html>