 <?php
    echo <<<EOT
    <table class="table table-striped table-dark">
        <tr>
            <th> Dish Name </th>
            <th> Quantity </th>
            <th> Type </th>
            <th> Price </th>
            <th> Action</th>
        </tr>
        <tbody>
EOT;
    // tableData and actions
    foreach (reset($crud->data) as $idx => $item) :
        $tData = "";
        foreach ($crud->attributesList as $attribute) {
            $tData .= "<td>" . $item[$attribute] . "</td>";
        }
        echo <<<EOT
        <tr>
            $tData
            <td>
                <a href="?action=edit&id=$idx"><button class="btn btn-primary">Edit</button></a>
                <a href="?action=delete&id=$idx"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
EOT;
    endforeach;
    echo <<<EOT
        </tbody>
    </table>
<hr>
<div class="text-center">
<a href="?action=add"><button class="btn btn-success">ADD</button></a>
</div>
<hr>
EOT;
?>