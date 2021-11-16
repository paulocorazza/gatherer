<?php

$results = '';  
foreach($cards as $card){

    // uma ideia é pegar essa rotina aqui e ao inves de jogar o resultado da API em tela
    // cria uma rotina que de tempos em tempos consulta a API e ja armazena no banco
    // desse modo se acontecer de o serviço ficar indisponível não afeta a tua aplicação
    
    // outra coisa, usa try catch em todo lugar que tem código php rodando, pois assim se der merda tu consegue rastrear o erro

    $name = preg_replace('/\s+/', '', $card->name);
    $endPoint = 'https://api.scryfall.com/cards/named?exact='.  strtolower($name);
    $ch = curl_init($endPoint);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
    $response = curl_exec($ch);
        curl_close($ch);
    $data = json_decode($response, true);
      
        $results .= '<tr>
        <td class="text-center">'.$card->id.'</td>
        <td class="text-center">'.$card->name.'</td>     
        <td class="text-center">
            <img  src="'.$data["image_uris"]["small"].'">
        </td>  
        <td class="text-center">'.$card->quantity. '</td>
        <td class="text-center">'.$data["prices"]["usd"].'</td>
        <td class="text-center">'.$card->rarity .'</td>
        <td class="text-center">
          <a href="edit-card.php?id='.$card->id.'">
            <button type="button" class="btn btn-warning btn-sm">Edit</button>
          </a>
          <a href="view-card.php?id='.$card->id.'">
          <button type="button" class="btn btn-info btn-sm">View More Details</button>
         </a>
          <a href="delete-card.php?id='.$card->id.'">
            <button type="button" class="btn btn-danger btn-sm">Delete</button>
          </a
        </td>
      </tr>';   

}

?>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <section>
                    <a href="add-card.php" class="btn btn-success text-white">Add card</a>
                </section>

                <section>

                    <div class="row">
                        <form method="GET" style="display:contents">
                            <div class="col-md-6 my-4">

                                <label for="sort">Search for a card</label>
                                <input type="text" name="search" class="form-control" value="<?= $search ?>">
                                <p></p>
                                <button type="submit" class="btn btn-success">Search</button>

                            </div>
                            <div class="col-md-6 my-4">
                                <label for="sort">Sort by a type</label>
                                <select class="form-control" name="type">
                                    <option value="" selected disabled>Select a type</option>
                                    <option value="land">Land</option>
                                    <option value="instant">Instant</option>
                                    <option value="sorcery">Sorcery</option>
                                    <option value="creature">Creature</option>
                                    <option value="artifact">Artifact</option>
                                    <option value="planeswalker">Planeswalker</option>
                                    <option value="enchantment">Enchantment</option>
                                </select>
                                <p></p>
                                <button type="submit" class="btn btn-success">Sort</button>
                            </div>
                        </form>
                    </div>

                </section>

                <table class="table bg-light mt-3 table-striped table-borderless table-hover table-sm">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th scope="col" class="text-center text-dark"><i class="fas fa-id-badge"></i> ID</th>
                            <th scope="col" class="text-center text-dark"><i class="fas fa-file-signature"></i> Name
                            </th>
                            <th scope="col" class="text-center text-dark"><i class="fas fa-image"></i> Photo </th>
                            <th scope="col" class="text-center text-dark"><i class="fas fa-sort-numeric-up"></i> Amount
                            </th>
                            <th scope="col" class="text-center text-dark"><i class="fas fa-money-bill"></i> Price in US$
                            </th>
                            <th scope="col" class="text-center text-dark"><i class="fas fa-shield-alt"></i>Rarity</th>
                            <th scope="col" class="text-center text-dark"><i class="fas fa-exclamation"></i> Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $results ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>