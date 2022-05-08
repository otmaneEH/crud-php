<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>

        <?php

        $note = array(12, 3, 15, 10, 13, 12, 10, 20, 6, 8, 13, 17, 19, 12, 11, 6, 1, 9, 19);
// 9riba l js f syntax
        for ($i = 0; $i < count($note); $i++) {
// echo sre3 mn print f php
            print '<tr> 

            <td>' . $note[$i] . '</td>
            
            </tr>';
        }
        ?>
    </table>
</body>

</html>