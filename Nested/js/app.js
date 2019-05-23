$(document).ready(function(){
    let edit=false;

    console.log('Jquery esta funcionando'); 
    // $('#task-result').hide();
    fetchTasks();
   
    // $('#search').keyup(function(e){
    //     var search=$('#search').val();
    //     search=search;
    //    $.ajax({
    //       url: 'task-search.php',
    //       type:'POST',
    //       data: {search},
    //       success: function(response){
    //        $('#task-result').html(response);
    //        $('#task-result').show(response);
    //       }
    //    });
    //  });



     
    $('#task-form').submit(function(e){
        const postData={
            Nombre:$('#Nombre').val(),
            Apellido:$('#Apellido').val(),
            Telefono:$('#Telefono').val(),
            FechaNacimiento:$('#FechaNacimiento').val()
                 
           
                  
        };
        console.log("entrooo****************** acu");
     
        let url=edit===false ? 'add.php':'addUser.php';
        $.post(url,postData, function (response){
            fetchTasks();
            $('#task-form').trigger('reset');
        });         
        e.preventDefault();
    
    });


   function fetchTasks(){
      
    $.ajax({
        url: 'task-list.php',
        type:'GET',
        success: function(response){
    
           $('#tasks').html(response);
        }
    });
   }



   $(document).on('click', '.task-delete',function(){
    if(confirm('Estas seguro de querer eliminar esta tarea?')){
        let element = $(this)[0].parentElement.parentElement;        
        let id= $(element).attr('taskId');
        console.log(id);
      /*  $_POST('task-delete.php',{id}, function(){
           fetchTasks();
      });*/
      $.ajax({
        url: 'task-delete.php',
        type:'POST',
        data: {id},
        success: function(response){
        /* let task= JSON.parse(response);
         let templete='';
         task.forEach( task=> {
             templete +=`<li>
             ${task.name}
             </li>`;
         });*/  
         fetchTasks();     
         
        }
     });




    };
  });


  $(document).on('click', '.task-item',function(){
   let element= $(this)[0].parentElement.parentElement;
   let id= $(element).attr('taskId');
   console.log("*************1************");

   $.ajax({
       url: 'task-single.php',
       type:'GET',
       data: {id},
       success:function(response){
         
    
        $('#task-result').html(response);
        $('#task-result').show(response);
        
       
     
       
   }});

  });
});