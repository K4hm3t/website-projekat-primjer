<?php  require('../konekcija/conn.php');  // requira bazu i prijava.php
	   require('prijava.php');
 
?>

<?php
      $sifra = $_POST['sifra']; 
      $novasifra = $_POST['novasifra'];
      $korisnik1 = $_SESSION['korisnik_sesija'];

      $upit = "SELECT * FROM registrovani WHERE sifra='$sifra' AND korisnik='$korisnik1'";
      $provjera = mysqli_query($db, $upit); // kreira upit

      if(mysqli_num_rows($provjera) == 0) {
        "<script>location.reload();</script>"; return true; // ukoliko se unosi ne podudaraju, odnosno ukoliko unesemo pogresan trenutni password
        // stranica se reseta pomocu JS
      } else {
        $sql = "UPDATE registrovani SET sifra='$novasifra' WHERE sifra='$sifra' AND korisnik='$korisnik1'"; // ukoliko je dobar unos trenutne sifre
        mysqli_query($db,$sql);                                                                             // salje se upit u bazu
        echo "<script>alert('Uspješno ste promijenili šifru!')</script>";                                   // koji updejta sifru od tog korisnika
        return true;                                                                                        // te nam vraca alert
       } 

?>