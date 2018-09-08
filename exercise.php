<?php
//================================================================================
// This function is taking array of 7 elements as 7 services and          
//     returning back optimal discount to get cheapest possible price     
//                                                                        
// Function is looking for all possible ways how to buy licenses pushing  
// prices in array and returning minimum price from array                 
//                                                                        
// Sample Selection                                                       
//	• 1 license of Cloud Service One                                      
//	• 2 licenses of Cloud Service Two                                     
//	• 2 licenses of Cloud Service Three                                   
//	• 2 licenses of Cloud Service Four                                    
//	• 2 licenses of Cloud Service Five                                    
//	• 1 license of Cloud Service Six                                      
// In this exapmle:
//    case 1: buying 6 and 4 licenses and getting total price of $60.8
//    case 2: buying 5 and 5 licenses and getting total price of $60
//    case 3: buying 4, 4 and 2 licenses and getting total price of $69.6 
//    case 4: buying 3, 3, 3 and 1 licenses and getting total price of $72.8
//    ... and so on until buying all licenses separate without discount.

//================================================================================
function prices($array){
    $license_price = 8;
    
    // Maximum license which can be purchased at once which is decreasing to get all possible purchases
    $max = 0;
        foreach($array as $value){
            if($value != 0){
                $max++;
            }
        }
    
    // Array of all disounted prices
    $discounted_prices = array();

    while($max > 0){
        $total_price = 0;
        $array2 = $array;
        
        // While there are elements in array
        while(count($array2) > 0){
            
            // Sum of unique licenses which is purchased at once
            $sum = 0;
            foreach(array_keys($array2) as $i){
                // if element is 0, unset it from array and decrease
                if($array2[$i] == 0){
                    unset($array2[$i]);
                }else{
                    // increase $sum by 1 if element is not 0 and decrease element by 1
                    if($sum < $max){
                        $sum += 1;
                        $array2[$i] -= 1;
                    }
                }
            }
            // normal discount price
            $discount = 1;
            
            // discount price depended on how much is $sum (purchased licenses at once)
            switch($sum){
                case 2:
                    $discount = 0.95;
                    break;
                case 3:
                    $discount = 0.9;
                    break;
                case 4:
                    $discount = 0.85;
                    break;
                case 5:
                    $discount = 0.75;
                    break;
                case 6:
                    $discount = 0.7;
                    break;
                case 7:
                    $discount = 0.65;
                    break;
                default:
                    break;
            }
            
            // total price after discounts
            $total_price += $sum * $license_price * $discount;
        }
        
        // push in array discounted total price
        array_push($discounted_prices, $total_price);
        $max--;
    }
    // return minimum price from discounted prices array
    return min($discounted_prices);
}

//// Sample Selection array
//$buying_option = array(1, 2, 2, 2, 2, 1, 0);
//
//// return optimal price from function
//$optimal_price = prices($buying_option);
//
//// display on screen
//echo $optimal_price;
