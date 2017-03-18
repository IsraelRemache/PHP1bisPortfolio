<?php
    session_start();
    $prodId = $_GET['itemid'];
    $prod = [
        [
            "product"     => "Alpaca Deken",
            "img"  => "https://s-media-cache-ak0.pinimg.com/736x/57/69/5b/57695b1a48e3c6c3600308764e5f0c29.jpg",
            "beschrijving"    => "Dit is een deken gemaakt van alpaca wol, te vinden in Ecuador. Gemaakt door inheems volk waardoor het van hoog kwaliteit is. Alpaca wol is hel licht en lekker warm.",
            "prijs"     => "€45"
        
        ],
         [
            "product"     => "Poncho",
            "img"  => "http://i.ebayimg.com/images/g/KEAAAOSwjVVV4Xex/s-l300.jpg",
            "beschrijving"    => "De typische ponchos, gebruikt in Ecuador, worden van alpaca wol en schapen wol gemaakt. Ze worden apart verkocht of gemixt. Kleurijk versierd en stevig gemaakt helpt u dit door de sterke winters te gaan.",
            "prijs"     => "€50"
        
        ],
         [
            "product"     => "Chauchera",
            "img"  => "http://mlc-s1-p.mlstatic.com/917-MLC3421962641_112012-Y.jpg",
            "beschrijving"    => "Deze chauchera is een lederen portemonee dat je aan uw riem kan hechten. Ze zij stevig waardoor uw centjes veilig worden bijgehouden",
            "prijs"     => "€10"
        
        ],
        
    ];
    if(isset($_POST["buy"])){
        $_SESSION["cart"][$prodId] = $prod[$prodId]["product"] . " " . $prod[$prodId]["prijs"];
        header('Location: test3.php');
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail</title>
</head>
<body>
   <a href="test3.php">Back</a>
    <h1> <?php echo $prod[$prodId]["product"]; ?> </h1>
    <img src="<?php echo $prod[$prodId]["img"]; ?>" alt="afbeelding">
    <h2><?php echo $prod[$prodId]["beschrijving"]; ?> </h2>
    <p> <?php echo $prod[$prodId]["prijs"]; ?> </p>
    <form action="" method="post">
    <input type="submit" name="buy" value="Koop"></button>
    </form>        
</body>
</html>