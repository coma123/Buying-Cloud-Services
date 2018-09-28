# Buying Cloud Services

## Instructions

The Marketplace is selling seven different cloud services. The license of each service has a standard price of $8.00. However, if you buy more than one of the services at a time, you get a discount. Buying multiple licenses of the same service does not earn a discount.

##### Number of Different Services Discount Percentage
- 2 -> 5%
-	3 ->10%
-	4 -> 15%
-	5 -> 25%
-	6 -> 30%
-	7 -> 35%

Write a method that will calculate the **optimal** customer discount for any set of licenses from this services. Keep in mind that larger percentages are not always better as can be seen in the sample below, in which case it was better to keep all the services at 75% discount instead of having some at 70% and others at 85% of retail.

## Sample Selection
-	1 license of Cloud Service One
-	2 licenses of Cloud Service Two
-	2 licenses of Cloud Service Three
-	2 licenses of Cloud Service Four
-	2 licenses of Cloud Service Five
-	1 license of Cloud Service Six

## Result and Analysis

In this case 1 each of Cloud Service One through five make a set of 5 unique services eligible for 25% off, and one each of Cloud Service Two through six make a similar set, resulting in 10 services at 25% off of $8 (10 * $8 * .75) = $60. If the algorithm had "greedily" used all six unique services to get a 30% discount, the remaining 4 cloud services (Two, Three, Four, Five) would only have been eligible for a 15% discount. The cost would thus have been (6 * $8 * .7) = $33.60 + (4 * $8 * .85) = $27.20 for a total of $60.80.
