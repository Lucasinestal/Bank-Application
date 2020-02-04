$( document ).ready(function() {
    console.log( "ready!" );
    $("#transactionBtn").click(function(e) {
        $("#transactionBtn").remove();
        e.preventDefault();
        $.ajax({
          type: "GET",
          url: "http://test01.local/bank-application/public/api/read.php",
          data: {
            id: $("#transactionBtn").val(),
            access_token: $("#access_token").val()
          },
          success: function(result) {  
              let results = result.users;
              console.log(results);
                let $select = $("<select></select>");
                $("#userContainer").append($select).attr("id","userDiv"); 
                for (let i=0;i<results.length; i++){
                $select.append(`<option value="${results[i].id}">${results[i].firstname} ${results[i].lastname}</option>`).attr("id", "userList");
                $("#userList").on('change' ,optionValue);  
            }
          },
          error: function(result) {
            alert('error');
          }
          
        });
        function optionValue(){
            let user_id = userList.options[userList.selectedIndex].value;
            console.log(user_id);
           
        }
      });  
});

   