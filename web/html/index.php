<?
    if(isset($_POST["submit"])){
        $itemName = $_POST["itemName"];
        $itemNum = $_POST["itemNumber"];
        $keeperName = $_POST["keeperName"];
        
        $url = "http://golang-service:3000/api/addInventory";
        
        $ch = curl_init($url);
        
        $jsonData = array(
            'itemname' =>  $itemName,
            'keepername' =>  $keeperName,
            'itemNum' =>  $itemNum,
            
        );
        
        $jsonData_encode = json_encode($jsonData);
        
        
        curl_setopt($ch, CURLOPT_POST, 1);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData_encode);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayName = array('Content-Type: applications/json'));
        
        $result = curl_exec($ch);
        
        if($result){
            $class = "alert alert-success";
            $msg = "Post request sent successfully";
        }else{
            $class = "alert alert-danger";
            $msg = "Error sending request";
        }
    }

?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    </head>
    <body>
        <h2 class="col-md-8 offset-md-4 mt-2">Welcome to minivent<small> A mini inventory system</small></h2>
        <div class="container mt-4">
            <div class="col-md-6 offset-md-3">
                <form class="border border-info rounded p-4" method="POST" action="">
                    <div class="form-row">
                        <? if(isset($msg)){ ?>
                        <div class="<?=$class?> alert-dismissible fade show" role="alert">
                            <?=$msg?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?}?>

                        <div class="form-group col-md-6">
                        <label>Name of Item</label>
                        <input type="text" class="form-control" name="itemName" placeholder="Name of Item e.g Apple iPhone">
                        </div>
                        <div class="form-group col-md-6">
                        <label>Number of Items</label>
                        <input type="number" class="form-control" name="itemNumber" placeholder="Number e.g 1,2 or 10">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Name of inventory Logger</label>
                        <input type="text" class="form-control" name="keeperName" placeholder="1234 Main St">
                    </div>
                    <button type="submit" name="submit" class="btn btn-lg btn-success col-md-12">Sign in</button>
                </form>
            </div>
        </div>

    </body>

</html>