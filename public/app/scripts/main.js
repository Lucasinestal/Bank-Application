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
                let $select = $("<select class='w-100 text-center p-1 m-2' name='user_id'></select>");
                $("#userContainer").append($select); 
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
            console.log(user_id)          
        }
      });  
});


$("#submitTransferBtn").click(function(e) {
  e.preventDefault();
  let datasend = {}

    datasend['from_account'] = $("#from_account").val();
    datasend['from_amount'] = $("#from_amount").val();
    datasend['to_account'] = $("#userList").val ();
    datasend['to_amount'] = $("#from_amount").val();
    let encoded_send = JSON.stringify( datasend );
 
    console.log(encoded_send);

    $.ajax({
    type: "POST",
    url: "http://test01.local/bank-application/public/api/createTransaction.php",
    data: encoded_send ,
    success: function(result) {  
      alert('success');
      console.log(result);
   
    },
    error: function(result) {
      alert('error');
    }
    
  });

});