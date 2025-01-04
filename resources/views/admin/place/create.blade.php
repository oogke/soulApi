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
        #exampleInputCategory
        {
          margin-right: 12px;
        }
        #addImageInput{
          margin-left: 20px;
          cursor: pointer;
          font-size: 25px;
          margin-top: 10px;
        }
    </style>
</head>
<body>
    
<form>
    <h1>Insert places</h1>
    <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" >
  </div>
  <div class="mb-3" >
    <label for="exampleInputDescription" class="form-label">Description</label>
    <input type="text" class="form-control" id="exampleInputDescription" aria-describedby="emailHelp">
  </div>
  <div class="mb-3" >
    <label for="exampleInputLocation" class="form-label">Location</label>
    <input type="text" class="form-control" id="exampleInputLocation" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputDistrict" class="form-label">District</label>
    <input type="text" class="form-control" id="exampleInputDistrict" aria-describedby="emailHelp">
  </div>
  <div class="mb-3" id="categoryCheckbox">
   
    
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
  </div>
  <button type="submit" class="btn btn-success" id="submitBtn">Submit</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
    const placeid=document.querySelector('meta[name="placeid"]').content;
    console.log(placeid);
      let categoryData=` <h4>Category</h4>`;
      const categoryDiv= document.getElementById("categoryCheckbox");
      const submitBtn= document.getElementById("submitBtn");
      const token =localStorage.getItem('token');
      function loadData()
      {
        fetch('/api/category',{
           method: "GET",
          headers:{
            "Authorization" : `Bearer ${token}`,
          }
        }).then(response=>{return response.json();}).then(data=>
        {
        const categoryArray= data.data;
        for(category of categoryArray)
        {
         let categoryName=category.category;
        
         categoryData+=`
           <label for="exampleInputCategory" class="form-label">${categoryName}</label>
    <input type="checkbox" class="form-check-input" id="exampleInputCategory" aria-describedby="emailHelp" name="category[]" value="${categoryName}">
         `;
        }
        categoryDiv.innerHTML=categoryData;
          });
      }
loadData();
submitBtn.addEventListener("click",function(event)
{
const token =localStorage.getItem('token');
event.preventDefault();
const checkedBoxArray=document.querySelectorAll('input[name="category[]"]:checked').value;
const nameValue=document.getElementById("exampleInputName").value;
const descriptionValue=document.getElementById("exampleInputDescription").value;
const locationValue=document.getElementById("exampleInputLocation").value;
const DistrictValue=document.getElementById("exampleInputDistrict").value;
formData.append("image1", document.getElementById("exampleImage1").files[0]);
formData.append("image2", document.getElementById("exampleImage2").files[0]);
formData.append("image3", document.getElementById("exampleImage3").files[0]);
formData.append("image4", document.getElementById("exampleImage4").files[0]);
formData.append("image5", document.getElementById("exampleImage5").files[0]);
const formData= new FormData();
for(input of checkedBoxArray){
  formData.append("category[]",input);
}
formData.append("name",nameValue);
formData.append("description",descriptionValue);
formData.append("location",locationValue);
formData.append("district",DistrictValue);
console.log(formData);

fetch(`/api/places/${placeid}`,{
  method:"POST",
  headers:{
    "Authorization":`Bearer ${token}`,
  },
  body:formData
}).then(response=>{
  return response.json();
})
.then(data=>{
console.log(data);
});
});


    </script>
</body>
</html>