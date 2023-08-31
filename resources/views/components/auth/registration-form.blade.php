<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Manager Sign Up</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                          
                            <div class="col-md-4 p-2">
                                <label>Name</label>
                                <input id="name" placeholder="Name" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input id="email" placeholder="User Email" class="form-control" type="email"/>
                            </div>
                           
                            <div class="col-md-4 p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control" type="password"/>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onRegistration()" class="btn mt-3 w-100  btn-primary">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   async function onRegistration() { 
       
    
         let name = document.getElementById('name').value;
         let email = document.getElementById('email').value;
         let password = document.getElementById('password').value;

        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
       // let passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

      
        if(email.length===0){
            errorToast('Email is Required');
        }
        else if(!emailRegex.test(email)){
             errorToast('Enter Valid Email');
        }
        else if(name.length===0){
            errorToast('Name is Required');
        }
       
        else if(password.length===0){
            errorToast('Password is Required');
        }
   
        // else if (!passwordRegex.test(password)) {
        //      errorToast('Password must be at least 8 characters long and contain both numbers and letters');
        //  }
         else{
          showLoader();
          let res = await axios.post("/manager-registration",{
           
            name: name,
            email:email,
            password:password
          })
        hideLoader();

       if(res.data===1){
         successToast("Manager Registered Success")
         setTimeout(function()  {
                window.location.href = "/";
            }, 1000);
       }else{
         errorToast("Failed to register")
       }

    }
  }
</script>
