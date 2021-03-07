<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <?php include 'apiCall.php'; ?>
    </head>
    <body>
        <?php 
            $orderByRating = $_POST['orderByRating'];
            $orderByMinimumRating = $_POST['orderByMinimumRating'];
            $orderByDate = $_POST['orderByDate'];
            $prioritizeByText = $_POST['prioritizeByText'];

            function orderByMinimumRating($reviewsArray, $orderByMinimumRating) {
                $filteredResultsMinimumRating = [];
                foreach($reviewsArray as $element ){
                    if($element->rating >= $orderByMinimumRating){
                        array_push($filteredResultsMinimumRating, $element);
                    }
                }
                return $filteredResultsMinimumRating;
            } 

            function orderByRating($orderByRating, $arrayToOrder) { // RATING SORT
                if($orderByRating == 'highestFirst') {            
                    usort($arrayToOrder, function($first,$second){
                        return $first->rating < $second->rating;
                    });
                } else {
                    usort($arrayToOrder,function($first,$second){
                        return $first->rating > $second->rating;
                    });
                }

                return $arrayToOrder;
            }

            function orderByDate($orderByDate, $arrayToOrder){ // DATE SORT
                if($orderByDate=='oldestFirst') {
                    usort($arrayToOrder, function($a, $b) {
                        return strtotime($a->reviewCreatedOnDate) - strtotime($b->reviewCreatedOnDate);
                    });
                } else {
                    usort($arrayToOrder, function($a, $b) {
                        return strtotime($a->reviewCreatedOnDate) - strtotime($b->reviewCreatedOnDate);
                    });
                    $arrayToOrder = array_reverse($arrayToOrder);
                }
                return $arrayToOrder;
            }

            function getByTextPrioritize($prioritizeByText, $arrayToOrder, $filterReviewsWithText, $filterReviewsWithoutText) { // prioritize text
                $arrayToOrder = [];
                if($prioritizeByText == 'yes') {
                    $arrayToOrder = $filterReviewsWithText;
                    foreach($filterReviewsWithoutText as $element ){
                        array_push($arrayToOrder, $element);
                    }
                } else {
                    $arrayToOrder = $filterReviewsWithoutText;
                    foreach($filterReviewsWithText as $element ){
                        array_push($arrayToOrder, $element);
                    }
                }

                return $arrayToOrder;
            }

            $filteredResultsArray = [];
            $filteredResultsArray = orderByMinimumRating($reviewsArray, $orderByMinimumRating); // take only reviews with minimum rating $orderByMinimumRating

            // initialize new empty arrays for 'With Text Reviews' and 'Without Text Reviews'
            $filterReviewsWithText = [];
            $filterReviewsWithoutText = [];

            foreach($filteredResultsArray as $element ){ // fill 'With Text Reviews array' and 'Without Text Reviews array'
                if($element->reviewText == ''){
                    array_push($filterReviewsWithoutText, $element);
                } else {
                    array_push($filterReviewsWithText, $element);
                }
            }

            // order for array 'With Text Reviews' $filterReviewsWithText
            $filterReviewsWithText = orderByRating($orderByRating, $filterReviewsWithText);
            $filterReviewsWithText = orderByDate($orderByDate, $filterReviewsWithText);

            // order for array 'Without Text Reviews' $filterReviewsWithText
            $filterReviewsWithoutText = orderByRating($orderByRating, $filterReviewsWithoutText);
            $filterReviewsWithoutText = orderByDate($orderByDate, $filterReviewsWithoutText);

            // Fill $filteredResultsArray with 'With Text Reviews' and 'Without Text Reviews' depending on what is selected 'yes' or 'no'
            $filteredResultsArray = getByTextPrioritize($prioritizeByText, $filteredResultsArray, $filterReviewsWithText, $filterReviewsWithoutText);

        ?>
        <table class="table-border">
            <thead> 
                <tr>
                    <th> Rating for review </th>
                    <th> Created On Date </th>
                    <th> Review Text </th>
                </tr>
            </thead>
            <tbody> 
                <?php foreach ($filteredResultsArray as $review) : ?>
                    <tr>
                        <td> <?php echo $review->rating; ?> </td>
                        <td> <?php echo $review->reviewCreatedOnDate; ?> </td>
                        <td> <?php echo $review->reviewText; ?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>