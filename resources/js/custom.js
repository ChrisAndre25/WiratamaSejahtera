$(window).on('load', function(){

    new WOW().init(); 
});

$(document).ready(function(){
    $(function(){
        new WOW().init(); 
    });

     $("a").on('click', function(e) {

        
          if (this.hash !== "") {
              
               e.preventDefault();

              
               var hash = this.hash;

               
               $('html, body').animate({
               scrollTop: $(hash).offset().top
               }, 800, function(){
          
               
               window.location.hash = hash;
               });
          } 
     });

      $('.custom-file-input').change(function (e) {
                $(this).next('.custom-file-label').html(e.target.files[0].name);
        });

        $('#visibleProduct').DataTable({
                processing: true,
                order: [],
                columnDefs: [{
                                targets  : [5],
                                orderable: false,
                            }],
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 pl-0 pr-1'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5 pr-0 my-1'i><'col-sm-12 col-md-7 pl-0 my-1'p>>",
                pageLength: 5,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        });

        $('#hiddenProduct').DataTable({
            processing: true,
            order: [],
            columnDefs: [{
                            targets  : [5],
                            orderable: false,
                        }],
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 pl-0 pr-1'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5 pr-0 my-1'i><'col-sm-12 col-md-7 pl-0 my-1'p>>",
            pageLength: 5,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    $('#deletedProduct').DataTable({
            processing: true,
            order: [],
            columnDefs: [{
                            targets  : [5],
                            orderable: false,
                        }],
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 pl-0 pr-1'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5 pr-0 my-1'i><'col-sm-12 col-md-7 pl-0 my-1'p>>",
            pageLength: 5,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    $('#categoryList').DataTable({
        processing: true,
        order: [],
        dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 pl-0 pr-1'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5 pr-0 my-1'i><'col-sm-12 col-md-7 pl-0 my-1'p>>",
        pageLength: 5,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    $('#brandList').DataTable({
        processing: true,
        order: [],
        dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 pl-0 pr-1'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5 pr-0 my-1'i><'col-sm-12 col-md-7 pl-0 my-1'p>>",
        pageLength: 5,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });

    var owlproducts = $(".products-carousel");
    owlproducts.owlCarousel({
        center: true,
        nav: true,
        dots: false,
        lazyLoad: true,
        items: 1,
        margin: 20,
        stagePadding: 20,
    });
    owlproducts.on("mousewheel", ".owl-stage", function(e) {
        if (e.deltaY > 0) {
            owlproducts.trigger("prev.owl");
        } else {
            owlproducts.trigger("next.owl");
        }
        e.preventDefault();
    });
});