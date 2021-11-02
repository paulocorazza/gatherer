<main>
  <section>
    <a href="/">
      <button class="btn btn-warning">Go Back</button>
    </a>
  </section>
  <h2 class="mt-3"><?=TITLE?></h2>
  <form method="POST">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="number" class="form-control" name="quantity" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-success btn-lg ">Save Card</button>
    </div>
  </form>
</main>