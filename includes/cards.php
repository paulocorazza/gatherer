<?php

$results = '';  
foreach($cards as $card){


    $name = preg_replace('/\s+/', '', $card->name);
    $endPoint = 'https://api.scryfall.com/cards/named?exact='.  strtolower($name);
    $ch = curl_init($endPoint);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
    $response = curl_exec($ch);
        curl_close($ch);
    $data = json_decode($response, true);
      
        $results .= '<tr>
        <td>'.$card->id.'</td>
        <td>'.$card->name.'</td>     
        <td>
            <img src="'.$data["image_uris"]["small"].'">
        </td>  
        <td>'.$card->quantity. '</td>
        <td>'.$data["prices"]["usd"].'</td>
        <td>
          <a href="editar.php?id='.$card->id.'">
            <button type="button" class="btn btn-warning">Update</button>
          </a>
          <a href="excluir.php?id='.$card->id.'">
          <button type="button" class="btn btn-info">View More Details</button>
         </a>
          <a href="excluir.php?id='.$card->id.'">
            <button type="button" class="btn btn-danger">Delete</button>
          </a
        </td>
      </tr>';   

}

?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <button type="button" class="btn btn-success btn-lg">
                    <a href="add-card.php" class="text-white">Add card</a>
                </button>

                <table class="table bg-light mt-3 table-striped">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col"><i class="fas fa-id-badge"></i> ID</th>
                            <th scope="col"><i class="fas fa-file-signature"></i> Name</th>
                            <th scope="col"><i class="fas fa-image"></i> Photo   </th>
                            <th scope="col"><i class="fas fa-sort-numeric-up"></i> Quantity</th>
                            <th scope="col"><i class="fas fa-money-bill"></i> Price in US$</th>
                            <th scope="col"><i class="fas fa-exclamation"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $results ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


