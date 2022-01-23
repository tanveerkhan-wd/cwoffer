
$(function() {

  $('#profile-tab').on('click', function() {
      $('.title').html('<a class="ajax_request" data-slug="admin/sellerAgents" href="'+base_url+'/admin/sellerAgents"><span>Seller Agents</span></a> > Details');
  });

  $('#properties-tab').on('click', function() {
      $('.title').html('<a class="ajax_request" data-slug="admin/sellerAgents" href="'+base_url+'/admin/sellerAgents"><span>Seller Agents</span></a> > Properties');
  });

  $('#offers-tab').on('click', function() {
      $('.title').html('<a class="ajax_request" data-slug="admin/sellerAgents" href="'+base_url+'/admin/sellerAgents"><span>Seller Agents</span></a> > Offers');
  });

  $('#leads-tab').on('click', function() {
      $('.title').html('<a class="ajax_request" data-slug="admin/sellerAgents" href="'+base_url+'/admin/sellerAgents"><span>Seller Agents</span></a> > Leads');
  });

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
            "url": base_url+"/admin/sellerAgent/propertyList",
            "type": "POST",
            "dataType": 'json',
            "data": function ( d ) {
              d.search = $('#search').val();
              d.pkCat = $('#pkCat').val();
              d.listing_status = $('#filter_listing_status').val();
              d.offer_status = $('#filter_offer_status').val();
            }
        },
        columns:[
            { "data": "index",className: "text-center"},
            { "data": "created_at",className: "text-center"},
            { "data": "property_id",className: "text-center",
              render: function (data, type, row) {
                var p_id = 'PRO'+row.property_id;
                return p_id;
              }
            },
            
            { "data": "address",className: "text-center",
              render: function (data, type, row) {
                var a_type = row.address_type;
                var address = row.address;
                var man_address = row.manual_address;
                var add='None';
                if (a_type==1) {
                  add = address;
                }
                if (a_type==2) {
                  add = man_address+' '+address; 
                }
                return add;
              }
            },
            { "data": "min_sales_price",className: "text-center",
              render: function (data, type, row) {
                var min_sales_price = row.min_sales_price;
                return min_sales_price;
              }
            },
            { "data": "listing_status",className: "text-center",
              render: function (data, type, row) {
                var status = row.listing_status;
                var status0 = '';
                var status1 = '';
                var status2 = '';
                var status3 = '';
                var status4 = '';
                if (status==0) {
                  status0 = 'selected';
                }
                if (status==1) {
                  status1 = 'selected';
                }
                if (status==2) {
                  status2 = 'selected';
                }
                if (status==3) {
                  status3 = 'selected';
                }
                if (status==4) {
                  status4 = 'selected';
                }
                var checkBox = '<select id="listing_status" class="form-control form-control-sm icon_control dropdown_control" data-id="'+row.property_id+'"><option value="1"  '+status1+'>Active</option><option value="5" '+status0+'>Inactive</option><option value="2"  '+status2+'>Under Contract</option><option value="3"  '+status3+'>Closed</option><option value="4"  '+status4+'>Contract Signed</option></select>'
                return checkBox;
              }
            },
            { "data": "offer_status",className: "text-center",
              render: function (data, type, row) {
                var status = row.offer_status,
                    status0 = '',
                    status1 = '',
                    status2 = '',
                    status3 = '';
                if (status==0) {status0 = 'selected';}
                if (status==1) {status1 = 'selected';}
                if (status==2) {status2 = 'selected';}
                if (status==3) {status3 = 'selected';}
                var checkBox = '<select id="offer_status" class="form-control form-control-sm icon_control dropdown_control"  data-id="'+row.property_id+'"><option value="1"  '+status1+'>Accepted</option><option value="4" '+status0+'>Pending</option><option value="2"  '+status2+'>Denied</option><option value="3"  '+status3+'>Waiting</option></select>'
                return checkBox;
              }
            },

            { "data": "action", sortable:!1,
              render: function (data, type, row) {
                var view = '<a href="'+base_url+'/admin/properties/view/'+row.property_id+'"><img src="'+imagepath+'/ic_eye_color.png"></a>';
                var edit = '<a href="'+base_url+'/admin/properties/edit/'+row.property_id+'"><img src="'+imagepath+'/ic_mode_edit.png"></a>';
                var deletee = '<a onclick="triggerDelete('+row.property_id+')" href="javascript:void(0)"><img src="'+imagepath+'/ic_delete.png"></a>';
              
                return edit+'\t\t\t\t\t\t'+view+'\t\t\t\t\t\t'+deletee;

              }
            },
      ],

    });
  /*Listing End*/
    
    
    $("#filter_listing_status").on('change', function () {
      $('#listing').DataTable().ajax.reload();
      var url = '';
      var base ='';
      var parms = '';
      var offer_status = $('#filter_offer_status').val();
      var listing_status = $(this).val();
      var seller_id = $("#seller_id").val();
      base = base_url+'/admin/file-export';
      parms ='?user='+seller_id+'&offer_status='+offer_status+'&listing_status='+listing_status;
      url = base+parms;
      $('.pro_export_url').attr("href",url);
    });

    
    $("#filter_offer_status").on('change', function () {
      $('#listing').DataTable().ajax.reload();
      var url = '';
      var base ='';
      var parms = '';
      var offer_status = $(this).val();
      var listing_status = $('#filter_listing_status').val();
      var seller_id = $("#seller_id").val();
      base = base_url+'/admin/file-export';
      parms ='?user='+seller_id+'&offer_status='+offer_status+'&listing_status='+listing_status;
      url = base+parms;
      $('.pro_export_url').attr("href",url);
    });

    $("#search").on('keyup', function () {
      $('#listing').DataTable().ajax.reload();
    });



    //OFFER
    $('#offer_listing').on( 'processing.dt', function ( e, settings, processing ) {
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
                d.search = $('#offer_search').val();
                d.contarct_received = $('#filter_contarct_received').val();
                d.user_type = $('#filter_user_type').val();
                d.pkCat = $('#pkCat').val();
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

              { "data": "Tranc_coor",sortable:!1,className: "text-center",
                render: function (data, type, row) {
                  var name = row.property_det.seller.name;
                  return name;
                }
              },
              
              { "data": "user_type",className: "text-center",
                render: function (data, type, row) {
                  var type = row.user_type==1?'Buyer':'Buyer Agent';;
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
                  var a_type = row.property_det.address_type;
                  var address = row.property_det.address;
                  var man_address = row.property_det.manual_address;
                  var add='None';
                  if (a_type==1) {
                    add = address;
                  }
                  if (a_type==2) {
                    add = man_address+' '+address; 
                  }
                  return add;
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
        $('#offer_listing').DataTable().ajax.reload();
        var url = '';
        var base ='';
        var parms = '';
        var type = $('#filter_user_type').val();
        var contract = $(this).val();
        var seller_id = $("#seller_id").val();
        base = base_url+'/admin/file-export-all-offer';
        parms ='?user='+seller_id+'&type='+type+'&contarct='+contract;
        url = base+parms;
        $('.offer_export_url').attr("href",url);
      });
      
      $("#filter_user_type").on('change', function () {
        $('#offer_listing').DataTable().ajax.reload();
        var url = '';
        var base ='';
        var parms = '';
        var type = $(this).val();
        var contract = $('#filter_contarct_received').val();
        var seller_id = $("#seller_id").val();
        base = base_url+'/admin/file-export-all-offer';
        parms ='?user='+seller_id+'&type='+type+'&contarct='+contract;
        url = base+parms;
        $('.offer_export_url').attr("href",url);
      });

      $("#offer_search").on('keyup', function () {
        $('#offer_listing').DataTable().ajax.reload();
      });


      //LEADS
      $('#lead_listing').on( 'processing.dt', function ( e, settings, processing ) {
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
              d.search = $('#lead_search').val();
              d.pkCat = $('#pkCat').val();
              
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
                var a_type = row.property_det.address_type;
                var address = row.property_det.address;
                var man_address = row.property_det.manual_address;
                var add='None';
                if (a_type==1) {
                  add = address;
                }
                if (a_type==2) {
                  add = man_address+' '+address; 
                }
                return add;
              }
            },
            
      ],

    });
    /*Listing End*/
  
    $("#lead_search").on('keyup', function () {
      $('#lead_listing').DataTable().ajax.reload();
    });

});

$(document).on('change','#listing_status',function(){
    var status = $(this).val();
    var cid = $(this).attr('data-id');
    $('#did').val(cid);
    $('#status_val').val(status);
    $( ".show_status_modal" ).click();
    $('#listing').DataTable().ajax.reload();
});
$(document).on('change','#offer_status',function(){
    var status = $(this).val();
    var cid = $(this).attr('data-id');
    $('#did1').val(cid);
    $('#status_offer').val(status);
    $( ".show_offer_status_modal" ).click();
    $('#listing').DataTable().ajax.reload();
});


function confirmListStatus(cid){
  showLoader(true);
  var status = $('#status_val').val();
  var cid = $('#did').val();
  $.ajax({
    url: base_url+'/admin/properties/status',
    type: 'POST',
    dataType:'json',
    cache: false,              
    data: {'cid':cid,'listing_status':status},
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

function confirmOfferStatus(cid){
  showLoader(true);
  var status_of = $('#status_offer').val();
  var cid = $('#did1').val();
  $.ajax({
    url: base_url+'/admin/properties/status',
    type: 'POST',
    dataType:'json',
    cache: false,              
    data: {'cid':cid,'offer_status':status_of},
    success: function(result)
    {
        if(result.status){
          $('#status_prompt1').modal('hide');
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

function triggerDelete(cid){
  $('#did').val(cid);   
  $( ".show_delete_modal" ).click();
  $('#listing').DataTable().ajax.reload();
}

function confirmDelete(){
  showLoader(true);
  var cid = $('#did').val();
  $.ajax({
    url: base_url+'/admin/properties/delete',
    type: 'POST',
    dataType:'json',
    cache: false,              
    data: {'cid':cid},
    success: function(result)
    {
        $('#delete_prompt').modal('hide');
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


$(document).on('change','#contract_received',function(){
    var cid = $(this).attr('data-id');
    $('#did2').val(cid);
    $( ".show_cont_status_modal" ).click();
    $('#offer_listing').DataTable().ajax.reload();
});

function confirmContrStatus(cid){
  showLoader(true);
  var cid = $('#did2').val();
  $.ajax({
    url: base_url+'/admin/offer/contractStatus',
    type: 'POST',
    dataType:'json',
    cache: false,              
    data: {'cid':cid},
    success: function(result)
    {
        if(result.status){
          $('#status_prompt2').modal('hide');
          $('#offer_listing').DataTable().ajax.reload();
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
          $('#offer_listing').DataTable().ajax.reload();
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
          $('#offer_listing').DataTable().ajax.reload();
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