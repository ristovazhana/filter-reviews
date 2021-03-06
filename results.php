<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <?php include 'api.php'; ?>
    </head>
    <body>
        <table class="table-border">
            <thead> 
                <tr>
                    <th> Rating for review </th>
                    <th> Created On Date </th>
                    <th> Review Text </th>
                </tr>
            </thead>
            <tbody> 
                <?php foreach ($reviewsArray as $review) : ?>
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