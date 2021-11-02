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
    <form>
        <div class="row">
            <div class="col-md-12">
                <img class="img-thumbnail rounded mx-auto d-block" src="<?=$data["image_uris"]["art_crop"]?>">
            </div>
        </div>
        <div class="row mt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" value="<?= $card->name ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="<?= $card->quantity ?>"
                                disabled>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <strong class="me-auto">Prices Up to Date </strong>
                                    <small> - Just Now</small>
                                </div>
                                <div class="toast-body">
                                    <span class="badge rounded-pill bg-success">
                                        <h6>US $ <?= $data["prices"]["usd"] ?> </h6>
                                    </span>
                                    <span class="badge rounded-pill bg-success">
                                        <h6>€<?= $data["prices"]["eur"] ?> </h6>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cmc">Converted Mana Cost</label>
                            <input type="number" disabled class="form-control" value="<?= $data["cmc"] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="artist">Artist's name</label>
                            <input type="text" class="form-control" disabled value="<?= $data["artist"] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="set">Set name - Not exactly the set you own</label>
                            <input type="text" class="form-control" disabled
                                value="<?= $data["set_name"] . ' - ' . $data["set"] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cmc">Collector's Number</label>
                            <input type="number" disabled class="form-control" value="<?= $data["collector_number"] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="artist">Rarity</label>
                            <input type="text" class="form-control" disabled value="<?= $data["rarity"] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="set">Set Type</label>
                            <input type="text" class="form-control" disabled value="<?= $data["set_type"] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cmc">Border Color</label>
                            <input type="text" disabled class="form-control" value="<?= $data["border_color"] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="artist">Type</label>
                            <input type="text" class="form-control" disabled value="<?= $data["type_line"] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="set">Frame</label>
                            <span class="badge rounded-pill bg-info"> In 2015 Wizards of the Coast changed the
                                frame</span>
                            <input type="text" class="form-control" disabled value="<?= $data["frame"] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cmc">Legalities</label>
                            <ul>
                                <?php if($data["legalities"]["standard"] == "legal") : ?>
                                    <li> Standard - <span class="badge rounded-pill bg-success">Legal</span></li>
                                <?php elseif($data["legalities"]["standard"] == "not_legal" || $data["legalities"]["standard"] == "banned") : ?>
                                    <li> Standard - <span class="badge rounded-pill bg-danger">Not Legal or Banned</span></li>
                                <?php endif; ?>

                                <?php if($data["legalities"]["pioneer"] == "legal") : ?>
                                    <li> Pioneer - <span class="badge rounded-pill bg-success">Legal</span></li>
                                <?php elseif($data["legalities"]["pioneer"] == "not_legal" || $data["legalities"]["pioneer"] == "banned") : ?>
                                    <li> Pioneer - <span class="badge rounded-pill bg-danger">Not Legal or Banned </span></li>
                                <?php endif; ?>

                                <?php if($data["legalities"]["modern"] == "legal") : ?>
                                    <li> Modern - <span class="badge rounded-pill bg-success">Legal</span></li>
                                <?php elseif($data["legalities"]["modern"] == "not_legal" || $data["legalities"]["modern"] == "banned") : ?>
                                    <li> Modern - <span class="badge rounded-pill bg-danger">Not Legal or Banned </span></li>
                                <?php endif; ?>

                                <?php if($data["legalities"]["legacy"] == "legal") : ?>
                                    <li> Legacy - <span class="badge rounded-pill bg-success">Legal</span></li>
                                <?php elseif($data["legalities"]["legacy"] == "not_legal" || $data["legalities"]["legacy"] == "banned") : ?>
                                    <li> Legacy - <span class="badge rounded-pill bg-danger">Not Legal or Banned </span></li>
                                <?php endif; ?>

                                <?php if($data["legalities"]["vintage"] == "legal") : ?>
                                    <li> Vintage - <span class="badge rounded-pill bg-success">Legal</span></li>
                                <?php elseif($data["legalities"]["vintage"] == "not_legal" || $data["legalities"]["vintage"] == "banned") : ?>
                                    <li> Vintage - <span class="badge rounded-pill bg-danger">Not Legal or Banned </span></li>
                                <?php endif; ?>

                                <?php if($data["legalities"]["pauper"] == "legal") : ?>
                                    <li> Pauper - <span class="badge rounded-pill bg-success">Legal</span></li>
                                <?php elseif($data["legalities"]["pauper"] == "not_legal" || $data["legalities"]["pauper"] == "banned") : ?>
                                    <li> Pauper - <span class="badge rounded-pill bg-danger">Not Legal or Banned </span></li>
                                <?php endif; ?>

                                <?php if($data["legalities"]["commander"] == "legal") : ?>
                                    <li> Commander - <span class="badge rounded-pill bg-success">Legal</span></li>
                                <?php elseif($data["legalities"]["commander"] == "not_legal" || $data["legalities"]["commander"] == "banned") : ?>
                                    <li> Commander - <span class="badge rounded-pill bg-danger">Not Legal or Banned </span></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="oracle">Oracle Text</label>
                            <textarea class="form-control" rows="5" ><?= $data["oracle_text"] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="oracle">Flavor Text</label>
                            <textarea class="form-control" id="flavor" rows="5"><?= $data["flavor_text"] ?></textarea>
                        </div>
                    </div>
                </div>
                <hr>    
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <a href="<?= $data["related_uris"]["gatherer"] ?>" class="text-white" >See this card in Gatherer</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <a href="<?= $data["related_uris"]["tcgplayer_infinite_articles"] ?>" class="text-white" >See Articles with this card in TCG Player</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <a href="<?= $data["related_uris"]["tcgplayer_infinite_decks"] ?>" class="text-white" >See Decks with this card in TCG Player</a>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <a href="<?= $data["related_uris"]["mtgtop8"] ?>" class="text-white" >See Decks with this card in MTG Top 8</a>
                        </div>
                    </div>
                </div>
                <hr>    
            </div>
        </div>
    </form>
</main>

