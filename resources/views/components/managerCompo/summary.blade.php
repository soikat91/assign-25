
        <div class="container-fluid mb-5">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                   
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h3 id="total-employee" class="mb-0 text-capitalize font-weight-bold">00</h3>
                                            <p class="mb-0 text-lg">Total Employee</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100" src="{{asset('images/icon.svg')}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                    
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h3 id="total-pending" class="mb-0 text-capitalize font-weight-bold">00</h3>
                                            <p class="mb-0 text-lg">Total Pending</p>
                                        </div>
                                    </div>
                                    <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100" src="{{asset('images/icon.svg')}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                  
                        <div class="card card-plain h-100 bg-white">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                        <div>
                                            <h3 id="total-approval" class="mb-0 text-capitalize font-weight-bold">00</h3>
                                            <p class="mb-0 text-lg">Total Approved</p>
                                        </div>
                                    </div>
                                    <div class="col- col-lg-4 col-md-4 col-sm-3 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                            <img class="w-100" src="{{asset('images/icon.svg')}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
                  
                    <div class="card card-plain h-100 bg-white">
                        <div class="p-3">
                            <div class="row">
                                <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                                    <div>
                                        <h3 id="total-reject" class="mb-0 text-capitalize font-weight-bold">00</h3>
                                        <p class="mb-0 text-lg">Total Reject</p>
                                    </div>
                                </div>
                                <div class="col- col-lg-4 col-md-4 col-sm-3 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                        <img class="w-100" src="{{asset('images/icon.svg')}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        
               
            </div>
        </div>
        


 

<script>
     async function fetchDataAndUpdate(elementId, endpoint) {
        showLoader();
        try {
            let res = await axios.get(endpoint);
            document.getElementById(elementId).innerText = res.data;
        } catch (error) {
            console.error("Error fetching data:", error);
        }
        hideLoader();
    }

    // Call the functions to fetch and update data for each element
    TotalLeaveCalculation();
    TotalPending();
    TotalApproved();
  //  TotalCustomer();

    function  TotalLeaveCalculation() {
        fetchDataAndUpdate("total-employee", "/total-employee");
    }

    function TotalPending() {
        fetchDataAndUpdate("total-pending", "/total-pending");
    }
    function TotalApproved() {
        fetchDataAndUpdate("total-approval", "/total-approved");
    }

    function TotalCustomer() {
        fetchDataAndUpdate("total-customer", "/total-customer");
    }


   
</script>