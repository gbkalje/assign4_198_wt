<?php
header("Content-type: application/json");
require 'Data.php';
// include 'Data.php';

$req = $_GET['req'] ?? null;

if ($req) {
    $jsonData = file_get_contents("data.json");
    $dataList = json_decode($jsonData, true)['menu_items'];
    try {
        $menuData = new MenuData($dataList);
    } catch (Exception $th) {
        echo json_encode([$th->getMessage()]);
        return;
    }
}

switch ($req) {
    case 'name_list':
        echo $menuData->getMenuName();
        break;

    case "menu_data":
        $name = $_GET['name'] ?? null;
        echo $menuData->getMenuByName($name);
        break;
    
    default:
        echo json_encode(["In-valid request"]);
        break;
}

?>