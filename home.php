<!DOCTYPE html>
<html lang="en">
    <head>
        <title>FCP SwiftOffice</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/navigation.css" rel="stylesheet">
        <link href="css/home.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
    <body>
        <div class="flex-container">
            <div class="header">
                <?php
                include_once("Includes/ribbon.html");
                ?>
            </div>

            <div class="content">

            </div>

            <div class="footer">
            <?php
            include_once("Includes/footer.html");
            ?>
            </div>


        </div>

        <script src="js/script.js"></script>
        <script>
            // JavaScript to change background images
            const images = [
            'images/childimage.jpg',
            'images/childimage2.jpg',
            'images/childimage3.jpg',
            ];

            let index = 0;

            function changeBackground() {
                
                document.body.style.backgroundImage = `url('${images[index]}')`;
                index = (index + 1) % images.length;
            }

            // Initial load
            changeBackground();

            // Change every 5 seconds
            setInterval(changeBackground, 6000);
        </script>
       
    </body>
</html>