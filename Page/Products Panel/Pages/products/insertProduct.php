

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <title>Add new products</title>
</head>

<body>
    <div class="login-box">
        <h1>Add new products</h1>
        <form method="POST" action="../../sql/insert.php">
        <div class="user-box">
                <input type="text" name="name" class="form-control" placeholder="Please enter product name" id="name" required>
            </div>
            
           
            <div class="user-box">
                <input type="text" name="counts" class="form-control" placeholder="Please enter counts" id="counts" required>
            </div>
            <div class="user-box">

                <input type="text" name="price" class="form-control" placeholder="Please enter your price" id="price" required>
            </div>
            <div class="user-box">
                <input name="supplier" type="text"  class="form-control" placeholder="Please enter your supplier" id="supplier" required>
            </div>
            
            <button class="button" role="button" name="action"> Add</button>
            <button class="button" role="button" onclick="  window.location='../../dashboard.php' "> Back</button>

        </form>
    </div>


</body>

</html>