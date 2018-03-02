 class TreeSort{

// $array = [ '1' => [ '3' => [ '2' => [ '7'=>[] ], '8'=>[ '9' => [ '4'=>[]] ]]]];

 public static function treeBuilder($currentId, $parentId, $root=null)
    {

        if($root==null){
            $root = [];
        }

        //check if $parentId exists in tree:
        $routeToParent = static::recursiveKeyFinder($parentId, [],  $root);


        //else, or if $parentId is null
        if(!$routeToParent){

            //add to root
            $root[$parentId] = [
                $currentId => []
            ];

        }
        else{

        }

        return $root;


    }

    /**
     * @param $searchKey
     * @param $route
     * @param $array
     * @return bool|mixed
     */
    public static function recursiveKeyFinder($searchKey, $route, $array){
        foreach($array as $key => $child){
            if($key == $searchKey){
                return $route;
            }
            else{
                if(!empty($child)){
                    array_push($route, $key);
                    $foundRoute = static::recursiveKeyFinder($searchKey, $route, $child);
                    if($foundRoute){
                        return $foundRoute;
                    }
                    else{
                       array_pop($route);
                    }
                }
            }
        }

        return false;

    }

}