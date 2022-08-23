<?php

class Crud
{
    private $homePath;
    private $filePath;
    private $fileContent;
    public $data;
    public $listName;
    public $attributesList;
    public $ordersFile = 'ordersList.json';
    public $orderCompletePage = 'orderCompleted.html';

    public function __construct($filePath = 'dish.json')
    {
        $this->homePath = $_SERVER['PHP_SELF'];
        if (file_exists($filePath)) {
            $this->filePath = $filePath;
            $this->fileContent = file_get_contents($filePath);
            $this->data = json_decode($this->fileContent, true);
            $this->listName = "dishes";
            $this->attributesList = ["dishName", "quantity", "type", "price"];
        } else {
            throw new Exception("No file found", 1);
        }
    }

    public function actionAdd()
    {
        $listName = $this->listName;
        $data = $this->data;
        array_push($data[$listName], $_POST);
        file_put_contents($this->filePath, json_encode($data));
        header("Location: ".$this->homePath);
    }

    public function actionRead()
    {
        return $this->data;
    }

    public function actionEdit()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $listName = $this->listName;
            $data = $this->data;
            $itemData = $data[$listName][$id];

            foreach ($this->attributesList as $value) {
                $post[$value] = isset($_POST[$value]) ? $_POST[$value] : "";
            }

            if ($itemData) {
                unset($data[$listName][$id]);
                $data[$listName][$id] = $post;
                file_put_contents($this->filePath, json_encode($data));
            }
            header("Location: ".$this->homePath);
        }
    }

    public function actionDelete($id=null)
    {
        if ($id!==null && is_numeric($id) && $this->data[$this->listName][$id]) {
            $listName = $this->listName;
            $data = $this->data;
            unset($data[$listName][$id]);
            file_put_contents($this->filePath, json_encode($data));
            header("Location: ".$this->homePath);
        } else {
            throw new Exception("Nothing to delete", 1);
        }
    }

    //add orders form orders id to ordersList.json
    public function actionAddOrder($id=null)
    {
        if ($id!==null && is_numeric($id) && $this->data[$this->listName][$id]) {
            $listName = $this->listName;
            $data = $this->data;
            $itemData = $data[$listName][$id];

            //remove type and price form itemData
            unset($itemData["type"]);
            unset($itemData["price"]);

            //add current data and time to itemData
            //set timezone to nepal
            date_default_timezone_set('Asia/Kathmandu');
            $itemData["date"] = date("Y-m-d h:i:s a");

            $orders = $this->getOrders();
            array_push($orders, $itemData);
            file_put_contents($this->ordersFile, json_encode($orders));
            header("Location: ".$this->orderCompletePage);
        } else {
            throw new Exception("Nothing to add", 1);
        }
    }
    
    //get orders from ordersList.json
    public function getOrders()
    {
        $orders = file_get_contents($this->ordersFile);
        $orders = json_decode($orders, true);
        return $orders;
    }
}
?>
