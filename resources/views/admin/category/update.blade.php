<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c5a4938a4c.js" crossorigin="anonymous"></script>  

    <title>Category Create</title>
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
    <h1>Insert category</h1>
  <div class="mb-3">
    <label for="exampleInputCategory" class="form-label">Category</label>
    <input type="email" class="form-control" id="exampleInputCategory" aria-describedby="emailHelp" name="category">
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
  const category = document.getElementById("exampleInputCategory").value;
  const formData = new FormData();
  formData.append('category', category);

  fetch('/api/categories', {
        method: 'POST',
        body: formData
    }).then(response => {
        if (response.ok) {
            alert('Category added successfully!');
        } else {
            alert('Failed to add category. Please try again.');
        }
    }).catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    });
});
    </script>
</body>
</html>