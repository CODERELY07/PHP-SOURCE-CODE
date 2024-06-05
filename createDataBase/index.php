<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create database</title>
</head>
<body>
    <form id="addform" method="post">
        <label for="">Database Name: </label>
        <input type="text" name="database" id="database">
        <input type="submit" value="create" id="submit">
    </form>
    <div id="table-data">

    </div>

      <!-- jQuery library -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

      <script>
        $(document).ready(function(){

            function table(){
                $.ajax({
                    url:"load-database.php",
                    method:"POST",
                    success: function(response){
                        $('#table-data').html(response);
                    }
                })
            }
            table();

            $('#submit').on("click", function(e){
                e.preventDefault();
                var name = $('#database').val();
                if(name == ""){
                    alert("Insert Text");
                }else{
                    $.ajax({
                        url:"createDataBase.php",
                        type:"post",
                        data:{name:name},
                        success:function(data){
                            if(data == 1){
                                table();
                            }else{
                                console.log('error');
                            }
                        }
                    });
                }
            })
        });


      </script>
</body>
</html>