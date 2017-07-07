jQuery(function ($) {
  'use strict',
          //#main-slider
          $(function () {
            $('#main-slider.carousel').carousel({
              interval: 8000
            });
          });


  // accordian
  $('.accordion-toggle').on('click', function () {
    $(this).closest('.panel-group').children().each(function () {
      $(this).find('>.panel-heading').removeClass('active');
    });

    $(this).closest('.panel-heading').toggleClass('active');
  });

  //Initiat WOW JS
  new WOW().init();

  // portfolio filter
  $(window).load(function () {
    'use strict';
    var $portfolio_selectors = $('.portfolio-filter >li>a');
    var $portfolio = $('.portfolio-items');
    $portfolio.isotope({
      itemSelector: '.portfolio-item',
      layoutMode: 'fitRows'
    });

    $portfolio_selectors.on('click', function () {
      $portfolio_selectors.removeClass('active');
      $(this).addClass('active');
      var selector = $(this).attr('data-filter');
      $portfolio.isotope({filter: selector});
      return false;
    });
  });

  // Contact form
  var form = $('#main-contact-form');
  form.submit(function (event) {
    event.preventDefault();
    var form_status = $('<div class="form_status"></div>');
    $.ajax({
      url: $(this).attr('action'),
      beforeSend: function () {
        form.prepend(form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn());
      }
    }).done(function (data) {
      form_status.html('<p class="text-success">' + data.message + '</p>').delay(3000).fadeOut();
    });
  });


  //goto top
  $('.gototop').click(function (event) {
    event.preventDefault();
    $('html, body').animate({
      scrollTop: $("body").offset().top
    }, 500);
  });

  //Pretty Photo
  $("a[rel^='prettyPhoto']").prettyPhoto({
    social_tools: false
  });

  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');
  allBackBtn = $('.backBtn');

  allWells.hide();

  navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
            $item = $(this);

    if (!$item.hasClass('disabled')) {
      navListItems.removeClass('btn-primary').addClass('btn-default');
      $item.addClass('btn-primary');
      allWells.hide();
      $target.show();
      $target.find('input:eq(0)').focus();
    }
  });

var validEmail=true;
   var userForm = $('#user_reg');
  $("#password-re").on('keyup', function () {
    var pass = $("#user_reg input[name='password']").val();
    if (pass != $(this).val()) {
      $(this).closest(".form-group").addClass("has-error");
    }
    else {
      $(this).closest(".form-group").removeClass("has-error");
    }
  });
  userForm.on('submit', function (e) {
    
    var form_status=$('#status');
  //  e.preventDefault();
    // allNextBtn.trigger('click');
     //userForm.submit();
//    var postData = $(this).serializeArray();
//    var formURL = $(this).attr("action");
//    $.ajax({
//      url: formURL,
//      type: "POST",
//      data: postData,
//      dataType: 'json',
//      beforeSend: function () {
//        userForm.prepend(form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Processing...</p>').fadeIn());
//      },
//      success: function (data, textStatus, jqXHR)
//      {
//        allNextBtn.trigger('click');
//        swal("Welcome","Registration Successful","success");
//        //data: return data from server
//      },
//      error: function (jqXHR, textStatus, errorThrown)
//      {
//        //if fails      
//      }
//    });

  });

   
  $("#user_reg").on("change","input[type='email']",function(){
     var formURL =$('#site_url').val()+'/welcome/validateEmail';
    var postData={'email':$(this).val()};
    $.ajax({
      url: formURL,
      type: "POST",
      data: postData,
      dataType: 'json',
      success: function (data, status, jqXHR)
      {
        if(data){
          $(this).closest(".form-group").removeClass("has-error");
        }
        else{
          validEmail=false;
          swal("Error","Email already exist","error");
           $("#user_reg input[type='email']").val('');
          $(this).focus();
          $(this).closest(".form-group").addClass("has-error");
          $(this).closest(".form-group").append("Email already exist");
          
        }
        //data: return data from server
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        return textStatus;  
      }
    });
  });
  
   allNextBtn.click(function () {
    var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='password'],input[type='email'],input[type='checkbox']"),
            isValid = true;
            
    $(".form-group").removeClass("has-error");
    for (var i = 0; i < curInputs.length; i++) {
      if (!curInputs[i].validity.valid) {
        isValid = false;
        $(curInputs[i]).closest(".form-group").addClass("has-error");
      }
    }
    if(curStepBtn=='step-2'){
      if(!validEmail){
        $("input[type='email']").closest(".form-group").addClass("has-error");
        isValid=false;
      }
     
var pass = $("#user_reg input[name='password']").val();
     var re_pass = $("#password-re").val();
    if (pass!=='' && re_pass!=='' && pass === re_pass) {
      isValid=true;
      $("#password-re").closest(".form-group").removeClass("has-error");
    }
    else {
       $("#password-re").closest(".form-group").addClass("has-error");
      isValid=false;
    }
    }
    if(curStepBtn=='step-3'){
      if($("input[type='checkbox']").is(':checked')){
        isValid=true;
      }
      else{
        isValid=false;
      }
    }

    if (isValid)
      nextStepWizard.removeAttr('disabled').trigger('click');
  });
allBackBtn.click(function(){
  var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            previousStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");
            previousStepWizard.removeAttr('disable').trigger('click');
})


  $('div.setup-panel div a.btn-primary').trigger('click');
$('.dataTable').DataTable({
        "scrollY":        "350px",
        "scrollCollapse": true,
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false
    } );
    
    $('.dataTable2').DataTable({
        "scrollY":        "350px",
        "scrollX":true,
        "scrollCollapse": false,
        "paging":   false,
        "ordering": false,
        "info":     false,
        "searching": false
    } );
});