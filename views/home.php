<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/normalize.css">
    <link rel="stylesheet" href="<?=BASE_URL?>/assets/css/style.css">
    <title>Documento Novo</title>
</head>
<body>
    <h2>Este é o home</h2>
    <hr>
    <div class='container'>
        <table>
            <tr>
                <th>ITEM</th>
                <th>TÍTULO</th>
                <th>MENSAGEM</th>
            </tr>
            <?php
                foreach ($lista as $item):?>
                    <tr>
                        <td><?=$item['id']." ";?></td>
                        <td><?=$item['title']."<br>";?></td>
                        <td><?=$item['body']."<br>";?></td>
                    </tr>    
            <?php endforeach; ?>
        </table>
    </div>
    <footer>
        <a href="<?=BASE_URL?>?p=<?='1';?>"><= </a>
        <?php
        for($q=1; $q<=$paginas; $q++):
            //Se página estiver dentro da consição, mostre
            if($q > ($paginaAtual-2) && $q < $paginaAtual+2):
                //Se página atual for a selecionada, destaque-a
                if($paginaAtual == $q):?>
                    <a href="<?=BASE_URL?>?p=<?=$q;?>"><span><?=$q;?></span></a>
                <?php else:?>        
                    <a href="<?=BASE_URL?>?p=<?=$q;?>"><?=$q;?></a>
                <?php endif;
            endif;

        endfor ?>
        <a href="<?=BASE_URL?>?p=<?=$paginas;?>"> =></a>
    </footer>
</body>
</html>


