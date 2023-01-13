$(function() {
    $('.delete').click(function() { 
       swal({
       title: confirmDelete,
       icon: "warning",
       buttons: true,
       dangerMode: true,
       })
       .then((willDelete) => {
       if (willDelete) {
      
       $.ajax({
       method: "DELETE",
       url: url + $(this).data("id")
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