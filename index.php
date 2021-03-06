<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>


    <div class="row-3-md " style="text-align:center; margin-top:111px;">
    
        <form action="/action_page.php">
            <div class="selectionDesign">
                <label>Order by rating:</label>
                </br>
                    <select id="orderByRating" name="orderByRating">
                        <option value="high">Highest First</option>
                        <option value="low">Lowest First</option>
                    </select>
            </div>
            
            <div class="selectionDesign">
                <label>Minimum rating:</label>
                </br>
                    <select id="minimumRating" name="orderByRating">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
            </div>

            <div class="selectionDesign">
                <label>Order by date:</label>
                </br>
                    <select id="orderByDate" name="orderByDate">
                        <option value="newest">Newest First</option>
                        <option value="oldest">OldestFirst</option>
                    </select>
            </div>

            <div class="selectionDesign">
                <label>Prioritize by text:</label>
                </br>
                    <select id="priority" name="Prioritize by text">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
            </div>
    
        </form>
    </div>
    



</body>
</html>