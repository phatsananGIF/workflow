<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

      <!-- Bootstrap core CSS-->
  <link href="<?=base_url()?>asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <table class="table table-striped table-bordered">

        <thead>
            <tr>
                <th>tack</th>
                <th>do list</th>
                <?php $no=1;
                for($i=0; $i<=$coutday; $i++){
                ?>
                    <th><?php echo $no ?></th>
                <?php 
                    $no++;
                } ?>
            </tr>
        </thead>

        <tbody>
        
        <?php foreach($sites_task as $tack){ ?>
            <tr>
                <td><?=$tack['title']?></td>

                <td><ul>
                    <?php   foreach($arr_data['tack'.$tack['id']]['dolist'] as $dolist){
                                if($dolist['id_task'] == $tack['id']){ ?>
                                    <li><?=$dolist['description']?></li>
                    <?php       }
                            }  ?>
                </ul></td>

                <?php for($i=0; $i<=$coutday; $i++){ ?>
                    <td style="background-color: #17a2b8;"></td>
                <?php } ?>

            </tr>
        <?php }  ?>


        </tbody>

    </table>
</body>
</html>