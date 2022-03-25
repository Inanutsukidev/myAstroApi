<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AstrologicalSign extends Model
{
    use HasFactory;

    public function whatsTheZodiakSign($date)
    {
        $astrological_sign = '';


        list($annee, $mois, $jour) = explode("-", $date);

        if (($mois == 3 && $jour > 20) || ($mois == 4 && $jour < 20)) {

            $astrological_sign = "Bélier";
        } elseif (($mois == 4 && $jour > 19) || ($mois == 5 && $jour < 21)) {

            $astrological_sign = "Taureau";
        } elseif (($mois == 5 && $jour > 20) || ($mois == 6 && $jour < 21)) {

            $astrological_sign = "Gémeaux";
        } elseif (($mois == 6 && $jour > 20) || ($mois == 7 && $jour < 23)) {

            $astrological_sign = "Cancer";
        } elseif (($mois == 7 && $jour > 22) || ($mois == 8 && $jour < 23)) {

            $astrological_sign = "Lion";
        } elseif (($mois == 8 && $jour > 22) || ($mois == 9 && $jour < 23)) {

            $astrological_sign = "Vierge";
        } elseif (($mois == 9 && $jour > 22) || ($mois == 10 && $jour < 23)) {

            $astrological_sign = "Balance";
        } elseif (($mois == 10 && $jour > 22) || ($mois == 11 && $jour < 22)) {

            $astrological_sign = "Scorpion";
        } elseif (($mois == 11 && $jour > 21) || ($mois == 12 && $jour < 22)) {

            $astrological_sign = "Sagittaire";
        } elseif (($mois == 12 && $jour > 21) || ($mois == 1 && $jour < 20)) {

            $astrological_sign = "Capricorne";
        } elseif (($mois == 1 && $jour > 19) || ($mois == 2 && $jour < 19)) {

            $astrological_sign = "Verseau";
        } elseif (($mois == 2 && $jour > 18) || ($mois == 3 && $jour < 21)) {

            $astrological_sign = "Poisson";
        }

        return $astrological_sign;
    }

    public function whatTheChineseSign($date)
    {
        list($annee, $mois, $jour) = explode("-", $date);

        $x = (1901 - $annee) % 12;
        switch ($x) {
            case 1:
                $sign = "Rat";
                break;
            case 0:
                $sign = "Buffle";
                break;
            case 11:
                $sign = "Tigre";
                break;
            case 10:
                $sign = "Lapin";
                break;
            case 9:
                $sign = "Dragon";
                break;
            case 8:
                $sign = "Serpent";
                break;
            case 7:
                $sign = "Cheval";
                break;
            case 6:
                $sign = "Chèvre";
                break;
            case 5:
                $sign = "Singe";
                break;
            case 4:
                $sign = "Coq";
                break;
            case 3:
                $sign = "Chien";
                break;
            case 2:
                $sign = "Cochon";
                break;

            case -11:
                $sign = "Rat";
                break;
            case 0:
                $sign = "Buffle";
                break;
            case -1:
                $sign = "Tigre";
                break;
            case -2:
                $sign = "Lapin";
                break;
            case -3:
                $sign = "Dragon";
                break;
            case -4:
                $sign = "Serpent";
                break;
            case -5:
                $sign = "Cheval";
                break;
            case -6:
                $sign = "Chèvre";
                break;
            case -7:
                $sign = "Singe";
                break;
            case -8:
                $sign = "Coq";
                break;
            case -9:
                $sign = "Chien";
                break;
            case -10:
                $sign = "Cochon";
                break;
        };

        return $sign;
    }
}
