    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $page_title ?></title>
    </head>
    <body>
    <h1><?= $page_heading ?></h1>
    <ul>
        <?php
            foreach($subjects as $sub){
                echo "<li>$sub</li>";
            }
         ?>   
    </ul>
    </body>
    </html>
