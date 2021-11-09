<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Back office</title>
        <link rel="stylesheet" href="">
        
        <meta charset="UTF-8">

        <!-- <script>
            function getInvestors(){
                var ajax = new XMLHttpRequest();
                ajax.open('get', '../backOfficeApi.php?action=getInvestors');
                ajax.addEventListener('load',function(e){
                    console.log(JSON.parse(e));
                });
            }
            
        </script> -->
    </head>

    <body>

        <?php

            require_once './model/bdd.php';
            $connection=SGBDConnect();
            echo $connection->prepare("SELECT * FROM investors")
        ?>
    </body>
</html>