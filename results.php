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

            function orderByRating($orderByRating, $filteredResultsArray) { // RATING SORT
                if($orderByRating == 'highestFirst') {            
                    usort($filteredResultsArray, function($first,$second){
                        return $first->rating < $second->rating;
                    });
                } else {
                    usort($filteredResultsArray,function($first,$second){
                        return $first->rating > $second->rating;
                    });
                }
                return $filteredResultsArray;
            }

            function orderByDate($orderByDate, $filteredResultsArray){ // DATE SORT
                if($orderByDate=='oldestFirst') {
                    usort($filteredResultsArray, function($a, $b) {
                        return strtotime($a->reviewCreatedOnDate) - strtotime($b->reviewCreatedOnDate);
                    });
                } else {
                    usort($filteredResultsArray, function($a, $b) {
                        return strtotime($a->reviewCreatedOnDate) - strtotime($b->reviewCreatedOnDate);
                    });
                    $filteredResultsArray = array_reverse($filteredResultsArray);
                }
                return $filteredResultsArray;
            }

            function getByTextPrioritize($prioritizeByText, $filteredResultsArray) { // prioritize text
                $filteredReviewsByText = [];

                if($prioritizeByText == 'yes') {
                    foreach($filteredResultsArray as $element ){
                        if($element->reviewText != ''){
                            array_push($filteredReviewsByText, $element);
                        }
                    }
                } else {
                    foreach($filteredResultsArray as $element ){
                        if($element->reviewText == ''){
                            array_push($filteredReviewsByText, $element);
                        }
                    }
                }

                return $filteredReviewsByText;
            }

            $filteredResultsArray = [];
            $filteredResultsArray = orderByMinimumRating($reviewsArray, $orderByMinimumRating);
            $filteredResultsArray = orderByRating($orderByRating, $filteredResultsArray);
            $filteredResultsArray = orderByDate($orderByDate, $filteredResultsArray);

            $filteredResultsArray = getByTextPrioritize($prioritizeByText, $filteredResultsArray);

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
                    <tr class="table-border">
                        <td> <?php echo $review->rating; ?> </td>
                        <td> <?php echo $review->reviewCreatedOnDate; ?> </td>
                        <td> <?php echo $review->reviewText; ?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>