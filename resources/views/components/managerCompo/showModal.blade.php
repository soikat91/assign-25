<div class="modal" id="show_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="app_details">
                   <div class="row">
                    <div class="col-6">
                        <p class="text-xm mx-0 my-1">Name:  <span id="name"></span> </p>
                        <p class="text-xs mx-0 my-1">Email:  <span id="email"></span> </p>
                        <p class="text-xs mx-0 my-1">Department :  <span id="department"></span> </p>
                        
                       
                      
                       

                    </div>
                    <div class="col-6 text-end">
                        <p class="text-xs mx-0 my-1">Date :  <span id="created_date"></span> </p>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-12">
                        <h6 class="text-xm mx-0 my-1">Subject :  <span id="subject"></span> </h6>
                       
                        <p class="e_message" id="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque dicta nihil iure nostrum, hic possimus delectus saepe voluptatem eum quo.</p>

                        <div class="div botton_date" style="margin-top:30px; margin-bottom:30px">
                            <p class="text-xs mx-0 my-1">Start Date :  <span id="start_date"></span> </p>
                            <p class="text-xs mx-0 my-1">End Date :  <span id="end_date"></span> </p>
                        </div>
                    </div>
                   </div>
                   <input class="d-none" type="text" id="leave_id">
                   <div class="modal-footer app_details">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                        aria-label="Close">Close</button>
                        <button onclick="reject()" id="modal-reject" class="btn btn-sm btn-danger">Reject</button>
                    <button onclick="approve()" id="save-btn" class="btn btn-sm  btn-success">Approve</button>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
      async function FillUpData(id){
       document.getElementById('leave_id').value = id;
        showLoader();
        let res = await axios.post('/employee-list-By-id',{
        leave_id:id
       }) 
        hideLoader();
        let createdAt = new Date(res.data['created_at']); // Convert the string to a JavaScript Date object
           let hours = createdAt.getHours();
           let ampm = hours >= 12 ? 'PM' : 'AM';
           hours = hours % 12 || 12; // Convert 0 to 12

          let formattedCreatedAt =
          `${createdAt.getDate()}-${createdAt.getMonth() + 1}-${createdAt.getFullYear()} &nbsp ${hours}:${createdAt.getMinutes()} ${ampm}`;


        document.getElementById('name').innerHTML = res.data.employee['name'];
        document.getElementById('email').innerHTML = res.data.employee['email'];
        document.getElementById('department').innerHTML = res.data.employee['department'];
        document.getElementById('created_date').innerHTML = formattedCreatedAt;
        document.getElementById('subject').innerHTML = res.data['subject'];
        document.getElementById('message').innerHTML = res.data['message'];
        document.getElementById('start_date').innerHTML = res.data['start_date'];
        document.getElementById('end_date').innerHTML = res.data['end_date'];
   
    }

    async function approve() {
      $leave_id = document.getElementById('leave_id').value;
      $status = "approved";
        showLoader();
        let res = await axios.post('/updte-leave-status',{
            leave_id:$leave_id,
            status:$status
        })
        hideLoader();
        document.getElementById('modal-close').click();
        if(res.data===1){
            successToast("Application Approved");
            await  getList();
        }
        else{
            errorToast("Something went wrong");
        }
    }
    async function reject() {
      $leave_id = document.getElementById('leave_id').value;
      $status = "rejected";
        showLoader();
        let res = await axios.post('/updte-leave-status',{
            leave_id:$leave_id,
            status:$status
        })
        hideLoader();
        document.getElementById('modal-close').click();
        if(res.data===1){
            successToast("Application Rejected");
            await  getList();
        }
        else{
            errorToast("Something went wrong");
        }
    }
</script>