var ChartColor = ["#5D62B4", "#54C3BE", "#EF726F", "#F9C446", "rgb(93.0, 98.0, 180.0)", "#21B7EC", "#04BCCC"];
var primaryColor = getComputedStyle(document.body).getPropertyValue('--primary');
var secondaryColor = getComputedStyle(document.body).getPropertyValue('--secondary');
var successColor = getComputedStyle(document.body).getPropertyValue('--success');
var warningColor = getComputedStyle(document.body).getPropertyValue('--warning');
var dangerColor = getComputedStyle(document.body).getPropertyValue('--danger');
var infoColor = getComputedStyle(document.body).getPropertyValue('--info');
var darkColor = getComputedStyle(document.body).getPropertyValue('--dark');
var lightColor = getComputedStyle(document.body).getPropertyValue('--light');

// if (typeof jQuery == 'undefined') {
// 	alert('oh no');
// }
// else{
// 	alert( typeof jQuery);
// }

//Image Review
function previewImage() {
  var file = document.getElementById("logo").files;
  if (file.length > 0) {
      var fileReader = new FileReader();

      fileReader.onload = function(event) {
          document.getElementById("preview").setAttribute("src", event.target.result);
      };
      fileReader.readAsDataURL(file[0]);
  }
}

//Olahraga Add
$('thead').on('click', '.addRow', function() {
  var tr = "<tr>" +
      "<td>" +
      "<div class='form-group'>" +
      "<label>Nomor Lomba</label>" +
      "<input type='text' class='form-control' placeholder='Ex. Tunggal Putra' style='text-transform:capitalize;' name='nomor[]'>" +
      "</div>" +
      "</td>" +
      "<td>" +
      "<div class='form-group mb-3'>" +
      "<label></label>" +
      "<a href='javascript::void(1)' class='deleteRow btn btn-danger' style='float:right;'>-</a>" +
      "</div>" +
      "</td>" +
      "</tr>"
  $('tbody').append(tr);
});

$('tbody').on('click', '.deleteRow', function() {
  $(this).parent().parent().parent().remove();
});
//

//Atlet Add
$('thead').on('click', '.add', function() {
  var tr = "<tr>" +
      "<td>" +
      "<div class='form-group'>" +
      "<label>Nama Atlet</label>" +
      "<input type='text' class='form-control' placeholder='Masukkan Nama Atlet' style='text-transform:capitalize;' name='nama[]'>" +
      "</div>" +
      "</td>" +
      "<td>" +
      "<div class='form-group mb-3'>" +
      "<label></label>" +
      "<a href='javascript::void(0)' class='deleteRow btn btn-danger' style='float:right;'>-</a>" +
      "</div>" +
      "</td>" +
      "</tr>"
  $('tbody').append(tr);
});

$('tbody').on('click', '.deleteRow2', function() {
  $(this).parent().parent().parent().remove();
});
//






(function($) {
  'use strict';
  $(function() {
    var body = $('body');
    var contentWrapper = $('.content-wrapper');
    var scroller = $('.container-scroller');
    var footer = $('.footer');
    var sidebar = $('.sidebar');

    //Add active class to nav-link based on url dynamically
    //Active class can be hard coded directly in html file also as required

    function addActiveClass(element) {
      if (current === "") {
        //for root url
        if (element.attr('href').indexOf("/index") !== -1) {
          if (element.parents('.sub-menu').length) {
            element.closest('.collapse').addClass('show');
          }
        }
      } 
    }

    var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    $('.nav li a', sidebar).each(function() {
      var $this = $(this);
      addActiveClass($this);
    })

    $('.horizontal-menu .nav li a').each(function() {
      var $this = $(this);
      addActiveClass($this);
    })

    //Close other submenu in sidebar on opening any

    sidebar.on('show.bs.collapse', '.collapse', function() {
      sidebar.find('.collapse.show').collapse('hide');
    });


    //Change sidebar and content-wrapper height
    applyStyles();

    function applyStyles() {
      //Applying perfect scrollbar
      if (!body.hasClass("rtl")) {
        if (body.hasClass("sidebar-fixed")) {
          var fixedSidebarScroll = new PerfectScrollbar('#sidebar .nav');
        }
      }
    }




    $('[data-toggle="minimize"]').on("click", function() {
      if ((body.hasClass('sidebar-toggle-display')) || (body.hasClass('sidebar-absolute'))) {
        body.toggleClass('sidebar-hidden');
      } else {
        body.toggleClass('sidebar-icon-only');
      }
    });

    //checkbox and radios
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

    //fullscreen
    $("#fullscreen-button").on("click", function toggleFullScreen() {
      if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
          document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
          document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (document.documentElement.msRequestFullscreen) {
          document.documentElement.msRequestFullscreen();
        }
      } else {
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    })
  });
})(jQuery);

//Delete JS

//Delete Event
$('.deleteEvent').click(function() {
  var event = $(this).attr('data-nama')
  var link = $(this).attr('data-link')

  swal.fire({
      title: 'Yakin ?',
      text: "Menghapus data event " +event+" dapat berpengaruh terhadap data lainnya", 
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Tidak',
      reverseButtons: true
  }).then((result) => {
      if (result.isConfirmed) {
          window.location = link
      } 
  })
})
//

//Delete Atlet
 $('.delete').click(function() {
  var atletnama = $(this).attr('data-nama')
  var link = $(this).attr('data-ro')

  swal.fire({
      title: 'Yakin ?',
      text: "Menghapus data atlet " +atletnama+" dapat berpengaruh terhadap data lainnya",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Tidak',
      reverseButtons: true
  }).then((result) => {
      if (result.isConfirmed) {
          window.location = link
      } 
  })
})
//

//Delete Olahraga
$('.deleteCabor').click(function() {
  var cabor = $(this).attr('data-nama')
  var link = $(this).attr('data-ro')

  swal.fire({
      title: 'Yakin ?',
      text: "Menghapus data olahraga " +cabor+" dapat berpengaruh terhadap data lainnya",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Tidak',
      reverseButtons: true
  }).then((result) => {
      if (result.isConfirmed) {
          window.location = link
      } 
  })
})
//

//Delete Perolehan
$('.deleteMedali').click(function() {
  var medali = $(this).attr('data-nama')
  var link = $(this).attr('data-link')

  swal.fire({
      title: 'Yakin ?',
      text: "Menghapus data perolehan medali " +medali+" dapat berpengaruh terhadap data lainnya",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Tidak',
      reverseButtons: true
  }).then((result) => {
      if (result.isConfirmed) {
          window.location = link
      } 
  })
})
//

//End Delete


