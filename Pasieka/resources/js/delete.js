$(function() {
    $('.delete').click(function() { 
       swal({
       title: "Czy napewno chcesz usunąć?",
       icon: "warning",
       buttons: true,
       dangerMode: true,
       })
       .then((willDelete) => {
       if (willDelete) {
      
       $.ajax({
       method: "DELETE",
       url: "http://127.0.0.1:8000/products/" + $(this).data("id")
       })
           .done(function(response) {
               window.location.reload();
           })
           .fail(function(response) {
               swal('error')
           });
       }
       }); 
    });
});