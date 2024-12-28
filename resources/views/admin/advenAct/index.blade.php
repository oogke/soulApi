<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c5a4938a4c.js" crossorigin="anonymous"></script>  

    <title>Manage adventure</title>
    <style>
#tableDiv
{
    overflow-x: auto;
   max-width: 100%;
   white-space: nowrap;
}
#create-btn {
            margin: 10px 20px 50px 30px;
            width: 150px;
            height: 40px;
            color: white;
            font-size: 20px;
            text-decoration: none;
        }
        h1{
            text-align: center;
            font-family: cursive;
           margin-top: 30px;
           margin-bottom: 20px;
        
        }

    </style>
</head>
<body>

<div class="header">
        <h1 class="heading mt-2 ">Manage Adventure Activity</h1>




    </div>
    <a href="{{ Route('createAdventureActs')}}" ><button id="create-btn" class="btn btn-link btn-primary" >Create post</button></a>
    <div id="tableDiv">
   
 
   

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        
        function loadData()
        {
            var tableContent=`<table class="table table-striped table-hover table-bordered align-middle">
    <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Name</th>
      <th scope="col">District</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Duration</th>
      <th scope="col">Requirements</th>
      <th scope="col" width="300px">Image1</th>
      <th scope="col" width="3000px">Image2</th>
      <th scope="col" width="300px">Image3</th>
      <th scope="col" width="3000px">Image4</th>
      <th scope="col" width="300px">Image5</th>
      <th scope="col">Is seasonal?</th>
      <th scope="col">Best Season</th>
      <th scope="col">Location</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Website</th>
       <th scope="col">view</th>
      <th scope="col">Delete</th>
      <th scope="col">update</th>
    </tr>
  </thead>
  <tbody></tbody>`;
            const token=localStorage.getItem("token");
            const tableDiv = document.getElementById('table-div');
fetch('/api/advenacts',{
    method: "GET",
    headers:
    {
       'Authorization':`Bearer ${token}`
    }
}).then(response=>{return response.json(response)}).then(data=>
{
    const tableDiv=document.getElementById("tableDiv");
    const advenacts=data.data;
    const n=0;
    advenacts.forEach(advenact => {
        tableContent+=`
    <tr height="200px">
      <th scope="row">${n++}</th>
    <td>${advenact.name}</td>
    <td>${advenact.district}</td>
    <td>${advenact.description}</td>
    <td>${advenact.price}</td>
    <td>${advenact.duration}</td>
    <td>${advenact.requirements}</td>
    <td><img src="uploads/advenact/${advenact.image1}" alt=""></td>
    <td><img src="uploads/advenact/${advenact.image2}" alt=""></td>
    <td><img src="uploads/advenact/${advenact.image3}" alt=""></td>
    <td><img src="uploads/advenact/${advenact.image4}" alt=""></td>
    <td><img src="uploads/advenact/${advenact.image5}" alt=""></td>
    <td>${advenact.is_seasonal}</td>
    <td>${advenact.best_season}</td>
    <td>${advenact.location}</td>
    <td>${advenact.email}</td>
    <td>${advenact.phone}</td>
    <td>${advenact.website}</td>
    <td><a href="" id="view-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#singlePostModal" data-bs-postid="${advenact.id}">view</a></td>
      <td><a href="" id="delete-btn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-bs-postid="${advenact.id}">Delete</a></td>
      <td><a href="" id="edit-btn" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatemodal" data-bs-postid="${advenact.id}">Update</a></td>
    </tr>`;

});
tableContent+=`  </tbody>
</table>`;
tableDiv.innerHTML=tableContent;
    });


        }
        loadData();
    </script>
</body>
</html>