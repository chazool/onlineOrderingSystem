$(document).ready(function() {
    //alert("hi");

    //===========================================chefOrderPendingTable============================================================
    var chefOrderPendingTable = $('#chefOrderPendingTable').DataTable({

        select: "single",

        "columnDefs": [{
                "targets": 0,
                "className": 'details-control',
                "orderable": false,
                "data": null,
                "defaultContent": '',
                "render": function() {
                    return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                },
                width: "15px"
            },
            {
                "targets": -1,
                "data": null,
                "defaultContent": "<button type='button' class='btn btn-primary btn-sm'>Conform</button>"
            }
        ],
        "order": [
            [1, 'asc']
        ]
    });



    // Add event listener for opening and closing details
    $('#chefOrderPendingTable tbody').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var tdi = tr.find("i.fa");
        var row = chefOrderPendingTable.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            tdi.first().removeClass('fa-minus-square');
            tdi.first().addClass('fa-plus-square');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
            tdi.first().removeClass('fa-plus-square');
            tdi.first().addClass('fa-minus-square');
        }

    });

    //

    chefOrderPendingTable.on("user-select", function(e, dt, type, cell, originalEvent) {
        if ($(cell.node()).hasClass("details-control")) {
            e.preventDefault();
        }
    });
    //===========================================chefOrderConformTable============================================================

    var chefOrderCnformTable = $('#chefOrderCnformTable').DataTable({

        select: "single",

        "columnDefs": [{
                "targets": 0,
                "className": 'details-control',
                "orderable": false,
                "data": null,
                "defaultContent": '',
                "render": function() {
                    return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                },
                width: "15px"
            },
            {
                "targets": -1,
                "data": null,
                "defaultContent": "<button type='button' class='btn btn-primary btn-sm'>preparing</button>"
            }
        ],
        "order": [
            [1, 'asc']
        ]
    });


    // Add event listener for opening and closing details
    $('#chefOrderCnformTable tbody').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var tdi = tr.find("i.fa");
        var row = chefOrderCnformTable.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            tdi.first().removeClass('fa-minus-square');
            tdi.first().addClass('fa-plus-square');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
            tdi.first().removeClass('fa-plus-square');
            tdi.first().addClass('fa-minus-square');
        }

    });

    //

    chefOrderCnformTable.on("user-select", function(e, dt, type, cell, originalEvent) {
        if ($(cell.node()).hasClass("details-control")) {
            e.preventDefault();
        }
    });


    //===========================================chefOrderPreparingTable============================================================
    var chefOrderPreparingTable = $('#chefOrderPreparingTable').DataTable({

        select: "single",

        "columnDefs": [{
                "targets": 0,
                "className": 'details-control',
                "orderable": false,
                "data": null,
                "defaultContent": '',
                "render": function() {
                    return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                },
                width: "15px"
            },
            {
                "targets": -1,
                "data": null,
                "defaultContent": "<button type='button' class='btn btn-primary btn-sm'>Redy</button>"
            }
        ],
        "order": [
            [1, 'asc']
        ]
    });


    // Add event listener for opening and closing details
    $('#chefOrderPreparingTable tbody').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var tdi = tr.find("i.fa");
        var row = chefOrderPreparingTable.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            tdi.first().removeClass('fa-minus-square');
            tdi.first().addClass('fa-plus-square');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
            tdi.first().removeClass('fa-plus-square');
            tdi.first().addClass('fa-minus-square');
        }

    });

    //

    chefOrderPreparingTable.on("user-select", function(e, dt, type, cell, originalEvent) {
        if ($(cell.node()).hasClass("details-control")) {
            e.preventDefault();
        }
    });


    var myMap = {};

    function format(d) {
        // console.log(d[1]);
        // `d` is the original data object for the row
        var subTable = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '  <tr>' +
            ' <th >Item Id</th>  ' +
            ' <th >Item Name</th>' +
            ' <th>Qty</th>  ' +
            ' </tr>';

        subTable = subTable + '</table>';

        return myMap[d[1]];
    }

    //===========================================================

    $("#nav-home-tab").click(function() {
        //alert("nav Pro");
        loadKitchenTable('#chefOrderPendingTable', "pending");
    });

    $("#nav-profile-tab").click(function() {
        //alert("nav Pro");
        loadKitchenTable('#chefOrderCnformTable', "conform");
    });

    $("#nav-contact-tab").click(function() {
        //alert("nav Pro");
        loadKitchenTable('#chefOrderPreparingTable', "preparing");
    });


    loadKitchenTable('#chefOrderPendingTable', "pending");

    function loadKitchenTable(tableName, OrderStatus) {
        //alert("loadKitchenTable");

        $.ajax({
            url: 'assets/php/orderSelectUsingStatus.php',
            type: 'POST',
            data: {
                "status": OrderStatus
            },
            success: function(response) {
                //
                //console.log(response);
                var t = $(tableName).DataTable();
                t.clear().draw();

                $.each(JSON.parse(response), function(key, value) {

                    getOrderItem(value.order_id);
                    var tableTime = "";
                    if (OrderStatus === "pending") {
                        tableTime = '<input type="time" id="' + value.order_id + '" step="300" value="' + value.need_time.trim() + '">';
                    } else {
                        tableTime = value.need_time.trim();
                    }
                    /// t.row.add( [  ,value.order_id,'<input type="time" id="'+ value.order_id +'" step="300" value="'+ value.need_time.trim() +'">'] ).draw( false );
                    t.row.add([, value.order_id, tableTime]).draw(false);

                });




            }
        });
        //console.log("========================================================================================================");
        //console.log(myMap);

    }


    function getOrderItem(order_id) {
        $.ajax({
            url: 'assets/php/selectOrderIterms.php',
            type: 'POST',
            data: {
                "order_id": order_id
            },
            success: function(response) {

                var subTable = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;" >' +
                    '  <tr>' +
                    ' <th >Item Id</th>  ' +
                    ' <th >Item Name</th>' +
                    ' <th>Qty</th>  ' +
                    ' </tr>';

                $.each(JSON.parse(response), function(key, value) {
                    subTable = subTable + '  <tr>' +
                        ' <td >' + value.item_Id + ' </td>  ' +
                        ' <td >' + value.fooditem_name + ' </td>' +
                        ' <td>' + value.qty + ' </td>  ' +
                        ' </tr>';
                });

                subTable = subTable + '</table>';

                myMap[order_id] = subTable;

            }
        });
    }
});



$('#chefOrderPendingTable tbody').on('click', 'button', function() {

    var table = $('#chefOrderPendingTable').DataTable();
    var data = table.row($(this).parents('tr')).data();


    //console.log($('#'+data[1]).val());
    //Data 
    var orderid = data[1];
    var time = $('#' + data[1]).val();

    var search = {
        "order_id": orderid,
        "cheff_id": $("#custId").val(),
        "estimate_time": time


    }
    $.ajax({
        url: 'assets/php/addOrder_confirmation.php',
        type: 'POST',
        data: search,
        success: function(response) {


            updateOrderColumnTime(orderid, "orderConform_DateAndTime", "conform");


        }
    });

    table.row($(this).parents('tr')).remove().draw();

});

$('#chefOrderCnformTable tbody').on('click', 'button', function() {

    var table = $('#chefOrderCnformTable').DataTable();
    var data = table.row($(this).parents('tr')).data();

    //console.log($('#'+data[1]).val());
    //Data 
    var orderid = data[1];

    updateOrderColumnTime(orderid, "preparing_DateAndTime", "preparing");
    table.row($(this).parents('tr')).remove().draw();

});


var clickRow;
$('#chefOrderPreparingTable tbody').on('click', 'button', function() {

    var table = $('#chefOrderPreparingTable').DataTable();
    var data = table.row($(this).parents('tr')).data();



    //console.log($('#'+data[1]).val());
    //Data 
    var orderid = data[1];

    updateOrderColumnTime(orderid, "preparing_DateAndTime", "redy");
    clickRow = this;

});



function updateOrderColumnTime(order_id, columnName, orderStatus) {

    var today = new Date();
    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date + ' ' + time;
    //order_id , dateAndTime ,  columnName
    var search = {
        "order_id": order_id,
        "dateAndTime": dateTime,
        "columnName": columnName,
        "orderStatus": orderStatus
    }
    $.ajax({
        url: 'assets/php/UpdateOrder.php',
        type: 'POST',
        data: search,
        success: function(response) {
            //console.log(response);
            //Send Email To Customer ------------
            //get Customer Email Using Order id
            getCustomerEmail(order_id, orderStatus);
            //sendEmail(email,orderStatus,order_id)
            //
            if (orderStatus === 'redy') {

                selectOnlineRider(order_id);


            } else {
                $.notify(orderStatus + " - " + order_id, "success");
            }

        }
    });

}



function getCustomerEmail(order_id, orderStatus) {

    $.ajax({
        url: 'assets/php/SelectOrder.php',
        type: 'POST',
        data: {
            "order_id": order_id
        },
        success: function(response) {
            //console.log(response);
            //Send Email To Customer ------------
            //get Customer Email Using Order id
            var cusId = JSON.parse(response)[0].cus_id;

            if (cusId === '-1') {
                //alert("cusId ----");

                var note = JSON.parse(response)[0].note;
                var parts = note.split("Email:", 2)
                console.log(parts[1]);
                sendEmail(parts[1], orderStatus, order_id);

            } else { //CustomerSelect
                $.ajax({
                    url: 'assets/php/CustomerSelect.php',
                    type: 'POST',
                    data: {
                        "custId": cusId
                    },
                    success: function(response) {
						 var email = JSON.parse(response)[0].Email;
						 sendEmail(email, orderStatus, order_id);
						 //console.log(email);
                    }
                });




            }
        }
    });

}




function assignRider(order_id, riderid) {

    var search = {
        "order_id": order_id,
        "riderid": riderid
    }
    $.ajax({
        url: 'assets/php/assignRider.php',
        type: 'POST',
        data: search,
        success: function(response) {
            console.log(response);

            $.notify("Redy" + " - " + order_id + " Assign Rider - " + riderid, "success");
            var table = $('#chefOrderPreparingTable').DataTable();
            var data = table.row($(clickRow).parents('tr')).data();
            table.row($(clickRow).parents('tr')).remove().draw();
        }
    });

}

//selectOnlineRider();
function selectOnlineRider(order_id) {
    $.ajax({
        url: 'assets/php/selectOnlineRider.php',
        type: 'POST',
        data: {},
        success: function(response) {
            if (response === 'null') {
                swal("Error!", "Rider is not Available!", "error");
            } else {
                var riderId = JSON.parse(response)[0].bPartnerId;
                assignRider(order_id, riderId);
            }
        }
    });
}



function sendEmail(email, orderStatus, orderId) {
    //alert("sendEmail");
    //userEmail  /  userPhone
    var emailMaP = {
        'email': email,
        'status': orderStatus,
        'orderId': orderId
    }
    $.ajax({
        url: 'sendEmail.php',
        type: 'POST',
        data: emailMaP,
        success: function(response) {
            //$.notify("Delivery"+" - "+order_id , "success");
            console.log(response);

        }
    });
}