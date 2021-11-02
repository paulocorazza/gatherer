<?php

$name = preg_replace('/\s+/', '', $card->name);
$endPoint = 'https://api.scryfall.com/cards/named?exact='.  strtolower($name);
$ch = curl_init($endPoint);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
$response = curl_exec($ch);
    curl_close($ch);
$data = json_decode($response, true);


?>

<main>
    <h2 class="mt-3">Delete Card</h2>
    <form method="POST">
        <div class="row">
            <div class="col-md-12">
                <img class="img-thumbnail rounded mx-auto d-block" src="<?=$data["image_uris"]["art_crop"]?>">
            </div>
        </div>

        <div class="row mt-4">
            <div class="form-group">
                <p>Are you sure you want to delete all the records for <?=$card->name ?> ? </p>
                <a href="index.php">
                    <button type="button" class="btn btn-warning">Cancel</button>
                </a>
                <button type="submit" name="delete" class="btn btn-danger">Delete anyway</button>
            </div>
        </div>
    </form>
</main>