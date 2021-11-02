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
    <section>
        <a href="/">
            <button class="btn btn-warning">Go Back</button>
        </a>
    </section>
    <form method="POST">
        <div class="row">
            <div class="col-md-12">
                <img class="img-thumbnail rounded mx-auto d-block" src="<?=$data["image_uris"]["art_crop"]?>">
            </div>
        </div>
        <div class="row mt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="<?= $card->name ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="<?= $card->quantity ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rarity">Rarity</label>
                            <select class="form-control" name="rarity">
                                <option value="<?= $card->rarity ?>" selected ><?= $card->rarity ?></option>
                                <option value="common">Common</option>
                                <option value="uncommon">Uncommon</option>
                                <option value="rare">Rare</option>
                                <option value="mythic">Mythic</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rarity">Type</label>
                            <select class="form-control" name="type">
                                <option value="<?= $card->type ?>" selected ><?= $card->type ?></option>
                                <option value="land">Land</option>
                                <option value="instant">Instant</option>
                                <option value="sorcery">Sorcery</option>
                                <option value="creature">Creature</option>
                                <option value="artifact">Artifact</option>
                                <option value="planeswalker">Planeswalker</option>
                                <option value="enchantment">Enchantment</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg ">Save Card</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>