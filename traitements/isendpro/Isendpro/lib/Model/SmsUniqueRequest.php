<?php
/**
 * SmsUniqueRequest
 *
 * PHP version 5
 *
 * @category Class
 * @package  Isendpro
 * @author   Swaagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * API iSendPro
 *
 * [1] Liste des fonctionnalités : - envoi de SMS à un ou plusieurs destinataires, - lookup HLR, - récupération des récapitulatifs de campagne, - gestion des répertoires, - ajout en liste noire. - comptage du nombre de caractères des SMS  [2] Pour utiliser cette API vous devez: - Créer un compte iSendPro sur https://isendpro.com/ - Créditer votre compte      - Remarque: obtention d'un crédit de test possible sous conditions - Noter votre clé de compte (keyid)   - Elle vous sera indispensable à l'utilisation de l'API   - Vous pouvez la trouver dans le rubrique mon \"compte\", sous-rubrique \"mon API\" - Configurer le contrôle IP   - Le contrôle IP est configurable dans le rubrique mon \"compte\", sous-rubrique \"mon API\"   - Il s'agit d'un système de liste blanche, vous devez entrer les IP utilisées pour appeler l'API   - Vous pouvez également désactiver totalement le contrôle IP
 *
 * OpenAPI spec version: 1.1.1
 * Contact: support@isendpro.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Isendpro\Model;

use \ArrayAccess;

/**
 * SmsUniqueRequest Class Doc Comment
 *
 * @category    Class
 * @package     Isendpro
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class SmsUniqueRequest implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'SmsUniqueRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'keyid' => 'string',
        'gmt_zone' => 'string',
        'date_envoi' => 'string',
        'sms' => 'string',
        'num' => 'string',
        'emetteur' => 'string',
        'tracker' => 'string',
        'smslong' => 'string',
        'nostop' => 'string',
        'num_azur' => 'string',
        'ucs2' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'keyid' => null,
        'gmt_zone' => null,
        'date_envoi' => null,
        'sms' => null,
        'num' => null,
        'emetteur' => null,
        'tracker' => null,
        'smslong' => null,
        'nostop' => null,
        'num_azur' => null,
        'ucs2' => null
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'keyid' => 'keyid',
        'gmt_zone' => 'gmt_zone',
        'date_envoi' => 'date_envoi',
        'sms' => 'sms',
        'num' => 'num',
        'emetteur' => 'emetteur',
        'tracker' => 'tracker',
        'smslong' => 'smslong',
        'nostop' => 'nostop',
        'num_azur' => 'numAzur',
        'ucs2' => 'ucs2'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'keyid' => 'setKeyid',
        'gmt_zone' => 'setGmtZone',
        'date_envoi' => 'setDateEnvoi',
        'sms' => 'setSms',
        'num' => 'setNum',
        'emetteur' => 'setEmetteur',
        'tracker' => 'setTracker',
        'smslong' => 'setSmslong',
        'nostop' => 'setNostop',
        'num_azur' => 'setNumAzur',
        'ucs2' => 'setUcs2'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'keyid' => 'getKeyid',
        'gmt_zone' => 'getGmtZone',
        'date_envoi' => 'getDateEnvoi',
        'sms' => 'getSms',
        'num' => 'getNum',
        'emetteur' => 'getEmetteur',
        'tracker' => 'getTracker',
        'smslong' => 'getSmslong',
        'nostop' => 'getNostop',
        'num_azur' => 'getNumAzur',
        'ucs2' => 'getUcs2'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    const GMT_ZONE_PACIFICMIDWAY = 'Pacific/Midway';
    const GMT_ZONE_AMERICAADAK = 'America/Adak';
    const GMT_ZONE_ETCGMT10 = 'Etc/GMT+10';
    const GMT_ZONE_PACIFICMARQUESAS = 'Pacific/Marquesas';
    const GMT_ZONE_PACIFICGAMBIER = 'Pacific/Gambier';
    const GMT_ZONE_AMERICAANCHORAGE = 'America/Anchorage';
    const GMT_ZONE_AMERICAENSENADA = 'America/Ensenada';
    const GMT_ZONE_ETCGMT8 = 'Etc/GMT+8';
    const GMT_ZONE_AMERICALOS_ANGELES = 'America/Los_Angeles';
    const GMT_ZONE_AMERICADENVER = 'America/Denver';
    const GMT_ZONE_AMERICACHIHUAHUA = 'America/Chihuahua';
    const GMT_ZONE_AMERICADAWSON_CREEK = 'America/Dawson_Creek';
    const GMT_ZONE_AMERICABELIZE = 'America/Belize';
    const GMT_ZONE_AMERICACANCUN = 'America/Cancun';
    const GMT_ZONE_CHILEEASTER_ISLAND = 'Chile/EasterIsland';
    const GMT_ZONE_AMERICACHICAGO = 'America/Chicago';
    const GMT_ZONE_AMERICANEW_YORK = 'America/New_York';
    const GMT_ZONE_AMERICAHAVANA = 'America/Havana';
    const GMT_ZONE_AMERICABOGOTA = 'America/Bogota';
    const GMT_ZONE_AMERICACARACAS = 'America/Caracas';
    const GMT_ZONE_AMERICASANTIAGO = 'America/Santiago';
    const GMT_ZONE_AMERICALA_PAZ = 'America/La_Paz';
    const GMT_ZONE_ATLANTICSTANLEY = 'Atlantic/Stanley';
    const GMT_ZONE_AMERICACAMPO_GRANDE = 'America/Campo_Grande';
    const GMT_ZONE_AMERICAGOOSE_BAY = 'America/Goose_Bay';
    const GMT_ZONE_AMERICAGLACE_BAY = 'America/Glace_Bay';
    const GMT_ZONE_AMERICAST_JOHNS = 'America/St_Johns';
    const GMT_ZONE_AMERICAARAGUAINA = 'America/Araguaina';
    const GMT_ZONE_AMERICAMONTEVIDEO = 'America/Montevideo';
    const GMT_ZONE_AMERICAMIQUELON = 'America/Miquelon';
    const GMT_ZONE_AMERICAGODTHAB = 'America/Godthab';
    const GMT_ZONE_AMERICAARGENTINABUENOS_AIRES = 'America/Argentina/Buenos_Aires';
    const GMT_ZONE_AMERICASAO_PAULO = 'America/Sao_Paulo';
    const GMT_ZONE_AMERICANORONHA = 'America/Noronha';
    const GMT_ZONE_ATLANTICCAPE_VERDE = 'Atlantic/Cape_Verde';
    const GMT_ZONE_ATLANTICAZORES = 'Atlantic/Azores';
    const GMT_ZONE_EUROPEBELFAST = 'Europe/Belfast';
    const GMT_ZONE_EUROPEDUBLIN = 'Europe/Dublin';
    const GMT_ZONE_EUROPELISBON = 'Europe/Lisbon';
    const GMT_ZONE_EUROPELONDON = 'Europe/London';
    const GMT_ZONE_AFRICAABIDJAN = 'Africa/Abidjan';
    const GMT_ZONE_EUROPEAMSTERDAM = 'Europe/Amsterdam';
    const GMT_ZONE_EUROPEBELGRADE = 'Europe/Belgrade';
    const GMT_ZONE_EUROPEBRUSSELS = 'Europe/Brussels';
    const GMT_ZONE_AFRICAALGIERS = 'Africa/Algiers';
    const GMT_ZONE_AFRICAWINDHOEK = 'Africa/Windhoek';
    const GMT_ZONE_ASIABEIRUT = 'Asia/Beirut';
    const GMT_ZONE_AFRICACAIRO = 'Africa/Cairo';
    const GMT_ZONE_ASIAGAZA = 'Asia/Gaza';
    const GMT_ZONE_AFRICABLANTYRE = 'Africa/Blantyre';
    const GMT_ZONE_ASIAJERUSALEM = 'Asia/Jerusalem';
    const GMT_ZONE_EUROPEMINSK = 'Europe/Minsk';
    const GMT_ZONE_ASIADAMASCUS = 'Asia/Damascus';
    const GMT_ZONE_EUROPEMOSCOW = 'Europe/Moscow';
    const GMT_ZONE_AFRICAADDIS_ABABA = 'Africa/Addis_Ababa';
    const GMT_ZONE_ASIATEHRAN = 'Asia/Tehran';
    const GMT_ZONE_ASIADUBAI = 'Asia/Dubai';
    const GMT_ZONE_ASIAYEREVAN = 'Asia/Yerevan';
    const GMT_ZONE_ASIAKABUL = 'Asia/Kabul';
    const GMT_ZONE_ASIAYEKATERINBURG = 'Asia/Yekaterinburg';
    const GMT_ZONE_ASIATASHKENT = 'Asia/Tashkent';
    const GMT_ZONE_ASIAKOLKATA = 'Asia/Kolkata';
    const GMT_ZONE_ASIAKATMANDU = 'Asia/Katmandu';
    const GMT_ZONE_ASIADHAKA = 'Asia/Dhaka';
    const GMT_ZONE_ASIANOVOSIBIRSK = 'Asia/Novosibirsk';
    const GMT_ZONE_ASIARANGOON = 'Asia/Rangoon';
    const GMT_ZONE_ASIABANGKOK = 'Asia/Bangkok';
    const GMT_ZONE_ASIAKRASNOYARSK = 'Asia/Krasnoyarsk';
    const GMT_ZONE_ASIAHONG_KONG = 'Asia/Hong_Kong';
    const GMT_ZONE_ASIAIRKUTSK = 'Asia/Irkutsk';
    const GMT_ZONE_AUSTRALIAPERTH = 'Australia/Perth';
    const GMT_ZONE_AUSTRALIAEUCLA = 'Australia/Eucla';
    const GMT_ZONE_ASIATOKYO = 'Asia/Tokyo';
    const GMT_ZONE_ASIASEOUL = 'Asia/Seoul';
    const GMT_ZONE_ASIAYAKUTSK = 'Asia/Yakutsk';
    const GMT_ZONE_AUSTRALIAADELAIDE = 'Australia/Adelaide';
    const GMT_ZONE_AUSTRALIADARWIN = 'Australia/Darwin';
    const GMT_ZONE_AUSTRALIABRISBANE = 'Australia/Brisbane';
    const GMT_ZONE_AUSTRALIAHOBART = 'Australia/Hobart';
    const GMT_ZONE_ASIAVLADIVOSTOK = 'Asia/Vladivostok';
    const GMT_ZONE_AUSTRALIALORD_HOWE = 'Australia/Lord_Howe';
    const GMT_ZONE_ETCGMT_11 = 'Etc/GMT-11';
    const GMT_ZONE_ASIAMAGADAN = 'Asia/Magadan';
    const GMT_ZONE_PACIFICNORFOLK = 'Pacific/Norfolk';
    const GMT_ZONE_ASIAANADYR = 'Asia/Anadyr';
    const GMT_ZONE_PACIFICAUCKLAND = 'Pacific/Auckland';
    const GMT_ZONE_ETCGMT_12 = 'Etc/GMT-12';
    const GMT_ZONE_PACIFICCHATHAM = 'Pacific/Chatham';
    const GMT_ZONE_PACIFICTONGATAPU = 'Pacific/Tongatapu';
    const GMT_ZONE_PACIFICKIRITIMATI = 'Pacific/Kiritimati';
    const NUM_AZUR__1 = '1';
    

    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getGmtZoneAllowableValues()
    {
        return [
            self::GMT_ZONE_PACIFICMIDWAY,
            self::GMT_ZONE_AMERICAADAK,
            self::GMT_ZONE_ETCGMT10,
            self::GMT_ZONE_PACIFICMARQUESAS,
            self::GMT_ZONE_PACIFICGAMBIER,
            self::GMT_ZONE_AMERICAANCHORAGE,
            self::GMT_ZONE_AMERICAENSENADA,
            self::GMT_ZONE_ETCGMT8,
            self::GMT_ZONE_AMERICALOS_ANGELES,
            self::GMT_ZONE_AMERICADENVER,
            self::GMT_ZONE_AMERICACHIHUAHUA,
            self::GMT_ZONE_AMERICADAWSON_CREEK,
            self::GMT_ZONE_AMERICABELIZE,
            self::GMT_ZONE_AMERICACANCUN,
            self::GMT_ZONE_CHILEEASTER_ISLAND,
            self::GMT_ZONE_AMERICACHICAGO,
            self::GMT_ZONE_AMERICANEW_YORK,
            self::GMT_ZONE_AMERICAHAVANA,
            self::GMT_ZONE_AMERICABOGOTA,
            self::GMT_ZONE_AMERICACARACAS,
            self::GMT_ZONE_AMERICASANTIAGO,
            self::GMT_ZONE_AMERICALA_PAZ,
            self::GMT_ZONE_ATLANTICSTANLEY,
            self::GMT_ZONE_AMERICACAMPO_GRANDE,
            self::GMT_ZONE_AMERICAGOOSE_BAY,
            self::GMT_ZONE_AMERICAGLACE_BAY,
            self::GMT_ZONE_AMERICAST_JOHNS,
            self::GMT_ZONE_AMERICAARAGUAINA,
            self::GMT_ZONE_AMERICAMONTEVIDEO,
            self::GMT_ZONE_AMERICAMIQUELON,
            self::GMT_ZONE_AMERICAGODTHAB,
            self::GMT_ZONE_AMERICAARGENTINABUENOS_AIRES,
            self::GMT_ZONE_AMERICASAO_PAULO,
            self::GMT_ZONE_AMERICANORONHA,
            self::GMT_ZONE_ATLANTICCAPE_VERDE,
            self::GMT_ZONE_ATLANTICAZORES,
            self::GMT_ZONE_EUROPEBELFAST,
            self::GMT_ZONE_EUROPEDUBLIN,
            self::GMT_ZONE_EUROPELISBON,
            self::GMT_ZONE_EUROPELONDON,
            self::GMT_ZONE_AFRICAABIDJAN,
            self::GMT_ZONE_EUROPEAMSTERDAM,
            self::GMT_ZONE_EUROPEBELGRADE,
            self::GMT_ZONE_EUROPEBRUSSELS,
            self::GMT_ZONE_AFRICAALGIERS,
            self::GMT_ZONE_AFRICAWINDHOEK,
            self::GMT_ZONE_ASIABEIRUT,
            self::GMT_ZONE_AFRICACAIRO,
            self::GMT_ZONE_ASIAGAZA,
            self::GMT_ZONE_AFRICABLANTYRE,
            self::GMT_ZONE_ASIAJERUSALEM,
            self::GMT_ZONE_EUROPEMINSK,
            self::GMT_ZONE_ASIADAMASCUS,
            self::GMT_ZONE_EUROPEMOSCOW,
            self::GMT_ZONE_AFRICAADDIS_ABABA,
            self::GMT_ZONE_ASIATEHRAN,
            self::GMT_ZONE_ASIADUBAI,
            self::GMT_ZONE_ASIAYEREVAN,
            self::GMT_ZONE_ASIAKABUL,
            self::GMT_ZONE_ASIAYEKATERINBURG,
            self::GMT_ZONE_ASIATASHKENT,
            self::GMT_ZONE_ASIAKOLKATA,
            self::GMT_ZONE_ASIAKATMANDU,
            self::GMT_ZONE_ASIADHAKA,
            self::GMT_ZONE_ASIANOVOSIBIRSK,
            self::GMT_ZONE_ASIARANGOON,
            self::GMT_ZONE_ASIABANGKOK,
            self::GMT_ZONE_ASIAKRASNOYARSK,
            self::GMT_ZONE_ASIAHONG_KONG,
            self::GMT_ZONE_ASIAIRKUTSK,
            self::GMT_ZONE_AUSTRALIAPERTH,
            self::GMT_ZONE_AUSTRALIAEUCLA,
            self::GMT_ZONE_ASIATOKYO,
            self::GMT_ZONE_ASIASEOUL,
            self::GMT_ZONE_ASIAYAKUTSK,
            self::GMT_ZONE_AUSTRALIAADELAIDE,
            self::GMT_ZONE_AUSTRALIADARWIN,
            self::GMT_ZONE_AUSTRALIABRISBANE,
            self::GMT_ZONE_AUSTRALIAHOBART,
            self::GMT_ZONE_ASIAVLADIVOSTOK,
            self::GMT_ZONE_AUSTRALIALORD_HOWE,
            self::GMT_ZONE_ETCGMT_11,
            self::GMT_ZONE_ASIAMAGADAN,
            self::GMT_ZONE_PACIFICNORFOLK,
            self::GMT_ZONE_ASIAANADYR,
            self::GMT_ZONE_PACIFICAUCKLAND,
            self::GMT_ZONE_ETCGMT_12,
            self::GMT_ZONE_PACIFICCHATHAM,
            self::GMT_ZONE_PACIFICTONGATAPU,
            self::GMT_ZONE_PACIFICKIRITIMATI,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public function getNumAzurAllowableValues()
    {
        return [
            self::NUM_AZUR__1,
        ];
    }
    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['keyid'] = isset($data['keyid']) ? $data['keyid'] : null;
        $this->container['gmt_zone'] = isset($data['gmt_zone']) ? $data['gmt_zone'] : null;
        $this->container['date_envoi'] = isset($data['date_envoi']) ? $data['date_envoi'] : null;
        $this->container['sms'] = isset($data['sms']) ? $data['sms'] : null;
        $this->container['num'] = isset($data['num']) ? $data['num'] : null;
        $this->container['emetteur'] = isset($data['emetteur']) ? $data['emetteur'] : null;
        $this->container['tracker'] = isset($data['tracker']) ? $data['tracker'] : null;
        $this->container['smslong'] = isset($data['smslong']) ? $data['smslong'] : null;
        $this->container['nostop'] = isset($data['nostop']) ? $data['nostop'] : null;
        $this->container['num_azur'] = isset($data['num_azur']) ? $data['num_azur'] : null;
        $this->container['ucs2'] = isset($data['ucs2']) ? $data['ucs2'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        if ($this->container['keyid'] === null) {
            $invalid_properties[] = "'keyid' can't be null";
        }
        $allowed_values = $this->getGmtZoneAllowableValues();
        if (!in_array($this->container['gmt_zone'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'gmt_zone', must be one of '%s'",
                implode("', '", $allowed_values)
            );
        }

        if ($this->container['sms'] === null) {
            $invalid_properties[] = "'sms' can't be null";
        }
        if ($this->container['num'] === null) {
            $invalid_properties[] = "'num' can't be null";
        }
        $allowed_values = $this->getNumAzurAllowableValues();
        if (!in_array($this->container['num_azur'], $allowed_values)) {
            $invalid_properties[] = sprintf(
                "invalid value for 'num_azur', must be one of '%s'",
                implode("', '", $allowed_values)
            );
        }

        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        if ($this->container['keyid'] === null) {
            return false;
        }
        $allowed_values = $this->getGmtZoneAllowableValues();
        if (!in_array($this->container['gmt_zone'], $allowed_values)) {
            return false;
        }
        if ($this->container['sms'] === null) {
            return false;
        }
        if ($this->container['num'] === null) {
            return false;
        }
        $allowed_values = $this->getNumAzurAllowableValues();
        if (!in_array($this->container['num_azur'], $allowed_values)) {
            return false;
        }
        return true;
    }


    /**
     * Gets keyid
     * @return string
     */
    public function getKeyid()
    {
        return $this->container['keyid'];
    }

    /**
     * Sets keyid
     * @param string $keyid Clé API
     * @return $this
     */
    public function setKeyid($keyid)
    {
        $this->container['keyid'] = $keyid;

        return $this;
    }

    /**
     * Gets gmt_zone
     * @return string
     */
    public function getGmtZone()
    {
        return $this->container['gmt_zone'];
    }

    /**
     * Sets gmt_zone
     * @param string $gmt_zone Fuseau horaire de la date d'envoi
     * @return $this
     */
    public function setGmtZone($gmt_zone)
    {
        $allowed_values = $this->getGmtZoneAllowableValues();
        if (!is_null($gmt_zone) && !in_array($gmt_zone, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'gmt_zone', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['gmt_zone'] = $gmt_zone;

        return $this;
    }

    /**
     * Gets date_envoi
     * @return string
     */
    public function getDateEnvoi()
    {
        return $this->container['date_envoi'];
    }

    /**
     * Sets date_envoi
     * @param string $date_envoi Date d'envoi au format YYYY-MM-DD hh:mm . Ce paramètre est optionnel, si il est omis l'envoi est réalisé immédiatement.
     * @return $this
     */
    public function setDateEnvoi($date_envoi)
    {
        $this->container['date_envoi'] = $date_envoi;

        return $this;
    }

    /**
     * Gets sms
     * @return string
     */
    public function getSms()
    {
        return $this->container['sms'];
    }

    /**
     * Sets sms
     * @param string $sms Message à envoyer aux destinataires. Le message doit être encodé au format utf-8 et ne contenir que des caractères existant dans l'alphabet GSM. Il est également possible d'envoyer (à l'étranger uniquement) des SMS en UCS-2, cf paramètre ucs2 pour plus de détails.
     * @return $this
     */
    public function setSms($sms)
    {
        $this->container['sms'] = $sms;

        return $this;
    }

    /**
     * Gets num
     * @return string
     */
    public function getNum()
    {
        return $this->container['num'];
    }

    /**
     * Sets num
     * @param string $num Numero de téléphone au format national (exemple 0680010203) ou international (example 33680010203)
     * @return $this
     */
    public function setNum($num)
    {
        $this->container['num'] = $num;

        return $this;
    }

    /**
     * Gets emetteur
     * @return string
     */
    public function getEmetteur()
    {
        return $this->container['emetteur'];
    }

    /**
     * Sets emetteur
     * @param string $emetteur - L'emetteur doit être une chaîne alphanumérique comprise entre 4 et 11 caractères.  - Les caractères acceptés sont les chiffres entre 0 et 9, les lettres entre A et Z et l’espace.  - Il ne peut pas comporter uniquement des chiffres.   - Pour la modification de l'émetteur et dans le cadre de campagnes commerciales, les opérateurs imposent contractuellement d'ajouter en fin de message le texte \"STOP XXXXX\". De ce fait, le message envoyé ne pourra excéder une longueur de 148 caractères au lieu des 160 caractères, le « STOP » étant rajouté automatiquement.
     * @return $this
     */
    public function setEmetteur($emetteur)
    {
        $this->container['emetteur'] = $emetteur;

        return $this;
    }

    /**
     * Gets tracker
     * @return string
     */
    public function getTracker()
    {
        return $this->container['tracker'];
    }

    /**
     * Sets tracker
     * @param string $tracker Le tracker doit être une chaine alphanumérique de moins de 50 caractères. Ce tracker sera ensuite renvoyé en paramètre des urls pour les retours des accusés de réception.
     * @return $this
     */
    public function setTracker($tracker)
    {
        $this->container['tracker'] = $tracker;

        return $this;
    }

    /**
     * Gets smslong
     * @return string
     */
    public function getSmslong()
    {
        return $this->container['smslong'];
    }

    /**
     * Sets smslong
     * @param string $smslong Le SMS long permet de dépasser la limite de 160 caractères en envoyant un message constitué de plusieurs SMS. Il est possible d’envoyer jusqu’à 6 SMS concaténés pour une longueur totale maximale de 918 caractères par message. Pour des raisons technique, la limite par SMS concaténé étant de 153 caractères. En cas de modification de l’émetteur, il faut considérer l’ajout automatique de 12 caractères du « STOP SMS ». Pour envoyer un smslong, il faut ajouter le paramètre smslong aux appels. La valeur de SMS doit être le nombre maximum de sms concaténé autorisé.   Pour ne pas avoir ce message d’erreur et obtenir un calcul dynamique du nombre de SMS alors il faut renseigner smslong = \"999\"
     * @return $this
     */
    public function setSmslong($smslong)
    {
        $this->container['smslong'] = $smslong;

        return $this;
    }

    /**
     * Gets nostop
     * @return string
     */
    public function getNostop()
    {
        return $this->container['nostop'];
    }

    /**
     * Sets nostop
     * @param string $nostop Si le message n’est pas à but commercial, vous pouvez faire une demande pour retirer l’obligation du STOP. Une fois votre demande validée par nos services, vous pourrez supprimer la mention STOP SMS en ajoutant nostop = \"1\"
     * @return $this
     */
    public function setNostop($nostop)
    {
        $this->container['nostop'] = $nostop;

        return $this;
    }

    /**
     * Gets num_azur
     * @return string
     */
    public function getNumAzur()
    {
        return $this->container['num_azur'];
    }

    /**
     * Sets num_azur
     * @param string $num_azur
     * @return $this
     */
    public function setNumAzur($num_azur)
    {
        $allowed_values = $this->getNumAzurAllowableValues();
        if (!is_null($num_azur) && !in_array($num_azur, $allowed_values)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'num_azur', must be one of '%s'",
                    implode("', '", $allowed_values)
                )
            );
        }
        $this->container['num_azur'] = $num_azur;

        return $this;
    }

    /**
     * Gets ucs2
     * @return string
     */
    public function getUcs2()
    {
        return $this->container['ucs2'];
    }

    /**
     * Sets ucs2
     * @param string $ucs2 Il est également possible d’envoyer des SMS en alphabet non latin (russe, chinois, arabe, etc) sur les numéros hors France métropolitaine. Pour ce faire, la requête devrait être encodée au format UTF-8 et contenir l’argument ucs2 = \"1\" Du fait de contraintes techniques, 1 SMS unique ne pourra pas dépasser 70 caractères (au lieu des 160 usuels) et dans le cas de SMS long, chaque sms ne pourra dépasser 67 caractères.
     * @return $this
     */
    public function setUcs2($ucs2)
    {
        $this->container['ucs2'] = $ucs2;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Isendpro\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Isendpro\ObjectSerializer::sanitizeForSerialization($this));
    }
}


