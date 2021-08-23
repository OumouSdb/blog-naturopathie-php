
<?php
require('nav.php');
?>
<div class="bg_weight">
   
    <h1>Calculer son indice de masse corporel</h1>
    <form action="" method="post" class="form_imc">
        <input type="number" placeholder="Entrez votre poid en KG" name="poids">
        <input type="text" placeholder="Entrez votre taille en CM" name="taille">
        <button type="submit" name="calculIMC">Calculer</button>
    </form>
    <?php
        function calcul($poids, $taille){
           $evaluation =  floor($poids / ($taille * $taille));
           echo 'Votre indice de masse corporel est évalué à '.$evaluation.' ';
           if($evaluation < 18.5){
            echo 'Insuffisance pondérale';
           }
            else if($evaluation >18.5 && $evaluation < 25){
                echo ' Corpulence normale';
            }else if($evaluation >= 25  && $evaluation < 30){
                echo ' Surpoids';
            }else if($evaluation >= 30 && $evaluation < 35){
                echo ' Obésité moderée';
            }else if($evaluation >= 35 && $evaluation < 40){
                echo 'Obésité sevère';
            }else{
                echo 'Obésité morbide';

            }
        }


       if(isset($_POST['calculIMC'])){
           $poids = $_POST['poids'];
           $taille = $_POST['taille'];
           if(isset($_POST['poids']) && isset($_POST['taille'])){
            calcul($poids, $taille);
            $poids = '';
            $taille = '';
           }
       }
    ?>
</div>
<?php require('footer.php'); ?>
    