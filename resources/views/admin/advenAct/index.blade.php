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

    <!-- Modal -->
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
   
    <div class="modal fade" id="DeleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <div class="single-data" width="100%" height="100%">

     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
        <button type="button" class="btn btn-primary" id="deleteBtn">Delete</button>
      </div>
    </div>
  </div>
</div>
   
  <!-- Modal -->
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        const token=localStorage.getItem("token");
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
            
           
  const tableDiv = document.getElementById('tableDiv');
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
      <td><a href="" id="edit-btn" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatemodal" data-bs-postid="${advenact.id}">Update</a></td>
    </tr>`;

});
tableContent+=`  </tbody>
</table>`;
tableDiv.innerHTML=tableContent;
    });


        }
      


       
        const singleModal = document.getElementById('singlePostModal');
        if (singleModal) {
            singleModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var postid = button.getAttribute('data-bs-postid');
                const token = localStorage.getItem('token');
                fetch(`/api/advenacts/${postid}`, {
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
                    const advenact = data.data.post[0];
                   const modalBody = document.querySelector('#singlePostModal .modal-body');
                   modalBody.innerHTML="";
                   modalBody.innerHTML= `
                 <b>Name:</b> ${advenact} <br>
                    <b>District:</b> ${advenact.name}<br>
                    <b>Description:</b> ${advenact.description}<br>
                    <b>Price:</b> ${advenact.price}<br>
                    <b>Duration:</b> ${advenact.duration}<br>
                    <b>Requirements:</b> ${advenact.requirements[0]}<br>
                    
                   <img width="150px" height="150px" src="uploads/advenact/${advenact.image1}" />
                   <img width="150px" height="150px" src="uploads/advenact/${advenact.image2}" />
                   <img width="150px" height="150px" src="uploads/advenact/${advenact.image3}" />
                   <img width="150px" height="150px" src="uploads/advenact/${advenact.image4}" />
                   <img width="150px" height="150px" src="uploads/advenact/${advenact.image5}" />

                    <b>is saesonal?:</b> ${advenact.is_seasonal}<br>
                    <b>Best season:</b> ${advenact.best_season[0]}<br>
                    <b>location:</b> ${advenact.location}<br>
                    <b>Email:</b> ${advenact.email}<br>
                    <b>phone :</b> ${advenact.phone}<br> 
                    <b>wesite:</b> ${advenact.website}<br>
                   `;

                }
                ).catch(err => {
                    console.log(err);
                }
            );
        });
    }

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
 fetch(`/api/posts/${postid}`,{
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

     //update modal
        const updateModal = document.getElementById('updatemodal');
        if (updateModal) {
            updateModal.addEventListener('show.bs.modal', function (event) {
                var updatebutton = event.relatedTarget;
                var postid = updatebutton.getAttribute('data-bs-postid');
                const token = localStorage.getItem('token');
                fetch(`/api/posts/${postid}`, {
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
                  
                    const post = data.data.post[0];
                   
                   const modalBody = document.querySelector('#updatemodal .modal-body');
                   modalBody.innerHTML="";
            

  modalBody.innerHTML= `
    <form action="" method="POST" enctype="multipart/form-data" id="addForm">
        @csrf
      <h2 class="reset-heading">
        <span class="popup-heading">Post Update</span>   
      </h2>

     <input type="hidden" name="postid" id="postid" value="${post.id}">
     <input type="text" id="title" placeholder="title" name="title">
     <input type="text" id="description" placeholder="description" name="description">
     <img src="/uploads/${post.image}" alt="" width="150px" height="150px" id="imagediv">
     <input type="file" id="image" name="image">
    
      <button type="submit" class="registerBtn" name="update" id="update">Update Post</button>
    </form>
  `;

  
  document.getElementById('title').setAttribute('value', `${post.title}`);
  document.getElementById('description').setAttribute('value', `${post.description}`);
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
fetch(`/api/posts/${postid}`,{
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
}).catch(err => {
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