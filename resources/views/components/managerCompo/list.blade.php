<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Leave Application List</h4>
                </div>
               
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Application Date</th>
                    <th>Emlpoyee Name</th>
                     <th>Department</th>
                    <th>Reason</th>
                    <th>leave start</th>
                    <th>leave end</th>
                    <th>Status</th>
                    <th>Action</th>
                   
                </tr>
                </thead>
                <tbody id="tableList">


                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
    getList();
    async function getList(){
        showLoader();
        let res = await axios.get('/employee-list');
        hideLoader();

      //  let tableList = document.getElementById('tableList');
      //  let tableData = document.getElementById('tableData');

        //dataTable jquery diye cole. tai  document.getElementById diye dhorle pblm hobe, tai jquery diye dhorte hobe
        let tableList =$('#tableList');
        let tableData = $('#tableData');
        
        //aboding data repeating
       tableData.DataTable().destroy();
        tableList.empty();

        res.data.forEach(function (item, index) {
            let createdAt = new Date(item.created_at);

            let hours = createdAt.getHours();
            let minutes = createdAt.getMinutes();
            let ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;

            let formattedCreatedAt =
                `${createdAt.getDate()}-${createdAt.getMonth() + 1}-${createdAt.getFullYear()}  &nbsp ${hours}:${minutes.toLocaleString('en-US', { minimumIntegerDigits: 2 })} ${ampm}`;

            let row = `<tr>
        <td>${index + 1}</td>
        <td>${formattedCreatedAt}</td>
        <td>${item.employee.name}</td>
        <td>${item.employee.department}</td>
        <td>${item.reason}</td>
        <td>${item.start_date}</td>
        <td>${item.end_date}</td>
        <td>${item.status}</td>
        <td>
            <button data-id="${item['id']}" class="btn viewbtn btn-sm btn-outline-success">View</button>
        </td>
        </tr>`;
            tableList.append(row);
        })

         $('.viewbtn').on('click',async function(){
            let id = $(this).data('id');
             await FillUpData(id);
           $("#show_modal").modal('show');
     
        })


  
              new DataTable('#tableData',{
            order:[[0,'desc']],
           lengthMenu:[10,20,30,40]

           });

    }
</script>

