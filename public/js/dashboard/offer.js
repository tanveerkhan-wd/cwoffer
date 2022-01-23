
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
            "url": base_url+"/admin/offers",
            "type": "POST",
            "dataType": 'json',
            "data": function ( d ) {
              d.search = $('#search').val();
              d.contarct_received = $('#filter_contarct_received').val();
              d.user_type = $('#filter_user_type').val();
              d.pkProId = $('#pkProId').val();
            }
        },
        columns:[
            { "data": "index",className: "text-center"},
            { "data": "created_at",className: "text-center"},
            { "data": "offer_id",className: "text-center",
              render: function (data, type, row) {
                var p_id = 'ORD'+row.offer_id;
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
                var name = row.property_det.seller.name;
                return name;
              }
            },
            
            { "data": "user_type",className: "text-center",
              render: function (data, type, row) {
                var type = row.user_type==1?'Buyer':'Buyer Agent';
                var name = row.name;
                return type+' | '+name;
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

            { "data": "buyer_offer",className: "text-center"},
            
            { "data": "contract_received",className: "text-center",
              render: function (data, type, row) {
                var status = row.contract_received,
                    status0 = '',
                    status1 = '';
                if (status==0) {status0 = 'selected';}
                if (status==1) {status1 = 'selected';}
                var checkBox = '<select id="contract_received" class="form-control form-control-sm icon_control dropdown_control"  data-id="'+row.offer_id+'"><option value="1"  '+status1+'>Yes</option><option value="2" '+status0+'>No</option></select>'
                return checkBox;
              }
            },
            { "data": "action", sortable:!1,
              render: function (data, type, row) {
                var accept = '';
                var reject = '';
                var view = '<a href="'+base_url+'/'+global_user_type+'/offers/view/'+row.offer_id+'"><img src="'+imagepath+'/ic_eye_color.png"></a>';
                if (row.offer_status==2) {
                  reject = '<span style="color:red;font-size:13px;">Rejected</span>'
                }else if(row.offer_status==1){
                  accept = '<span style="color:green;font-size:13px;">Accepted</span>'
                }else if(row.property_det.offer_status==1){
                  reject = '<span style="color:red;font-size:13px;">Rejected</span>'
                }else{
                  accept = '<a onclick="triggerAccept('+row.property_id+','+row.offer_id+')" href="javascript:void(0)"><img src="'+imagepath+'/check.png"></a>';
                  reject = '<a onclick="triggerReject('+row.property_id+','+row.offer_id+')" href="javascript:void(0)"><img src="'+imagepath+'/close.png"></a>';
                }
                return view+' \t\t\t\t\t\t\t\t ' +accept+ ' \t\t\t\t\t\t\t\t '+reject;
              }
            },
      ],

    });
    /*Listing End*/
  
    $("#filter_contarct_received").on('change', function () {
      $('#listing').DataTable().ajax.reload();
      var url = '';
      var base ='';
      var parms = '';
      var type = $('#filter_user_type').val();
      var contract = $(this).val();
      var seller_id = $("#seller_id").val();
      if (seller_id) {
        base = base_url+'/seller/file-export-all-offer';
        parms ='?user='+seller_id+'&type='+type+'&contarct='+contract;
      }else{
        base = base_url+'/admin/file-export-all-offer';
        parms ='?type='+type+'&contarct='+contract;
      }
      url = base+parms;
      $('.offer_export_url').attr("href",url);
    });
    
    $("#filter_user_type").on('change', function () {
      $('#listing').DataTable().ajax.reload();
      var url = '';
      var base ='';
      var parms = '';
      var type = $(this).val();
      var contract = $('#filter_contarct_received').val();
      var seller_id = $("#seller_id").val();
      if (seller_id) {
        base = base_url+'/seller/file-export-all-offer';
        parms ='?user='+seller_id+'&type='+type+'&contarct='+contract;
      }else{
        base = base_url+'/admin/file-export-all-offer';
        parms ='?type='+type+'&contarct='+contract;
      }
      url = base+parms;
      $('.offer_export_url').attr("href",url);
    });

    $("#search").on('keyup', function () {
      $('#listing').DataTable().ajax.reload();
    });


});


$(document).on('change','#contract_received',function(){
    var cid = $(this).attr('data-id');
    $('#did').val(cid);
    $( ".show_status_modal" ).click();
    $('#listing').DataTable().ajax.reload();
});

function confirmStatus(cid){
  showLoader(true);
  var cid = $('#did').val();
  $.ajax({
    url: base_url+'/admin/offer/contractStatus',
    type: 'POST',
    dataType:'json',
    cache: false,              
    data: {'cid':cid},
    success: function(result)
    {
        if(result.status){
          $('#status_prompt').modal('hide');
          $('#listing').DataTable().ajax.reload();
          toastr.success(result.message);
        }else{
          toastr.error(result.message);
        }
        
        showLoader(false);
    },
    error: function(data)
    {
        toastr.error($('#something_wrong_txt').val());
        showLoader(false);
    }
  });
}

function triggerAccept(cid,accept){
  showLoader(true);
  $.ajax({
    url: base_url+'/admin/offer/accept',
    type: 'POST',
    dataType:'json',
    cache: false,              
    data: {'cid':cid,'accept':accept},
    success: function(result)
    {
        if(result.status){
          $('#listing').DataTable().ajax.reload();
          toastr.success(result.message);
        }else{
          toastr.error(result.message);
        }
        
        showLoader(false);
    },
    error: function(data)
    {
        toastr.error($('#something_wrong_txt').val());
        showLoader(false);
    }
  });
}

function triggerReject(cid,offer_id){
  showLoader(true);
  $.ajax({
    url: base_url+'/admin/offer/reject',
    type: 'POST',
    dataType:'json',
    cache: false,              
    data: {'cid':cid,'offer_id':offer_id},
    success: function(result)
    {
        if(result.status){
          $('#listing').DataTable().ajax.reload();
          toastr.success(result.message);
        }else{
          toastr.error(result.message);
        }
        
        showLoader(false);
    },
    error: function(data)
    {
        toastr.error($('#something_wrong_txt').val());
        showLoader(false);
    }
  });
}