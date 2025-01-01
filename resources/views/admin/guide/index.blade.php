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
    <a href="{{ Route('createGuides')}}"><button class="btn btn-link btn-primary" id="create-btn">Create post</button></a>
    <div class="table-div" id="table-div">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        function loadData()
        {
            const token=localStorage.getItem("token");
            const tableDiv = document.getElementById('table-div');
fetch('/api/guides',{
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
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Country</th>
                    <th scope="col">citizenship No</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Website</th>
                    <th scope="col">Languages</th>
                    <th scope="col">Address</th>
                    <th scope="col">Profile</th>
                    <th scope="col">Citizenship card(Front)</th>
                    <th scope="col">Citizenship card(Front)</th>
                    <th scope="col">Guide Certificate</th>
                    <th scope="col">Cv</th>
                    <th scope="col">view</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody id="TaskTableBody">`;

            let n = 1;
            for( var guide of data.data)
            {
                tableData+=` <tr>
                    <td>${n++}</td>
                    <td>${guide.firstname}</td>
                    <td>${guide.lastname}</td>
                    <td>${guide.email}</td>
                    <td>${guide.phone}</td>
                    <td>${guide.dob}</td>
                    <td>${guide.country}</td>
                    <td>${guide.citizenshipNo}</td>
                    <td>${guide.experience}</td>
                    <td>${guide.website}</td>
                    <td>${guide.languages}</td>
                    <td>${guide.address}</td>
                    <td><img src="uploads/guide/${guide.profile}" alt="" width="150px" height="150px"></td>
    <td><img src="uploads/guide/${guide.citizenCardFront}" alt="" width="150px" height="150px"></td>
    <td><img src="uploads/guide/${guide.citizenCardBack}" alt="" width="150px" height="150px"></td>
    <td><img src="uploads/guide/${guide.GOVcertificate}" alt="" width="150px" height="150px"></td>
    <td><img src="uploads/guide/${guide.CV}" alt="" width="150px" height="150px"></td>
                    <td><a href="" id="view-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#singlePostModal" data-bs-postid="${guide.id}">view</a></td>
                    <td><a href="" id="edit-btn" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatemodal" data-bs-postid="${guide.id}">Edit</a></td>
                    <td><a href="" id="delete-btn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-bs-postid="${guide.id}">Delete</a></td>
                </tr>`;   
            }
            tableData+=`</tbody>
        </table>`;
        tableDiv.innerHTML = tableData;
}
);
        }
        loadData();
    </script>
</body>
</html>