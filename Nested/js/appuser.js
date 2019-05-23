



$(document).ready(function(){
    console.log('Jquery esta funcionando userr'); 
     let edit=false;
     fetchTasks();

     $('#User-form').submit(function(e){
        const postData={
            Nombre:$('#Nombre').val(),
            Apellido:$('#Apellido').val(),
            Documento:$('#Documento').val(),
            FechaNacimiento:$('#FechaNacimiento').val(),           
            Telefono:$('#Telefono').val(),
            Contraseña:$('#Contraseña').val(),
            Correo:$('#Correo').val(),
            id_Acudientes:$('#taskId').val()  
                  
        };
        console.log(" entro ****************** user");
     
        let url=edit===false ? 'addUser.php':'add.php';
        $.post(url,postData, function (response){
            fetchTasks()
            $('#User-form').trigger('reset');
        });         
        e.preventDefault();
    
    });

    function fetchTasks(){
      
        $.ajax({
            url: 'addUser.php',
            type:'GET',
            success: function(response){
        
               $('#tasks').html(response);
            }
        });
       }
    



   


  

});