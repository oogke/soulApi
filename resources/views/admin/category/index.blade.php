<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c5a4938a4c.js" crossorigin="anonymous"></script>
    <title>Manage Post</title>
    <style>
        .header {
            width: 100%;
            height: 100px;


        }

        .heading {
            text-align: center;
            font-weight: 300;
            padding: 10px;
            position: relative;
            font-size: 4rem;
        }

        .header i {
            font-size: 20px;
            position: absolute;
            top: 150px;
            right: 10px;
            text-decoration: none;
            color: black;
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
            margin: 30px 20px 20px 30px;
            width: 150px;
            height: 40px;
            color: white;
            font-size: 20px;
            text-decoration: none;
        }

        #dropdown {
            position: static;
            top: 60px;

        }
form{
    display: flex;
    flex-direction: column;
  
}
form input{
    margin:37px 0 13px;
    height: 53px;
}
      form input::placeholder{
        color: black;
font-family: 'Arial', sans-serif;
font-weight: bold;
text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
letter-spacing: 1px;
opacity: 0.5;
text-indent: 10px;
    }
    #update
    {
        height: 50px;
        background-color: green;
        color:white;

    }

    </style>
</head>

<body>
    <div class="header">
        <h1 class="heading mt-2 ">Manage District</h1>
    </div>
    <a href="{{route('CreatePost')}}"><button class="btn btn-link btn-primary" id="create-btn">Create post</button></a>
    <div class="table-div" id="table-div">
    </div>

    <!-- Modal -->
    <div class="modal fade" id="singlePostModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="singlePostLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="singlePostLabel">Single District Data</h5>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script>


        const logout = document.getElementById('logout-btn');
        logout.addEventListener('click', function (event) {
            event.preventDefault();
            const token = localStorage.getItem('token');
            fetch('/api/logout', {
                method: "POST",
                headers:
                {
                    'Authorization': `Bearer ${token}`
                }
            }).then(response => {
                return response.json();
            }
            ).then(data => {
                if (data.status == true && data.message == "You logged out successfully") {
                    window.location.href = "/loginView";
                }
            }
            ).catch(err => {
                console.log(err);
            }
            )
        });


        function loadData() {
            const token = localStorage.getItem('token');
            fetch('/api/posts',
                {
                    method: "GET",
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                }).then(response => {
                    return response.json();
                }
                ).then(data => {

                    const allpost = data.data.post
                    const tableDiv = document.getElementById('table-div');
                    var tableData = ` <table class="table table-striped table-hover table-bordered align-middle">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Image</th>
                    <th scope="col">title</th>
                    <th scope="col">Description</th>
                    <th scope="col">view</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>

                </tr>
            </thead>
       
            <tbody id="TaskTableBody">
`;
                    let n = 1;
                    allpost.forEach(post => {

                        tableData += `  <tr>
                    <td>${n++}</td>
                    <td><img src="uploads/${post.image}" alt="" width="200px" height="200px"></td>
                    <td>${post.title}</td>
                    <td>${post.description}</td>
                    <td><a href="" id="view-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#singlePostModal" data-bs-postid="${post.id}">view</a></td>
                    <td><a href="" id="edit-btn" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatemodal" data-bs-postid="${post.id}">Edit</a></td>
                    <td><a href="" id="delete-btn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-bs-postid="${post.id}">Delete</a></td>
                </tr>`;
                    });
                    tableData += `</tbody>
        </table>`;
                    tableDiv.innerHTML = tableData;
                }
                ).catch(err => {
                    console.log(err);
                }
                )
        }
        loadData();


        //open single post modal
        const singleModal = document.getElementById('singlePostModal');
        if (singleModal) {
            singleModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var postid = button.getAttribute('data-bs-postid');
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
                   const modalBody = document.querySelector('#singlePostModal .modal-body');
                   modalBody.innerHTML="";
                   modalBody.innerHTML= `
                  <b> Title:</b> ${post.title}
                   <br>
                  <b>Description:</b>  ${post.desciption}
                   <br>
                   <img width="150px" height="150px" src="uploads/${post.image}" />
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




    </script>
</body>

</html>