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
#addForm{
  display: flex;
  flex-direction: column;
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

    <!-- view Modal -->
    <div class="modal fade" id="singlePostModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="singlePostLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="singlePostLabel">Single Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
   <!-- view Modal -->

    <!-- delete Modal -->
    <div class="modal fade" id="DeleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <div class="single-data" width="100%" height="100%">
Are you sure you want to delete?
     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
        <button type="button" class="btn btn-primary" id="deleteBtn">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- delete Modal -->
   
  <!-- update Modal -->
  <div class="modal fade" id="updatemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="updateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  hello
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- update Modal -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        const token=localStorage.getItem("token");


        //index data
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
    let n=1;
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
    <td><img src="uploads/advenact/${advenact.image1}" alt="" width="150px" height="150px"></td>
    <td><img src="uploads/advenact/${advenact.image2}" alt="" width="150px" height="150px"></td>
    <td><img src="uploads/advenact/${advenact.image3}" alt="" width="150px" height="150px"></td>
    <td><img src="uploads/advenact/${advenact.image4}" alt="" width="150px" height="150px"></td>
    <td><img src="uploads/advenact/${advenact.image5}" alt="" width="150px" height="150px"></td>
    <td>${advenact.is_seasonal}</td>
    <td>${advenact.best_season}</td>
    <td>${advenact.location}</td>
    <td>${advenact.email}</td>
    <td>${advenact.phone}</td>
    <td>${advenact.website}</td>
  
    <td><a href="" id="view-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#singlePostModal" data-bs-postid="${advenact.id}">view</a></td>
      <td><a href="" id="delete-btn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-bs-postid="${advenact.id}">Delete</a></td>
      <td><a href="" id="edit-btn" class="btn btn-warning"  data-bs-postid="${advenact.id}" data-bs-toggle="modal" data-bs-target="#updatemodal">Update</a></td>
    </tr>`;

}); 
tableContent+=`</tbody>
</table>`;
tableDiv.innerHTML=tableContent;
    });
        }       
                //index data


                //view modal
        const singleModal = document.getElementById('singlePostModal');
        if (singleModal) {
            singleModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var postid = button.getAttribute('data-bs-postid');
                const token = localStorage.getItem('token');
                fetch(`/api/advenact?id=${postid}`, {
                    method: "GET",
                    headers:
                    {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    return response.json();
                }
                ).then(data => {
                    const advenact = data.data[0];
                    console.log(advenact.requirements);
                    
                   const modalBody = document.querySelector('#singlePostModal .modal-body');
                   modalBody.innerHTML="";
                   modalBody.innerHTML= `
                 <b>Name:</b> ${advenact.name} <br>
                    <b>District:</b> ${advenact.district}<br>
                    <b>Description:</b> ${advenact.description}<br>
                    <b>Price:</b> ${advenact.price}<br>
                    <b>Duration:</b> ${advenact.duration}<br>
                    <b>Requirements:</b>`;

                   
                let requirements = JSON.parse(advenact.requirements);


modalBody.innerHTML+=`Age should be ${requirements.age} `;
modalBody.innerHTML+=`
                  <br>  
                   <img width="150px" height="150px" src="uploads/advenact/${advenact.image1}" />
                   <img width="150px" height="150px" src="uploads/advenact/${advenact.image2}" />
                   <img width="150px" height="150px" src="uploads/advenact/${advenact.image3}" />
                   <img width="150px" height="150px" src="uploads/advenact/${advenact.image4}" />
                   <img width="150px" height="150px" src="uploads/advenact/${advenact.image5}" />
                    <b>is seasonal?:</b> ${advenact.is_seasonal}<br>
                    <b>Best season:</b> ${advenact.best_season}<br>
                    <b>location:</b> ${advenact.location}<br>
                    <b>Email:</b> ${advenact.email}<br>
                    <b>phone :</b> ${advenact.phone}<br> 
                    <b>wesite:</b> ${advenact.website}<br>
                   `;
                }
             )
            .catch(err => {
                    console.log(err);
                }
            );
        });
    }
 //view modal


//delete modal
    const deleteModal = document.getElementById('DeleteModal'); 
     if (deleteModal) {
        deleteModal.addEventListener('show.bs.modal', function (event) {
                var Deletebutton = event.relatedTarget;
                var postid = Deletebutton.getAttribute('data-bs-postid');
                const token = localStorage.getItem('token');
                var deleteBtn= document.getElementById("deleteBtn");
                deleteBtn.addEventListener('click',function(event)
            {
event.preventDefault();
 fetch(`/api/advenacts/${postid}`,{
                    method: "DELETE",
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                }).then(response=>
                {
                    return response.json();
                }
                ).then(data=>{
                    if(data.success==true)
                {
                  window.location.href="/managePost";
                }
                 });
            })
                
             });
     }

     //delete modal

     //update modal
        const updateModal = document.getElementById('updatemodal');
        if (updateModal) {
            updateModal.addEventListener('show.bs.modal', function (event) {
                var updatebutton = event.relatedTarget;
                var postid = updatebutton.getAttribute('data-bs-postid');
                const token = localStorage.getItem('token');
                fetch(`/api/advenact?id=${postid}`, {
                    method: "GET",
                    headers:
                    {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json'
                    }
                }).then(response => {

                    return response.json();
                    // console.log(response);
                }
                )
                .then(data => {
                  
                    const advenact = data.data[0];
                   console.log(advenact);
                   const modalBody = document.querySelector('#updatemodal .modal-body');
                   modalBody.innerHTML="";
  modalBody.innerHTML= `
    <form action="" method="POST" enctype="multipart/form-data" id="addForm">
    <form>
    @csrf
    <h1>Insert adventures</h1> 
        <input type="hidden" name="postid" id="postid" value="${advenact.id}">

    <div class="mb-3">
      <label for="exampleInputName" class="form-label">Name</label>
      <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="name" value="${advenact.name}">
    </div>
    <div class="mb-3">
      <label for="exampleInputDistrict" class="form-label">District</label>
      <input type="text" class="form-control" id="exampleInputDistrict" aria-describedby="emailHelp" name="district" value="${advenact.district}">
    </div>
    <div class="mb-3">
      <label for="exampleInputDescription" class="form-label">Description</label>
      <input type="text" class="form-control" id="exampleInputDescription" aria-describedby="emailHelp"
        name="description" value="${advenact.description}">
    </div>
    <div class="mb-3">
      <label for="exampleInputLocation" class="form-label">Location</label>
      <input type="text" class="form-control" id="exampleInputLocation" aria-describedby="emailHelp" name="location" value="${advenact.location}">
    </div>
    <div class="mb-3">
      <label for="exampleInputPhone" class="form-label">Phone</label>
      <input type="text" class="form-control" id="exampleInputPhone" aria-describedby="emailHelp" name="phone" value="${advenact.phone}">
    </div>
    <div class="mb-3">
      <label for="exampleInputPrice" class="form-label">Price</label>
      <input type="text" class="form-control" id="exampleInputPrice" aria-describedby="emailHelp" name="price" value="${advenact.price}">
    </div>
    <div class="mb-3">
      <label for="exampleInputDuration" class="form-label">Duration</label>
      <input type="text" class="form-control" id="exampleInputDuration" aria-describedby="emailHelp" name="duration" value="${advenact.duration}">
    </div>
    <div class="mb-3">
      <label for="exampleInputRequirements" class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="${advenact.requirements}">Requirements</label>
       <div id="requirements">
       

      </div>
    </div>
    <div class="mb-3">
      <h3>Is seasonal?</h3>
      <label for="exampleInputIs_seasonal" class="form-label">True</label>
      <input type="radio" class="form-radio-input" id="exampleInputIs_seasonalTrue" aria-describedby="emailHelp"
        name="is_seasonal" value="1">

      <label for="exampleInputIs_seasonal" class="form-label">False</label>
      <input type="radio" class="form-radio-input" id="exampleInputIs_seasonalFalse" aria-describedby="emailHelp"
        name="is_seasonal" value="0">
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
      <input type="url" class="form-control" id="exampleInputWebsite" aria-describedby="emailHelp" name="website">
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
  `;
  document.getElementById('title').setAttribute('value', `${post.title}`);
  const form= document.getElementById('addForm');
  form.addEventListener('submit',function(event)
{
event.preventDefault();
const postid= document.getElementById('postid').value;
const titleValue= document.getElementById('title').value;
const descriptionValue= document.getElementById('description').value;
// const imageValue= document.getElementById('image').files[0];
const formData= new FormData();
formData.append('postid',postid);
formData.append('title',titleValue);
formData.append('description',descriptionValue);
if(!document.getElementById('image').files[0]=="")
{
    const imageValue= document.getElementById('image').files[0];
    formData.append('image',imageValue); 
}
fetch(`/api/advenacts/${postid}`,{
    method: "POST",
    headers:{
            'Authorization': `Bearer ${token}`,
            'X-HTTP-Method-Override':'PUT'
    },
    body: formData
}).then(response=>
{
  return response.json();
}
).then(data=>{
    if(data.success==true)
                {
                  window.location.href="/managePost";
                }
}).catch(err => {
                    console.log(err);
                });

});
})
.catch(err => {
                    console.log(err);
                }
            );
        });
    }

     //update modal
              

  loadData();
    </script>
</body>
</html>