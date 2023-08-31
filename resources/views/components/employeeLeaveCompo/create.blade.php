<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave Allpication</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Subject *</label>
                                <input type="text" class="form-control" id="subject" placeholder="Application for....">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Message *</label>
                                <textarea cols="50" rows="10" class="form-control" id="massage"  placeholder="Explain Everything...."></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Reason *</label>
                                <input type="text" class="form-control" id="reason" placeholder="sick,medical emargency">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 p-1">
                                <label class="form-label">Start Date *</label>
                                <input type="date" class="form-control" id="startDate">
                            </div>
                            <div class="col-12 col-md-6 p-1">
                                <label class="form-label">End Date *</label>
                                <input type="date" class="form-control" id="endDate">
                            </div>
                        </div>
                      
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>

<script>
    async function Save() {
        let subjects = document.getElementById('subject').value;
        let message = document.getElementById('massage').value;
        let reason = document.getElementById('reason').value;
        let startDate = document.getElementById('startDate').value;
        let endDate = document.getElementById('endDate').value;

        if(subject.length === 0){
            errorToast("Subject Required");
        }
        else if(massage.length === 0){
            errorToast("Massage Required");
        }
        else if(reason.length === 0){
            errorToast("Reason Required");
        }
        else if(startDate.length === 0){
            errorToast("StartDate Required");
        }
        else if(endDate.length === 0){
            errorToast("EndDate Required");
        }
       
        else{
         
          document.getElementById('modal-close').click();

          showLoader();
          let res = await axios.post('/create-leave',{
            subject:subjects,
            message:message,
            reason:reason,
            start_date:startDate,
            end_date:endDate,
        })
          hideLoader();

          if(res.data===1){
            successToast("Application Success")
            document.getElementById('save-form').reset();
           await getList();
          
          }else {
            errorToast(res.data);
          }

        }
    }
</script>
