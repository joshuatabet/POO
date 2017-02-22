<?php
function userConnect(PDO $db, $pseudo, $pass){

    $sql ="SELECT *
		FROM profil
		WHERE pseudo = :pseudo 
		AND pass = :pass";

    $req = $db->prepare($sql);
    $req->execute(array(
        'pseudo' => $pseudo,
        'pass' => $pass
    ));

    $result = $req->fetch(PDO::FETCH_ASSOC);

    if($result == true){
        $_SESSION['id'] = $result['id'];
        $_SESSION['nom'] = $result['nom'];
        $_SESSION['pseudo'] = $result['pseudo'];
        $_SESSION['prenom'] = $result['prenom'];
        $_SESSION['email'] = $result['email'];
        return true;
    }else {
        return false;
    }
}


function userRegistration(PDO $db, $nom, $prenom, $pseudo, $email, $pass, $descriptif ) {


    if ( !empty($nom) AND !empty($prenom) AND !empty($pseudo)  AND !empty($email) AND !empty($pass) AND !empty($descriptif)) {
        $sql= " INSERT INTO profil (nom, prenom, pseudo, email, pass, descriptif) 
				 VALUES (:nom, :prenom, :pseudo, :email, :pass, :descriptif)";

        $req = $db->prepare($sql);
        $req->execute( array(
            'nom' => $nom,
            'prenom' => $prenom,
            'pseudo' => $pseudo,
            'email' => $email,
            'pass' => $pass,
            'descriptif' => $descriptif


        ));

        return true;

    } else {
        return false;
    }


}
?>