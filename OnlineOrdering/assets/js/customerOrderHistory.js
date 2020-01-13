$(document).ready(function () {

         var table = $('#customerOrderHistory').DataTable({
            
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
                 }
             ],
             "order": [[1, 'asc']]
         });

         // Add event listener for opening and closing details
         $('#customerOrderHistory tbody').on('click', 'td.details-control', function () {
             var tr = $(this).closest('tr');
             var tdi = tr.find("i.fa");
             var row = table.row(tr);

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

         table.on("user-select", function (e, dt, type, cell, originalEvent) {
             if ($(cell.node()).hasClass("details-control")) {
                 e.preventDefault();
             }
         });
     });

    function format(d){
        
         // `d` is the original data object for the row
         return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '  <tr>' +
            ' <th >Item</th>  ' +
            ' <th >Price</th>' +
            ' <th>Qty</th>  ' +
            ' <th >Qty Price</th>' +            
            ' </tr>' +
             '  <tr>' +
            ' <td >AAAA</td>  ' +
            ' <td >100.00</td>' +
            ' <td>2</td>  ' +
            ' <td >200.00</td>' +            
            ' </tr>' +
         '</table>';  
    }