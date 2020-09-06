<?php

class MenuData {
    
    private $menuList;

    function __construct(array $menuList) {
        if (sizeof($menuList)>0) {
            $this->menuList = $menuList;
        } else {
            throw new Exception("No Menu record available");
        }
    }

    public function getMenuName() {
        $menuNameList = [];

        foreach($this->menuList as $menu) {
            $menuNameList[] = array(
                "name"=>$menu['name'],
                //"short"=>$menu['short_name'] . " " . $menu['price_large']
            );
        }

        return json_encode($menuNameList);
    }

    public function getMenuByName($name) {
        $response = ["In-Valid Name"];
        if($name) {
            foreach($this->menuList as $menu) {
                if ($name == $menu['name']) {
                    $response = $menu;
                    break;
                }
            }
        }
        return json_encode($response);
    }

}
?>