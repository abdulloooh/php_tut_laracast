<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4>
        <?=  $greeting  ?>
    </h4>
    <ul>
        <!-- one approach -->
        <?php
        foreach ($language as $lang){
            echo "<li>$lang</li>";
        }
        ?>
    </ul>
    <ol>
        <!-- another approach -->
        <?php foreach($language as $lang): ?>
            <li> <?= $lang;?>  </li>
    <?php endforeach; ?>
    </ol>

    <table>
        <?php foreach($likes as $best=>$item): ?>
            <tr>
            <td><?= $best; ?></td>
            <td><?= $item; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <ul>
        <?php foreach ($todo as $item => $todo): ?>
            <?php if (is_bool($todo)): ?>
                <!-- this uses ternary operator -->
                <!-- <li><?= $item; ?>: <?= $todo==true? 'completed':'pending'; ?></li> -->
                <!-- using simple if-else statement -->
                <?php if($todo == true): ?>
                    <li><?= ucwords($item); ?> : &#9989</li>
                    <?php continue; ?>
                <?php else: ?>
                    <li><?= ucwords($item); ?> : &#10005</li>
                    <?php continue; ?>
                <?php endif; ?>
                <?php endif; ?>
        <li><?= ucwords($item); ?>: <?= $todo; ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- fetching from database -->
    <ul>
        <?php 
            foreach($travelData as $travel){
            $travel->interview(true);
            if($travel->response() == true){echo "<li>Entry granted for {$travel->description}</li>";}
            else {echo "<li>Rejected for {$travel->description}</li>";}
            }
        ?>
    </ul>
</body>
</html>