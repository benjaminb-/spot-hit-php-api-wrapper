<?php

namespace BB;

class SpotHitErrors
{

    public static $senderErrors = array(
        1 => "Type de message non spécifié ou incorrect (paramètre \"type\")",
        2 => "Le message est vide",
        3 => "Le message contient plus de 160 caractères",
        4 => "Aucun destinataire valide n'est renseigné",
        5 => "Numéro interdit: seuls les envois en France Métropolitaine sont autorisés pour les SMS Low Cost",
        6 => "Numéro de destinataire invalide",
        7 => "Votre compte n'a pas de formule définie",
        8 => "L'expéditeur ne peut contenir que 11 caractères",
        9 => "Le système a rencontré une erreur, merci de nous contacter",
        10 => "Vous ne disposez pas d'assez de SMS pour effectuer cet envoi",
        11 => "L'envoi des message est désactivé pour la démonstration",
        12 => "Votre compte a été suspendu. Contactez-nous pour plus d'informations",
        13 => "Votre limite d'envoi paramétrée est atteinte. Contactez-nous pour plus d'informations",
        14 => "Votre limite d'envoi paramétrée est atteinte. Contactez-nous pour plus d'informations",
        15 => "Votre limite d'envoi paramétrée est atteinte. Contactez-nous pour plus d'informations",
        16 => "Le paramètre \"smslongnbr\" n'est pas cohérent avec la taille du message envoyé.",
        17 => "L'expéditeur n'est pas autorisé.",
        18 => "EMAIL | Le sujet est trop court.",
        19 => "EMAIL | L'e-mail de réponse est invalide.",
        20 => "EMAIL | Le nom d'expéditeur est trop court.",
        21 => "Token invalide. Contactez-nous pour plus d'informations",
        22 => "Durée du message non autorisée. Contactez-nous pour plus d'informations.",
        23 => "Aucune date variable valide n'a été trouvée dans votre liste de destinataires.",
        24 => "Votre campagne n'a pas été validée car il manque la mention « STOP » dans votre message. Pour rappel, afin de respecter les obligations légales de la CNIL, il est impératif d'inclure une mention de désinscription. Vous pouvez cliquer sur « Modifier la campagne » et cocher la mention STOP en bas du message.",
        25 => "Echelonnage : date de début vide",
        26 => "Echelonnage : date de fin vide",
        27 => "Echelonnage : date de début plus tard que date de fin",
        28 => "Echelonnage : aucun créneau disponible",
        30 => "Clé API non reconnue."
    );


    public static $smsReceiverErrors = array(
        0 => "En attente",
        1 => "Livré",
        2 => "Envoyé",
        3 => "En cours",
        4 => "Echec",
        5 => "Expiré"
    );

    public static $emailReceiverErrors = array(
        0 => "En attente",
        2 => "Envoyé",
        3 => "Cliqué",
        4 => "Erreur",
        5 => "Bloqué",
        6 => "Spam",
        7 => "Desabonné",
        8 => "Ouvert"
    );

    public static function getErrorAsString($errors, $code)
    {
        return isset($errors[$code]) ? $errors[$code] : "";
    }

    public static function getErrors($response)
    {
        if (isset($response["erreurs"])) {
            $errorCodes = explode(",", $response["erreurs"]);
            $response = array();
            foreach ($errorCodes AS $errorCode) {
                $response[] = self::getErrorAsString(self::$senderErrors, $errorCode);
            }
        }
        return $response;
    }

}