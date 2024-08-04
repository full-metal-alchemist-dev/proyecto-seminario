    function getRow(){

      var tabla = 'producto';
      var id = 'id';
      $.ajax({
        type: 'POST',
        url: 'getData.php',
        data: {id:id,tabla:tabla},
        dataType: 'json',
        async:false,
        success: function(response){
          console.log(response);                 
          console.log("el valor es: "+response.costo2);
          $('#valor').val(response.costo2);
        }
      });

    }








