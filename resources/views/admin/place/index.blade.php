<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c5a4938a4c.js" crossorigin="anonymous"></script>  

    <title>manage Districts</title>
    <style>
  .header {
            width: 100%;
            height: 100px;
text-align: center;
margin-top: 20px;

        }

        table tbody tr {
            height: 70px;
        }

        .a {
            width: 150px;
            margin-top: 20px;
            margin-left: 30px;
        }
        #delete-btn {
            border-left: 1px solid blue;
            padding: 5px;
        }
        #create-btn {
            margin: 10px 20px 50px 30px;
            width: 150px;
            height: 40px;
            color: white;
            font-size: 20px;
            text-decoration: none;
        }

    </style>
</head>
<body>

<div class="header">
        <h1 class="heading mt-2 ">Manage Post</h1>
    </div>
    <a href="{{ Route('createPlaces')}}"><button class="btn btn-link btn-primary" id="create-btn">Create post</button></a>
    <div class="table-div" id="table-div">
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
                    hello
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- view Modal -->
   

    <!-- Delete Modal -->
    <div class="modal fade" id="DeleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Are you sure you want to delete it?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
        <button type="button" class="btn btn-primary" id="deleteBtn">Delete</button>
      </div>
    </div>
  </div>
</div>
    <!-- Delete Modal -->

   
  <!--update Modal -->
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
      <!--update Modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>

        //view all data 
        function loadData()
        {
            const token=localStorage.getItem("token");
            const tableDiv = document.getElementById('table-div');
fetch('/api/places',{
    method: "GET",
    headers:
    {
       'Authorization':`Bearer ${token}`
    }
}).then(response=>{return response.json()}).then(data=>
{
let tableData=`
    <table class="table table-striped table-hover table-bordered align-middle">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">image1</th>
                    <th scope="col">image2</th>
                    <th scope="col">image3</th>
                    <th scope="col">image4</th>
                    <th scope="col">image5</th>
                    <th scope="col">view</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody id="TaskTableBody">`;

            let n = 1;
            for( var place of data.data)
            {
                tableData+=` <tr>
                    <td>${n++}</td>
                    <td>${place.name}</td>
                    <td>${place.description}</td>
                    <td>${place.category}</td>
    <td><img src="uploads/places/${place.image1}" alt="" width="150px" height="150px"></td>
    <td><img src="uploads/places/${place.image2}" alt="" width="150px" height="150px"></td>
    <td><img src="uploads/places/${place.image3}" alt="" width="150px" height="150px"></td>
    <td><img src="uploads/places/${place.image4}" alt="" width="150px" height="150px"></td>
    <td><img src="uploads/places/${place.image5}" alt="" width="150px" height="150px"></td>
                    
                    <td><a href="" id="view-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#singlePostModal" data-bs-postid="${place.id}">view</a></td>
                    <td><a href="/api/updateplace/${place.id}" id="edit-btn" class="btn btn-warning"  >Edit</a></td>
                    <td><a href="" id="delete-btn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-bs-postid="${place.id}">Delete</a></td>
                </tr>`;   
            }
            tableData+=`</tbody>
        </table>`;
        tableDiv.innerHTML = tableData;
}
);
        }
     
//view all data 


//view single data
const singleModal = document.getElementById('singlePostModal');
        if (singleModal) {
            singleModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var postid = button.getAttribute('data-bs-postid');
                const token = localStorage.getItem('token');
                fetch(`/api/place?id=${postid}`, {
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
                    const place = data.data[0];
                  


                   const modalBody = document.querySelector('#singlePostModal .modal-body');
                   modalBody.innerHTML="";
                   modalBody.innerHTML= `
                 <b>Name:</b> ${place.name} <br>
                 <b>Description:</b> ${place.description}<br> 
                 <b>location:</b> ${place.location}<br> 
                  <b>Category:</b> `;
            
let categories = '';
for (let item of JSON.parse(place.category)) {
    categories += `<span>${item}</span><br>`;
}
modalBody.innerHTML += categories; 
modalBody.innerHTML += 
                  `<br>
                  <h5>Images</h5>
                    <img width="150px" height="150px" src="uploads/places/${place.image1}" />
                    <img width="150px" height="150px" src="uploads/places/${place.image2}" />
                    <img width="150px" height="150px" src="uploads/places/${place.image3}" />
                   <img width="150px" height="150px" src="uploads/places/${place.image4}" />
                   <img width="150px" height="150px" src="uploads/places/${place.image5}" /><br>
                     
              `;
                }
             )
            .catch(err => {
                    console.log(err);
                }
            );
        });
    }


//view single data
//delete model

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
 fetch(`/api/places/${postid}`,{
                    method: "DELETE",
                    headers: {
                        'Authorization': `Bearer ${token}`,
                    }
                }).then(response=>
                {
                    return response.json();
                }
                ).then(data=>{
                    console.log(data);
                    if(data.message=="successfully deleted")
                {
                  window.location.href="/";
                }
                 });
            })
                
             });
     }
//delete model


   loadData();

    </script>
</body>
</html>