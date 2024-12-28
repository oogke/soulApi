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
    <h1>Insert District</h1>
  <div class="mb-3">
    <label for="exampleInputDistricts" class="form-label">District</label>
    <input type="email" class="form-control" id="exampleInputDistricts" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputProvince" class="form-label">Province</label>
    <input type="password" class="form-control" id="exampleInputProvince" name="district">
  </div>
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Description</label>
    <input type="password" class="form-control" id="exampleInputDescription" name="description">
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
  const district = document.getElementById("exampleInputDistricts").value;
    const province = document.getElementById("exampleInputProvince").value;
    const description = document.getElementById("exampleInputDescription").value;
    const formData = new FormData();
    formData.append('district', district);
    formData.append('province', province);
    formData.append('description', description);
    console.log(formData);
    // fetch('/api/districts', {
    //     method: 'POST',
    //     headers: {
    //         'Authorization': `Bearer ${token}`  // Attach token from localStorage
    //     },
    //     body: formData
    // }).then(response => {
    //     if (response.ok) {
    //         alert('District added successfully!');
    //         window.location.reload();  // Refresh or redirect if needed
    //     } else {
    //         alert('Failed to add district. Please try again.');
    //     }
    // }).catch(error => {
    //     console.error('Error:', error);
    //     alert('An error occurred. Please try again.');
    // });
  
});
    </script>
</body>
</html>