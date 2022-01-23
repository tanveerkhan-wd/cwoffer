

$(function() {


  var imagepath= base_url+'/public/images/';
  $('#cms_listing').on( 'processing.dt', function ( e, settings, processing ) {
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
            "url": base_url+"/admin/setting/cms",
            "type": "POST",
            "dataType": 'json',
            "data": function ( d ) {
              d.search = $('#search_cms').val();
            }
        },
        columns:[
            { "data": "index",className: "text-center"},
            
            { "data": "cms_title",className: "text-center"},
            { "data": "cms_description",className: "text-center"},
            { "data": "action", sortable:!1,
              render: function (data, type, row) {
                return'<a href="'+base_url+'/admin/setting/cms/edit/'+row.cms_id+'"><img src="'+imagepath+'/ic_mode_edit.png"></a>'
              }
            },
      ],

  });
/*Listing End*/


  $("#search_cms").on('keyup', function () {
        $('#cms_listing').DataTable().ajax.reload();
  });

});


$('#cms-tab').on('click', function() {
    $('.title').html('Settings > CMS');
});

$('#texts-tab').on('click', function() {
    $('.title').html('Settings > Texts');
});

$('#seo-setting-tab').on('click', function() {
    $('.title').html('Settings > SEO Settings');
});



//LOGO IMAGES 
$("#home_upload_profile").on('change', function () { 
  if( document.getElementById("home_upload_profile").files.length == 0 ){
      $('#home_img').attr('src', $('#home_img_tmp').val());
  }
    selectProfileHome(this);
});
function selectProfileHome(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var filename = input.files[0].name;
      var fileExtension = filename.substr((filename.lastIndexOf('.') + 1));
      var fileExtensionCase = fileExtension.toLowerCase();
      if (fileExtensionCase == 'png' || fileExtensionCase == 'jpeg' || fileExtensionCase == 'jpg' ) {
        reader.onload = function (e) {
            jQuery('#home_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);        
      }else{
        toastr.error($('#image_validation_msg').val());
        $('#home_upload_profile').val('');
        var home_img_tmp = base_url+"/public/images/user.png";
        $('#home_img').attr('src', home_img_tmp);
      }
  }
}

$("#ab_upload_profile").on('change', function () { 
  if( document.getElementById("ab_upload_profile").files.length == 0 ){
      $('#about_img').attr('src', $('#about_img_tmp').val());
  }
    selectProfileImageab(this);
});
function selectProfileImageab(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var filename = input.files[0].name;
      var fileExtension = filename.substr((filename.lastIndexOf('.') + 1));
      var fileExtensionCase = fileExtension.toLowerCase();
      if (fileExtensionCase == 'png' || fileExtensionCase == 'jpeg' || fileExtensionCase == 'jpg' ) {
        reader.onload = function (e) {
            jQuery('#about_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);        
      }else{
        toastr.error($('#image_validation_msg').val());
        $('#ab_upload_profile').val('');
        var img_tmp = base_url+"/public/images/user.png";
        $('#about_img').attr('src', img_tmp);
      }
  }
}


$("#seo_upload_profile").on('change', function () { 
  if( document.getElementById("seo_upload_profile").files.length == 0 ){
      $('#seo_img').attr('src', $('#seo_img_tmp').val());
  }
    selectProfileImageab(this);
});
function selectProfileImageab(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var filename = input.files[0].name;
      var fileExtension = filename.substr((filename.lastIndexOf('.') + 1));
      var fileExtensionCase = fileExtension.toLowerCase();
      if (fileExtensionCase == 'png' || fileExtensionCase == 'jpeg' || fileExtensionCase == 'jpg' ) {
        reader.onload = function (e) {
            jQuery('#seo_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);        
      }else{
        toastr.error($('#image_validation_msg').val());
        $('#seo_upload_profile').val('');
        var img_tmp = base_url+"/public/images/user.png";
        $('#seo_img').attr('src', img_tmp);
      }
  }
}

//LOGO IMAGES 
$("#upload_profile").on('change', function () { 
  if( document.getElementById("upload_profile").files.length == 0 ){
      $('#img').attr('src', $('#img_tmp').val());
  }
    selectProfile(this);
});
function selectProfile(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var filename = input.files[0].name;
      var fileExtension = filename.substr((filename.lastIndexOf('.') + 1));
      var fileExtensionCase = fileExtension.toLowerCase();
      if (fileExtensionCase == 'png' || fileExtensionCase == 'jpeg' || fileExtensionCase == 'jpg' ) {
        reader.onload = function (e) {
            jQuery('#img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);        
      }else{
        toastr.error($('#image_validation_msg').val());
        $('#upload_profile').val('');
        var img_tmp = base_url+"/public/images/user.png";
        $('#img').attr('src', img_tmp);
      }
  }
}

$("#email_upload_profile").on('change', function () { 
  if( document.getElementById("email_upload_profile").files.length == 0 ){
      $('#email_img').attr('src', $('#email_img_tmp').val());
  }
    selectProfileEmail(this);
});
function selectProfileEmail(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var filename = input.files[0].name;
      var fileExtension = filename.substr((filename.lastIndexOf('.') + 1));
      var fileExtensionCase = fileExtension.toLowerCase();
      if (fileExtensionCase == 'png' || fileExtensionCase == 'jpeg' || fileExtensionCase == 'jpg' ) {
        reader.onload = function (e) {
            jQuery('#email_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);        
      }else{
        toastr.error($('#image_validation_msg').val());
        $('#email_upload_profile').val('');
        var email_img_tmp = base_url+"/public/images/user.png";
        $('#email_img').attr('src', email_img_tmp);
      }
  }
}

$("#login_upload_profile").on('change', function () { 
  if( document.getElementById("login_upload_profile").files.length == 0 ){
      $('#login_img').attr('src', $('#login_img_tmp').val());
  }
    selectProfileLogin(this);
});
function selectProfileLogin(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      var filename = input.files[0].name;
      var fileExtension = filename.substr((filename.lastIndexOf('.') + 1));
      var fileExtensionCase = fileExtension.toLowerCase();
      if (fileExtensionCase == 'png' || fileExtensionCase == 'jpeg' || fileExtensionCase == 'jpg' ) {
        reader.onload = function (e) {
            jQuery('#login_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);        
      }else{
        toastr.error($('#image_validation_msg').val());
        $('#login_upload_profile').val('');
        var login_img_tmp = base_url+"/public/images/user.png";
        $('#login_img').attr('src', login_img_tmp);
      }
  }
}

//--END LOGO IMAGES 


//INtro 1 PAGE
$("form[name='intro-one-form']").validate({
  errorClass: "error_msg",
   rules: {
      intro_one_line_1:{
        required:true,
      },
      intro_one_line_2:{
        required:true,
      }
   },
    submitHandler: function(form, event) {
    event.preventDefault();
    showLoader(true);
    var formData = new FormData($(form)[0]);
    $.ajax({
        url: base_url+'/admin/setting/editIntroOne',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
            if(result.status){
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
});

//INtro 2 PAGE
$("form[name='intro-two-form']").validate({
  errorClass: "error_msg",
   rules: {
      intro_two_line_1:{
        required:true,
      },
      intro_two_line_2:{
        required:true,
      }
   },
    submitHandler: function(form, event) {
    event.preventDefault();
    showLoader(true);
    var formData = new FormData($(form)[0]);
    $.ajax({
        url: base_url+'/admin/setting/editIntroTwo',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
            if(result.status){
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
});


// ABOUT US PAGE
$("form[name='home-form']").validate({
  errorClass: "error_msg",
   rules: {
      home_tagline_1:{
        required:true,
      },
      home_tagline_2:{
        required:true,
      },
      home_button:{
        required:true,
      }
   },
    submitHandler: function(form, event) {
    event.preventDefault();
    showLoader(true);
    var formData = new FormData($(form)[0]);
    $.ajax({
        url: base_url+'/admin/setting/editHome',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
            if(result.status){
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
});


// DOWNLOAD LINK PAGE
$("form[name='intro-offer-range-form']").validate({
  errorClass: "error_msg",
   rules: {
      intro_offer_line_1:{
        required:true,
      },
      intro_offer_line_2:{
        required:true,
      },
      intro_offer_option_1:{
        required:true,
      },
      intro_offer_option_2:{
        required:true,
      }
   },
    submitHandler: function(form, event) {
    event.preventDefault();
    showLoader(true);
    var formData = new FormData($(form)[0]);
    $.ajax({
        url: base_url+'/admin/setting/editIntroOffer',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
            if(result.status){
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
});


// SEO SETTINGS PAGE
$("form[name='seo-form']").validate({
  errorClass: "error_msg",
   rules: {
      seo_title:{
        required:true,
      },
      seo_description:{
        required:true,
      }
   },
    submitHandler: function(form, event) {
    event.preventDefault();
    showLoader(true);
    var formData = new FormData($(form)[0]);
    $.ajax({
        url: base_url+'/admin/setting/editSeo',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
            if(result.status){
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
});



// Contact SETTINGS PAGE
$("form[name='assist-me-form']").validate({
  errorClass: "error_msg",
   rules: {
      assist_text:{
        required:true,
      },
      assist_button_text:{
        required:true,
      }
   },
    submitHandler: function(form, event) {
    event.preventDefault();
    showLoader(true);
    var formData = new FormData($(form)[0]);
    $.ajax({
        url: base_url+'/admin/setting/editAssistMe',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
            if(result.status){
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
});



// Offer Approved
$("form[name='offer-approved-form']").validate({
  errorClass: "error_msg",
   rules: {
      offer_app_line_1:{
        required:true,
      },
      offer_app_line_2:{
        required:true,
      },
      offer_app_btn_txt:{
        required:true,
      }
   },
    submitHandler: function(form, event) {
    event.preventDefault();
    showLoader(true);
    var formData = new FormData($(form)[0]);
    $.ajax({
        url: base_url+'/admin/setting/editOfferApproved',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
            if(result.status){
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
});


// AGENT FORM
$("form[name='agent-form']").validate({
  errorClass: "error_msg",
   rules: {
      agent_line_1:{
        required:true,
      },
      agent_line_2:{
        required:true,
      },
      agent_line_3:{
        required:true,
      },
      agent_title_1:{
        required:true,
      },
      agent_title_2:{
        required:true,
      },
      agent_title_3:{
        required:true,
      },
      agent_btn_txt:{
        required:true,
      }
   },
    submitHandler: function(form, event) {
    event.preventDefault();
    showLoader(true);
    var formData = new FormData($(form)[0]);
    $.ajax({
        url: base_url+'/admin/setting/editAgentText',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
            if(result.status){
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
});


// AGENT FORM
$("form[name='general-form']").validate({
  errorClass: "error_msg",
   rules: {
      
   },
    submitHandler: function(form, event) {
    event.preventDefault();
    showLoader(true);
    var formData = new FormData($(form)[0]);
    $.ajax({
        url: base_url+'/admin/setting/editGeneralLogo',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
            if(result.status){
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
});


// AGENT FORM
$("form[name='offer-not-approved-form']").validate({
  errorClass: "error_msg",
   rules: {
      agent_not_approved_text:{
        required:true,
      },
      agent_not_approved_btn:{
        required:true,
      }
   },
    submitHandler: function(form, event) {
    event.preventDefault();
    showLoader(true);
    var formData = new FormData($(form)[0]);
    $.ajax({
        url: base_url+'/admin/setting/editOfferNotApproved',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
            if(result.status){
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
});


// AGENT FORM
$("form[name='smtp-form']").validate({
  errorClass: "error_msg",
   rules: {
      mailer:{
        required:true,
      },
      host:{
        required:true,
      },
      port:{
        required:true,
      },
      email:{
        required:true,
      },
      password:{
        required:true,
      },
      encript:{
        required:true,
      }
   },
    submitHandler: function(form, event) {
    event.preventDefault();
    showLoader(true);
    var formData = new FormData($(form)[0]);
    $.ajax({
        url: base_url+'/admin/setting/editSmtp',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,              
        data: formData,
        success: function(result)
        {
            if(result.status){
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
});

