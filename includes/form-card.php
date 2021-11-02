<main>
  <section>
    <a href="/">
      <button class="btn btn-warning">Go Back</button>
    </a>
  </section>
  <h2 class="mt-3"><?=TITLE?></h2>
  <form method="POST">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="number" class="form-control" name="quantity" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="rarity">Rarity</label>
          <select class="form-control" name="rarity">
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
    <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg ">Save Card</button>
    </div>
  </form>
</main>