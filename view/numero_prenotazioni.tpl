<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prenotazioni</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
</head>
<body>
    <h1>Resoconto Prenotazioni</h1>
<h2>Prenotazioni di oggi </h2>

    <table>
        <thead>
            <td> Giorno </td>
            <td> Numero Prenotazioni </td>
        </thead>
        <?php foreach($result as $row): ?>
            <tr>
                <td> <?php echo row['giorno'] ?> </td>
                <td> <?php echo row['n_prenotazioni'] ?> </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>