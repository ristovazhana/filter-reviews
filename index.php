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
<body style="background-color:aliceblue; "> 

    <div class="containerFilter m-auto" >
        <h3 class="title-filter"> Filter Reviews </h3>
        <form action="results.php" method="post" >
            <div class="selectionDesign">
                <label>Order by rating:</label>
                </br>
                    <select id="orderByRating" name="orderByRating" class="selectionDropdown">
                        <option value="highestFirst">Highest First</option>
                        <option value="lowestFirst">Lowest First</option>
                    </select>
            </div>
            
            <div class="selectionDesign">
                <label>Minimum rating:</label>
                </br>
                <select id="orderByMinimumRating" name="orderByMinimumRating"  class="selectionDropdown">
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
                    <select id="orderByDate" name="orderByDate"  class="selectionDropdown"> 
                        <option value="newestFirst">Newest First</option>
                        <option value="oldestFirst">OldestFirst</option>
                    </select>
            </div>

            <div class="selectionDesign">
                <label>Prioritize by text:</label>
                </br>
                    <select id="prioritizeByText" name="prioritizeByText"  class="selectionDropdown">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
            </div>

            <div class="selectionDesign">
                </br>
                <input type="submit" name="Filter" value="Submit"  class="btnFilter"/>
            </div>
        </form>
    </div>

</body>
</html>