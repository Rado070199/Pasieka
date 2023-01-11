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
       url: url + $(this).data("id")
       })
           .done(function(data) {
                window.location.reload();
           })
           .fail(function(data) {
                swal('Coś poszło nie tak ', data.responseJSON.message, data.responseJSON.status);
           });
       }
       }); 
    });
});