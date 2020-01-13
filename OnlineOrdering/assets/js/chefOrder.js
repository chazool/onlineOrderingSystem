$(document).ready(function () {

         var chefOrderPendingTable = $('#chefOrderPendingTable').DataTable({
            
             select:"single",
           
             "columnDefs": [
                 {
                     "targets": 0,           
                     "className": 'details-control',
                     "orderable": false,
                     "data": null,
                     "defaultContent": '',
                     "render": function () {
                         return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                     },
                     width:"15px"
                 },
                 {
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<button type='button' class='btn btn-primary btn-sm'>Add</button>"
              }
             ],
             "order": [[1, 'asc']]
         });

         // Add event listener for opening and closing details
         $('#chefOrderPendingTable tbody').on('click', 'td.details-control', function () {
             var tr = $(this).closest('tr');
             var tdi = tr.find("i.fa");
             var row = chefOrderPendingTable.row(tr);

             if (row.child.isShown()) {
                 // This row is already open - close it
                 row.child.hide();
                 tr.removeClass('shown');
                 tdi.first().removeClass('fa-minus-square');
                 tdi.first().addClass('fa-plus-square');
             }
             else {
                 // Open this row
                 row.child(format(row.data())).show();
                 tr.addClass('shown');
                 tdi.first().removeClass('fa-plus-square');
                 tdi.first().addClass('fa-minus-square');
             }
         });

         chefOrderPendingTable.on("user-select", function (e, dt, type, cell, originalEvent) {
             if ($(cell.node()).hasClass("details-control")) {
                 e.preventDefault();
             }
         });
     });

    function format(d){
        
         // `d` is the original data object for the row
         return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '  <tr>' +
            ' <th >Item Id</th>  ' +
            ' <th >Item Name</th>' +
            ' <th>Qty</th>  ' +               
            ' </tr>' +
             '  <tr>' +
            ' <td >551</td>  ' +
            ' <td >AAAA</td>' +
            ' <td>2</td>  ' +                       
            ' </tr>' +
         '</table>';  
    }

 $('#chefOrderPendingTable tbody').on( 'click', 'button', function () {
      // alert("AAA");
     var table = $('#chefOrderPendingTable').DataTable();
    var data = table.row( $(this).parents('tr') ).data();
      
     console.log(data[2]);
     //   alert( data[1] );
    } );