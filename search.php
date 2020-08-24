<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Searching Array</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
    crossorigin="anonymous">
</head>
<body class="bg-primary">
    
    <?php
        function linearSearch($array, $num) {
            $resultMsg = "";
            foreach($array as $key => $val) {
                $key +=1;
                if($val == $num) {
                    $resultMsg .= "Round : ".$key." ===> ".$num." = ".$val." found !! <br>";
                    return $resultMsg;
                }else{
                    $resultMsg .= "Round : ".$key." ===> ".$num." != ".$val."<br>";
                }
            }
            return $resultMsg;
        }

        function binarySearch($array, $num) {
            $resultMsg = "";
            sort($array);
            $low = 0; 
            $high = count($array) - 1; 
            $loopCount = 0;
            
            while($low <= $high) { 
                $loopCount += 1;
                $mid = floor(($low + $high) / 2); 
                if($array[$mid] == $num) { 
                    $resultMsg .= "Round : ".$loopCount." ===> ".$num." = ".$array[$mid]." found !!<br>";
                    return  $resultMsg; 
                } 
                if($num < $array[$mid]) { 
                    $resultMsg .= "Round : ".$loopCount." ===> ".$num." < ".$array[$mid]."<br>";
                    $high = $mid -1; 
                } 
                else{ 
                    $resultMsg .= "Round : ".$loopCount." ===> ".$num." > ".$array[$mid]."<br>";
                    $low = $mid + 1; 
                } 
            } 
            return $resultMsg; 
        }

        function bubbleSearch($array, $num) {
            $resultMsg = "";
            $swapped = true;
            $arraySize = count($array) - 1;
            $temp = null;
            $loopCount = 0;
            
            while($swapped) {
                $swapped = false;
                for($i=0; $i < $arraySize; $i++) {
                    $loopCount += 1;
                    if($array[$i] == $num) {
                        $resultMsg .= "Round : ".$loopCount." ===> ".$num." = ".$array[$i]." found !!<br>";
                        return  $resultMsg;
                    }

                    if($array[$i] > $array[$i+1]) {
                        list( $array[$i + 1], $array[$i] ) = array( $array[$i], $array[$i + 1] );
                        $swapped = true;
                        if($array[$i] == $num) {
                            $resultMsg .= "Round : ".$loopCount." ===> ".$num." = ".$array[$i]." found !!<br>";
                            return  $resultMsg;
                        }
                        else{
                            $resultMsg .= "Round : ".$loopCount." ===> ".$num." != ".$array[$i]."<br>";
                        }  
                    }
                }
            }
            return  $resultMsg;
        }

        $result = "";
        $listNum_p = "";
        $searchNum_p = "";
        
        if(isset($_POST['search'])){

            $listNum_p   = $_POST['listNum']; 
            $searchNum_p = $_POST['searchNum'];
            $searchMethod_p = $_POST['searchMethod'];
            $searchNum = $_POST['searchNum'];

            if(!empty($_POST['listNum']) && !empty($searchNum)){
                
                $listNum = str_replace(' ', '', $_POST['listNum']);
                $arrayNum = explode(',', $listNum);

                $result .= "List : [".$listNum."]<br>";
                $result .= "Search : ".$searchNum."<br>";
                $result .= "Result :::<br><br>";
                
                if($_POST['searchMethod'] == 'linear'){
                    $result .= linearSearch($arrayNum, $searchNum);
                }
                if($_POST['searchMethod'] == 'binary'){
                    $result .= binarySearch($arrayNum, $searchNum);
                }
                if($_POST['searchMethod'] == 'bubble'){
                    $result .= bubbleSearch($arrayNum, $searchNum);
                }
            }
        }
    ?>

    <div class="container">
        <form  action="" method="post">
            <div class="container">
                <div class="py-5">
                    <div class="mb-3 form-group row">
                        <label for="listNum" class="col-md-2 col-form-label text-light">List:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control text-center" name="listNum" id="listNum" value="<?php echo $listNum_p ?>">
                        </div>
                    </div>
        
                    <div class="mb-3 form-group row">
                        <label for="searchNum" class=" col-md-2 col-form-label text-light">ค้นหา:</label>
                        <div class="col-sm-8 ">
                            <input type="text" class=" form-control text-center"  name="searchNum" id="searchNum" value="<?php echo $searchNum_p ?>">

                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-warning" name="search">ค้นหา</button>
                        </div>
                    </div>
    
                    <div class="text-center">
                        <label class="text-light">ประเภทการค้นหา </label>
                    </div>

                    <div class="col-sm-8 mx-auto">
                        <select id="searchMethod" class="form-control" name='searchMethod'>
                            <option value="linear" <?php echo (isset($searchMethod_p) && $searchMethod_p == 'linear') ? 'selected="selected"' : ''; ?> >Linear Search</option>
                            <option value="binary" <?php echo (isset($searchMethod_p) && $searchMethod_p == 'binary') ? 'selected="selected"' : ''; ?> >binary Search</option>
                            <option value="bubble" <?php echo (isset($searchMethod_p) && $searchMethod_p == 'bubble') ? 'selected="selected"' : ''; ?> >Bubble Search</option>
                        </select>
                    </div>
                </div> 
            </div>
        </form>
     
        <div class="mx-auto text-center">
            <label  class="text-light">ผลลัพธ์</label>
        </div>
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card text-center" style="min-height: 20rem;">
                    <div class="card-body">
                        <?php echo $result; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

        

  
    
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>