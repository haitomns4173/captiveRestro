<?php
// Html Edition
$id = $_GET["id"];
$data = $crud->data[$crud->listName];
echo <<<EOT
<section class="contact-clean">
  <form action="dashboard.php" method="POST">
    <h2 class="text-center">Edit Dish</h2>
    <input type="hidden" value="$id" name="id"/>
EOT;
    foreach ($crud->attributesList as $attribute) {
        $value = $data[$id][$attribute];
        echo "<div class=\"mb-3\">";
        echo "<input class=\"form-control\" type=\"text\" value=\"$value\" name=\"$attribute\"/>";
        echo "</div>";
    }
echo <<<EOT
        <input class="btn btn-primary" type="submit" name="edit" value="Edit"/>
    </form>
    </section>

EOT;
