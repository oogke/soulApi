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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        function loadData()
        {
            const token=localStorage.getItem("token");
            const tableDiv = document.getElementById('table-div');
fetch('/api/districts',{
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
                    <th scope="col">District</th>
                    <th scope="col">Description</th>
                    <th scope="col">Province</th>
                    <th scope="col">view</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody id="TaskTableBody">`;

            let n = 1;
            for( var district of data.data)
            {
                tableData+=` <tr>
                    <td>${n++}</td>
                    <td>${district.name}</td>
                    <td>${district.description}</td>
                    <td>${district.province}</td>
                    <td><a href="" id="view-btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#singlePostModal" data-bs-postid="${district.id}">view</a></td>
                    <td><a href="" id="edit-btn" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updatemodal" data-bs-postid="${district.id}">Edit</a></td>
                    <td><a href="" id="delete-btn" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-bs-postid="${district.id}">Delete</a></td>
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