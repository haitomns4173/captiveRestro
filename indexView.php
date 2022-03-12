<?php

include_once('Crud.php');
$crud = new Crud();

$number = 1;

echo <<<EOT
<div class = "dish">
EOT;
// tableData and actions
foreach (reset($crud->data) as $idx => $item) :
    $tData = "";
    $tActions = "";
    echo <<<EOT
    <section class="highlight-blue" id="main-blue" style="height: 92.875px;padding: 10px 10px;background: #472d30;">
    EOT;
        
    $tData .= "<h1 class=\"text-start\">". $number++. ". " . $item['dishName'] . "</h1>";
    
    echo <<<EOT
        $tData
        <div class="container">
        <div class="intro" style="height: 45px;">
    EOT;

    $tActions .= "<p class=\"text-start\">"."&nbsp;" . $item['type'] . " ". $item['quantity'] . " ". $item['price'].  "</p>";

    echo <<<EOT
        $tActions
        </div>
        </div>
        </section>
    EOT;


endforeach;
echo <<<EOT
</div>
EOT;
?>