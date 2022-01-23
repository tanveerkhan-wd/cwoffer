
$(function() {


  var imagepath= base_url+'/public/images/';
  $('#listing').on( 'processing.dt', function ( e, settings, processing ) {
        if(processing){
          showLoader(true);
        }else{
          showLoader(false);
        }
    } ).DataTable({
        "language": {
          "sLengthMenu": $('#show_txt').val()+" _MENU_ "+$('#entries_txt').val(),
          "info": $('#showing_txt').val()+" _START_ "+$('#to_txt').val()+" _END_ "+$('#of_txt').val()+" _TOTAL_ "+$('#entries_txt').val(),
          "emptyTable": $('#msg_no_data_available_table').val(),
          "paginate": {
            "previous": $('#previous_txt').val(),
            "next": $('#next_txt').val()
          }
        },
        "lengthMenu": [10,20,30,50],
        "searching": false,
        "serverSide": true,
        "deferRender": true,
        "ajax": {
            "url": base_url+"/admin/leads",
            "type": "POST",
            "dataType": 'json',
            "data": function ( d ) {
              d.search = $('#search').val();
            }
        },
        columns:[
            { "data": "index",className: "text-center"},
            { "data": "created_at",className: "text-center"},
            { "data": "lead_id",className: "text-center",
              render: function (data, type, row) {
                var p_id = 'LED'+row.lead_id;
                return p_id;
              }
            },

            { "data": "Seller",sortable:!1,className: "text-center",
              render: function (data, type, row) {
                var name = '';
                if (row.isSeller) {
                  name = row.property_det.seller.name;
                }else{
                  name = '<a href="'+base_url+'/admin/viewSellerAgent/'+row.property_det.seller.user_id+'"> '+row.property_det.seller.name+' </a>';
                }
                return name;
              }
            },


            { "data": "Tranc_coor",sortable:!1,className: "text-center",
              render: function (data, type, row) {
                var name = row.property_det.tranc_coordinator_name;
                return name;
              }
            },
            
            { "data": "name",className: "text-center",
              render: function (data, type, row) {
                return row.name;
              }
            },
            
            { "data": "email",className: "text-center",
              render: function (data, type, row) {
                var email = row.email;
                var phone = row.phone;
                return email+' | '+phone;
              }
            },
            
            { "data": "address",sortable:!1,className: "text-center",
              render: function (data, type, row) {
                var address ='';
                if (row.property_det.address_type==1) {
                  address = row.property_det.address;
                }else{
                  address = row.property_det.manual_address+' '+row.property_det.address;
                }
                return address;
              }
            },
            
      ],

    });
    /*Listing End*/
  
    $("#search").on('keyup', function () {
      $('#listing').DataTable().ajax.reload();
    });

});