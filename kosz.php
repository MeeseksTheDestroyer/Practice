<?php
session_start();


          if(isset($_POST['productIDs']) and isset($_POST['quantities'])){
            $filePath = 'Artykuły-przeglądanie_20230516.csv';
            $CHECK = true;
            $header = null;
            $all_data = array();
            $prices_arr = array();
            if (($handle = fopen($filePath, 'r')) !== false) {
              while (($data = fgetcsv($handle)) !== false) {
                if($CHECK){
                  $header = $data;
                  $CHECK = false;
                }
                else{
                  $all_data[] = $data;
                  $ilosc = $data[2];
                  $cena = $data[15];
                  $nazwa = $data[0];
  
  
  
                  if($data[2] > 0){
                      $prices_arr[$nazwa] = (float)$cena;
                      $quant_arr[$nazwa] = (float)$ilosc;
                  }
  
                } 
                
              }
              fclose($handle);
            } else {
              echo "Failed to open the file: $filePath";
            }
            $purchase = array(
              
            );
            $productIDs = $_POST['productIDs']; 
            $quantities = $_POST['quantities'];
            $totalPrice = 0;
              for ($i = 0; $i < count($productIDs); $i++) {
              $productID = $productIDs[$i];
              $quantity = $quantities[$i];
              if(isset($quant_arr[$productID]) and isset($prices_arr[$productID]) and $quantity <= $quant_arr[$productID] and $quantity > 0){
                  $productPrice = $prices_arr[$productID];
                  
                  $purchase[$productID] = [
                      "quantity" => $quantity,
                      "price.for.1" => $productPrice
                  ];
                  $subtotal = $productPrice * $quantity;
                  
                  
                  $totalPrice += $subtotal;
              }
  
              }
            $_SESSION["KOSZYK"] = $purchase;
            $_SESSION["PRICE"] = $totalPrice;
           $response = array('totalPrice' => $totalPrice);
              echo json_encode($response);
          }


    
    ?>