
//ADDRESS FROM GOOGLE OR ADD MANUALLY
$("input[name='address_type']").change(function () {
  var checkVal = $(this).val();
  if (checkVal=='1') {
    $(".google_address").removeClass('hide_content');
    $(".manual_address").addClass('hide_content');
  }else if(checkVal=='2'){
    $(".manual_address").removeClass('hide_content');
    $(".google_address").addClass('hide_content');
  }

});
//--- END

//Enable disable duration  checkbox of
$("input[name='fin_cont_en_dis'],input[name='app_con_en_dis'],input[name='insp_con_en_dis'],input[name='hom_con_en_dis']").change(function () {
  var checkVal = $(this).val();
  if (checkVal=='yes') {
    $(this).closest('.duration_box').find('.active_disabled').prop("disabled",false);
  }else if(checkVal=='no'){
    $(this).closest('.duration_box').find('.active_disabled').prop('checked',false);
    $(this).closest('.duration_box').find('.active_disabled').prop("disabled",true);
  }

});

$(".active_disabled").click(function() {
    $(this).closest('.duration_box').find('.fin_con_yes').prop('checked',true);
});
//--- END

//SET EMD PRICE BY DEFAULT 
$("#listing_price").change(function () {
    var price = parseInt($(this).val());
    if (price) {
      var emd = price/100*0.5;
      var dueDel = price/100*0.25;
      $("#emd").val(emd);
      $("#duedelgenc").val(dueDel);
    }
});
//--- END

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
            "url": base_url+"/admin/properties",
            "type": "POST",
            "dataType": 'json',
            "data": function ( d ) {
              d.search = $('#search').val();
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
            { "data": "seller",className: "text-center",
              render: function (data, type, row) {
                var name = '<a href="'+base_url+'/admin/viewSellerAgent/'+row.seller.user_id+'"> '+row.seller.name+' </a>';
                return name;
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
                var checkBox = '<select id="listing_status" class="form-control form-control-sm icon_control dropdown_control " data-id="'+row.property_id+'"><option value="1"  '+status1+'>Active</option><option value="5" '+status0+'>Inactive</option><option value="2"  '+status2+'>Under Contract</option><option value="3"  '+status3+'>Closed</option><option value="4"  '+status4+'>Contract Signed</option></select>'
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
                var checkBox = '<select id="offer_status" class="form-control form-control-sm icon_control dropdown_control "  data-id="'+row.property_id+'"><option value="1"  '+status1+'>Accepted</option><option value="4" '+status0+'>Pending</option><option value="2"  '+status2+'>Denied</option><option value="3"  '+status3+'>Waiting</option></select>'
                return checkBox;
              }
            },
            
            { "data": "action", sortable:!1,
              render: function (data, type, row) {
                var view = '<a href="'+base_url+'/admin/properties/view/'+row.property_id+'"><img src="'+imagepath+'/ic_eye_color.png"></a>';
                var edit = '<a href="'+base_url+'/admin/properties/edit/'+row.property_id+'"><img src="'+imagepath+'/ic_mode_edit.png"></a>';
                var deletee = '<a onclick="triggerDelete('+row.property_id+')" href="javascript:void(0)"><img src="'+imagepath+'/ic_delete.png"></a>';
                
                return view+'\t\t\t\t\t\t'+edit+'\t\t\t\t\t\t'+deletee;

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
    base = base_url+'/admin/file-export';
    parms ='?offer_status='+offer_status+'&listing_status='+listing_status;
    url = base+parms;
    $('.offer_export_url').attr("href",url);
  });

  
  $("#filter_offer_status").on('change', function () {
    $('#listing').DataTable().ajax.reload();
    var url = '';
    var base ='';
    var parms = '';
    var offer_status = $(this).val();
    var listing_status = $('#filter_listing_status').val();
    base = base_url+'/admin/file-export';
    parms ='?offer_status='+offer_status+'&listing_status='+listing_status;
    url = base+parms;
    $('.offer_export_url').attr("href",url);
  });

  $("#search").on('keyup', function () {
    $('#listing').DataTable().ajax.reload();
  });

  $("form[name='add-form']").validate({
    errorClass: "error_msg",
     rules: {
        tranc_coordinator_name:{
          required:true,
        },
        realtors_name:{
          required:true,
        },
        listing_price:{
          required:true,
        },
        min_sales_price:{
          required:true,
        },
        seller_concessions:{
          required:true,
        },
        settlement_date:{
          required:true,
        },
        emd:{
          required:true,
        },
        due_diligence:{
          required:true,
        },
        insurance:{
          required:true,
        },
        property_tax:{
          required:true,
        },
        other_fee:{
          required:true,
        }
     },
      submitHandler: function(form, event) {
        event.preventDefault();
        showLoader(true);
        var formData = new FormData($(form)[0]);
        $.ajax({
          url: base_url+'/admin/properties/addPost',
          type: 'POST',
          processData: false,
          contentType: false,
          cache: false,              
          data: formData,
          success: function(result)
          {
              if(result.status){
                toastr.success(result.message);
                $('li a[data-slug="admin/properties"]').trigger("click");
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
    $('#did').val(cid);
    $('#status_offer').val(status);
    $( ".show_status_modal" ).click();
    $('#listing').DataTable().ajax.reload();
});

/*function triggerStatus(cid){
    $('#did').val(cid);
    $( ".show_status_modal" ).click();
}*/
function confirmStatus(cid){
  showLoader(true);
  var status = $('#status_val').val();
  var status_of = $('#status_offer').val();
  var cid = $('#did').val();
  $.ajax({
    url: base_url+'/admin/properties/status',
    type: 'POST',
    dataType:'json',
    cache: false,              
    data: {'cid':cid,'listing_status':status,'offer_status':status_of},
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
          toastr.success(result.message);
          $('#listing').DataTable().ajax.reload();
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



//SET MULTIPLE IMAGES 
$(function() {
    var names = [];
    $('body').on('change', '.picuploadForAll', function(event) {
        var $input = $(this);
        var ajaxData = new FormData();
        
        $.each(event.target.files,function(j, file){
            ajaxData.append('images['+j+']', file);
        })
        showLoader(true);
        $.ajax({
            url: base_url+'/admin/properties/addImage',
            cache: false,
            contentType: false,
            processData: false,
            data: ajaxData,
            type: 'POST',
            success: function(response) {
              var allImagedata = response.data;
               if(allImagedata != '' || allImagedata != null){
                $.each(allImagedata,function(key, value){
                    
                  var div = document.createElement("li");
                  div.innerHTML = "<input type='hidden' name='media[]' value='"+value.p_image_id+"'><img src='"+base_url+"/public/uploads/"+value.directory+"/"+value.image+"' title="+value.image+"/><div  class='post-thumb'><div class='inner-post-thumb'><a href='javascript:void(0);' class='remove-pic'  onclick='removegalleryimage("+value.p_image_id+")'><i class='fa fa-times' aria-hidden='true'></i></a><div></div>";

                  $input.parent().parent().before(div);

                });
               }
               showLoader(false);
            },
            error: function(error) {
              showLoader(false);
              console.log(error);
            }
        });
        
    });
    $('body').on('click', '.remove-pic', function() {
      $(this).parent().parent().parent().remove();
    });
});

function removegalleryimage(id){
  showLoader(true);
  $.ajax({
    type: "get",
    url: base_url+'/admin/properties/imageRemove/'+id,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(data) {
      showLoader(false);
    }
  });
}
