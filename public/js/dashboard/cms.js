$(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('body');
    //bootstrap WYSIHTML5 - text editor   
  });

//Liting
$(function() {

  var imagepath= base_url+'/public/images/';
  $('#cms_listing').on( 'processing.dt', function ( e, settings, processing ) {
        if(processing){
          showLoader(true);
        }else{
          showLoader(false);
        }
    } ).DataTable({
        "columnDefs": [{
          "targets": 3,
          "createdCell": function (td, cellData, rowData, row, col) {
            if ( cellData == 0 ) {
              $(td).addClass('active_status');
            }else{
              $(td).addClass('disable_status');
            }
          }
        }],
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
            "url": base_url+"/admin/cms",
            "type": "POST",
            "dataType": 'json',
            "data": function ( d ) {
              d.search = $('#search_cms').val();
            }
        },
        columns:[
            { "data": "index",className: "text-center"},
            
            { "data": "name_hi",sortable:!1,className: "text-center"},
            { "data": "name_en",sortable:!1,className: "text-center"},

            /*{ "data": "desc_hi",sortable:!1,className: "text-center"},
            { "data": "desc_en",sortable:!1,className: "text-center"},
            */
            { "data": "status", sortable:!1,className: "text-center",
                render: function (data, type, row) {
                  var status = row.status==1 ? 'Active' :'Inactive';
                  return '<span><a href="javascript:void(0)" onclick="triggerStatus('+row.cms_id+')">'+status+'</span></a>'
                }
            },
            { "data": "status", sortable:!1,
              render: function (data, type, row) {
                //<a onclick="triggerDelete('+row.cms_id+')" href="javascript:void(0)"><img src="'+imagepath+'/ic_delete.png"></a>
                //<a cid="'+row.cms_id+'" onclick="triggerView('+row.cms_id+')" href="javascript:void(0)"><img src="'+imagepath+'/ic_eye_color.png"></a>\t\t\t\t\t\t
                return'<a href="'+base_url+'/admin/editCms/'+row.cms_id+'"><img src="'+imagepath+'/ic_mode_edit.png"></a>'
              }
            },
      ],

  });
/*Listing End*/


  $("#search_cms").on('keyup', function () {
        $('#cms_listing').DataTable().ajax.reload();
  });

  $("form[name='add-cms-form']").validate({
    errorClass: "error_msg",
     rules: {
        title:{
          required:true,
        },
        body:{
          required:true,
        },
        seo_meta_title:{
          required:true,
        },
        seo_meta_description:{
          required:true,
        }
     },
      submitHandler: function(form, event) {
       event.preventDefault();
       showLoader(true);

      for ( instance in CKEDITOR.instances )
      CKEDITOR.instances[instance].updateElement();

      var formData = new FormData($(form)[0]);
      $.ajax({
          url: base_url+'/admin/setting/addCms',
          type: 'POST',
          processData: false,
          contentType: false,
          cache: false,              
          data: formData,
          success: function(result)
          {
              if(result.status){
                toastr.success(result.message);
                location.href = base_url+'/admin/settings';
                for ( instance in CKEDITOR.instances )
                CKEDITOR.instances[instance].updateElement();
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



function triggerStatus(cid){
   $('#did').val(cid);
   $( ".show_status_modal" ).click();
}


function confirmStatus(cid){
  showLoader(true);
  var cid = $('#did').val();
  $.ajax({
    url: base_url+'/admin/statusCms',
    type: 'POST',
    dataType:'json',
    cache: false,              
    data: {'cid':cid},
    success: function(result)
    {
        if(result.status){
          $('#status_prompt').modal('hide');
          $('#cms_listing').DataTable().ajax.reload();
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
