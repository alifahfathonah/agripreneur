 $(document).ready(function(){
  /*$(document).on('click', '.delete-object', function(){
 
          var id = $(this).attr('delete-id');
                $('#progId').val(id);
                $('#myModalDelete').modal('toggle');

});

     $('#delete').click(function(e){
            e.preventDefault();  
        var data = new FormData();
         var el =  $('#'+id);                        
        var id  = $('#progId').val();
        data.append('id',id); 

          $.ajax({  
              url      : 'delete_program.php',
              method   : 'post',  
                data     : data,
              success  : function(response){
                            // now update user record in table 
                $(el).css('background','tomato');
                $(el).fadeOut(800, function(){ 
                $(this).remove();
                 });
                $('#myModalDelete').modal('toggle'); 

                         },
        cache: false,
        contentType: false,
        processData: false

          });
       }); */
   $(document).on('click', '.delete-object', function(){
    var el = this;
   var id = $(this).attr('delete-id');
    var id_foto=$('#'+id).children('td[data-target=id_foto]').text();

    // Delete id
 
    // Confirm box
    bootbox.confirm("Are you sure want to delete?", function(result) {
 
       if(result){
         // AJAX Request
         $.ajax({
           url: 'delete_program.php',
           type: 'POST',
           data: { id:id , id_foto:id_foto },
           success: function(response){

             // Removing row from HTML Table
             $(el).closest('tr').css('background','tomato');
             $(el).closest('tr').fadeOut(800, function(){ 
               $(this).remove();
             });
             location.reload();

           }
         });
       }
 
    });
 
  });
  });
