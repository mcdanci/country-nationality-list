<?php
/**
 * @copyright since 10:25 12/5/2018
 * @author <mc@dancis.info>
 */
namespace McDanci\ISO3166;

use League\ISO3166\ISO3166;

/**
 * Class ISO3166Nationality
 * @package McDanci
 */
final class ISO3166Nationality
{
    /**
     * @todo mark it std or not?
     */
    const DS = DIRECTORY_SEPARATOR;

    const
        NATIONALITY = 'nationality',
        NUMERIC = 'numeric';

    /**
     * @var null|ISO3166
     */
    private static $iso3166;

    private static $list;

    /**
     * @var null|self
     */
    private static $instance;

    /**
     * ISO3166Nationality constructor.
     * Use \McDanci\ISO3166\ISO3166Nationality::getInstance instead
     * @todo how to deal with it? looping currently
     */
    public function __construct()
    {
        //if (self::$instance instanceof self) {
        //    return self::$instance;
        //}
    }

    /**
     * @return ISO3166Nationality
     * @link https://stackoverflow.com/questions/3312806/static-class-initializer-in-php
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$iso3166 = new ISO3166;


            require implode(self::DS, [__DIR__, 'data', 'countries.php']);
            self::$list = $countries;

            $list = [];
            foreach (self::$list as &$region) {
                $list[$region['num_code']] = [
                    ISO3166::KEY_NAME => $region['en_short_name'],
                    ISO3166::KEY_ALPHA2 => $region['alpha_2_code'],
                    ISO3166::KEY_ALPHA3 => $region['alpha_3_code'],
                    ISO3166::KEY_NUMERIC => $region['num_code'],
                    self::NATIONALITY => $region['nationality'],
                ];
            }
            self::$list = &$list;

            // TODO
            //static $DATA_LOCATION = __DIR__ . self::DS . 'gen' . self::DS . 'master-list.csv';
            //self::$list = str_getcsv(file_get_contents($DATA_LOCATION));


            self::$instance = new self;
        }

        return self::$instance;
    }

    public function name($name)
    {
        $data = self::$iso3166->{__FUNCTION__}($name);

        if ($data) {
            if (self::$list[$data[ISO3166::KEY_NUMERIC]]) {
                $data[self::NATIONALITY] = self::$list[$data[ISO3166::KEY_NUMERIC]][self::NATIONALITY];
            }
        }

        return $data;
    }

    public function alpha2($alpha2)
    {
        $data = self::$iso3166->{__FUNCTION__}($alpha2);

        if ($data) {
            if (self::$list[$data[ISO3166::KEY_NUMERIC]]) {
                $data[self::NATIONALITY] = self::$list[$data[ISO3166::KEY_NUMERIC]][self::NATIONALITY];
            }
        }

        return $data;
    }

    public function alpha3($alpha3)
    {
        $data = self::$iso3166->{__FUNCTION__}($alpha3);

        if ($data) {
            if (self::$list[$data[ISO3166::KEY_NUMERIC]]) {
                $data[self::NATIONALITY] = self::$list[$data[ISO3166::KEY_NUMERIC]][self::NATIONALITY];
            }
        }

        return $data;
    }

    /**
     * @param int|string $numeric
     * @return mixed
     */
    public function numeric($numeric)
    {
        $data = self::$iso3166->{__FUNCTION__}((string)$numeric);

        if ($data) {
            if (self::$list[$data[ISO3166::KEY_NUMERIC]]) {
                $data[self::NATIONALITY] = self::$list[$data[ISO3166::KEY_NUMERIC]][self::NATIONALITY];
            }
        }

        return $data;
    }

    /**
     * @return mixed
     * @todo Deal with the key different from ISO3166?
     */
    public function all()
    {
        return self::$list;
    }
}
