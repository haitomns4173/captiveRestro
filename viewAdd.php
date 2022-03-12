<?php
echo <<<EOT
<section class="contact-clean">
    <form action="dashboard.php" method="POST">
      <h2 class="text-center">Add Dish</h2>
      <div class="mb-3">
        <input class="form-control" type="text" name="dishName" id="dishName" placeholder="Dish Name">
      </div>
      <div class="mb-3">
        <input class="form-control" type="text" name="quantity" id="quantity" placeholder="Quantity">
      </div>
      <div class="mb-3">
        <input class="form-control" type="text" name="type" id="type" placeholder="Type(Veg/Non-Veg)">
      </div>
      <div class="mb-3">
        <input class="form-control" type="text" name="price" id="price" placeholder="Price">
      </div>
      <div class="mb-3">
        <button class="btn btn-primary" type="submit" name="add" value="Add">ADD</button>
      </div>
    </form>
  </section>
EOT;
