<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>History</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 btn-sm bg-gradient-primary">Request Leave</button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Application Date</th>
                    <th>Reason</th>
                    <th>leave start</th>
                    <th>leave end</th>
                    <th>status</th>
                   
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
        let res = await axios.get('/get-leave-list');
        hideLoader();

      //  let tableList = document.getElementById('tableList');
      //  let tableData = document.getElementById('tableData');

        //dataTable jquery diye cole. tai  document.getElementById diye dhorle pblm hobe, tai jquery diye dhorte hobe
        let tableList =$('#tableList');
        let tableData = $('#tableData');
        
        //aboding data repeating
       tableData.DataTable().destroy();
        tableList.empty();

     res.data.forEach(function(item, index) {
            // Assuming item.created_at is in the format "YYYY-MM-DD HH:mm:ss"
            let createdAt = new Date(item.created_at); // Convert the string to a JavaScript Date object
           let hours = createdAt.getHours();
           let ampm = hours >= 12 ? 'PM' : 'AM';
           hours = hours % 12 || 12; // Convert 0 to 12

          let formattedCreatedAt =
          `${createdAt.getDate()}-${createdAt.getMonth() + 1}-${createdAt.getFullYear()} &nbsp ${hours}:${createdAt.getMinutes()} ${ampm}`;
            let row = `<tr>
                <td>${index + 1}</td>
                <td>${formattedCreatedAt}</td>
                <td>${item.reason}</td>
                <td>${item.start_date}</td>
                <td>${item.end_date}</td>
                <td>${item.status}</td>
            </tr>`;
            tableList.append(row);
        });

   // document.getElementByClassName('editBtn')
   // document.getElementByClassName('deleteBtn')
  //evabe na kore jqure diye dhorte hobe.





//   $('.deleteBtn').on('click', function (){
//     let id = $(this).data('id');
//     $('#delete-modal').modal('show');
//     $('#deleteID').val(id);

    //optional: input type a id ta set korar jonno use kora hoy .val
    //d-none kete deya hoyeche, tai input form dekha zabe nah. eta sodo testing perpus aa kora hoy, id 
    // zacche ki na check korar jonno

    //oi input theke delete er somoy id nite hobe
 
// })

     //evabe oo DataTable set kora zay
        //  tableData.DataTable({
        //      order:[[0,'asc']],
        //     lengthMenu:[5,10,15,20]
        //       })

             //evabe oo DataTable set kora zay
              new DataTable('#tableData',{
            order:[[0,'desc']],
           lengthMenu:[10,20,30,40]

           });

    }
</script>

