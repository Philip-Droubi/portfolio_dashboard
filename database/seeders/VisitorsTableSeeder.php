<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VisitorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('visitors')->delete();
        
        \DB::table('visitors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'IP' => '94.47.164.106',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-03-31 05:14:19',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            1 => 
            array (
                'id' => 2,
                'IP' => '94.47.164.106',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-03-31 05:23:12',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            2 => 
            array (
                'id' => 3,
                'IP' => '88.202.178.101',
                'country' => 'United States',
                'city' => 'New York',
                'region' => 'New York',
                'code' => 'US',
                'created_at' => '2023-03-31 05:31:10',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            3 => 
            array (
                'id' => 4,
                'IP' => '5.0.45.69',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-03-31 15:41:46',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            4 => 
            array (
                'id' => 5,
                'IP' => '188.133.16.82',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-03-31 19:29:31',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            5 => 
            array (
                'id' => 6,
                'IP' => '31.9.174.198',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-04-01 23:07:56',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            6 => 
            array (
                'id' => 7,
                'IP' => '40.77.188.244',
                'country' => 'United States',
                'city' => 'Chicago',
                'region' => 'Illinois',
                'code' => 'US',
                'created_at' => '2023-04-03 22:51:29',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            7 => 
            array (
                'id' => 8,
                'IP' => '172.104.206.10',
                'country' => 'India',
                'city' => 'Mumbai',
                'region' => 'Maharashtra',
                'code' => 'IN',
                'created_at' => '2023-04-03 23:01:42',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            8 => 
            array (
                'id' => 9,
                'IP' => '31.9.173.16',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-04-04 15:33:09',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            9 => 
            array (
                'id' => 10,
                'IP' => '31.9.173.16',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-04-04 15:35:09',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            10 => 
            array (
                'id' => 11,
                'IP' => '31.9.218.151',
                'country' => 'Syria',
                'city' => 'Qadsayyā',
                'region' => 'Rif-dimashq',
                'code' => 'SY',
                'created_at' => '2023-04-04 20:28:35',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            11 => 
            array (
                'id' => 12,
                'IP' => '178.253.95.112',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-04-06 13:16:56',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            12 => 
            array (
                'id' => 13,
                'IP' => '216.218.223.53',
                'country' => 'United States',
                'city' => 'Fremont',
                'region' => 'California',
                'code' => 'US',
                'created_at' => '2023-04-07 15:15:38',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            13 => 
            array (
                'id' => 14,
                'IP' => '216.218.223.53',
                'country' => 'United States',
                'city' => 'Fremont',
                'region' => 'California',
                'code' => 'US',
                'created_at' => '2023-04-07 15:18:51',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            14 => 
            array (
                'id' => 15,
                'IP' => '188.133.46.171',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-04-11 23:49:04',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            15 => 
            array (
                'id' => 16,
                'IP' => '2a01:cb00:12f7:8400:c1e1:f395:e89:51a3',
                'country' => 'France',
                'city' => 'Colombes',
                'region' => 'Île-de-France',
                'code' => 'FR',
                'created_at' => '2023-04-12 00:00:51',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            16 => 
            array (
                'id' => 17,
                'IP' => '45.248.78.202',
                'country' => 'Australia',
                'city' => 'Perth',
                'region' => 'Western Australia',
                'code' => 'AU',
                'created_at' => '2023-04-12 06:03:38',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            17 => 
            array (
                'id' => 18,
                'IP' => '103.107.196.150',
                'country' => 'Australia',
                'city' => 'Perth',
                'region' => 'Western Australia',
                'code' => 'AU',
                'created_at' => '2023-04-13 06:35:37',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            18 => 
            array (
                'id' => 19,
                'IP' => '2800:a4:3031:7a00:39f7:ce0d:65e5:4a5a',
                'country' => 'Uruguay',
                'city' => 'Montevideo',
                'region' => 'Montevideo Department',
                'code' => 'UY',
                'created_at' => '2023-04-13 15:21:01',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            19 => 
            array (
                'id' => 20,
                'IP' => '2800:a4:3031:7a00:2057:495f:4b4f:f225',
                'country' => 'Uruguay',
                'city' => 'Montevideo',
                'region' => 'Montevideo Department',
                'code' => 'UY',
                'created_at' => '2023-04-13 18:05:35',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            20 => 
            array (
                'id' => 21,
                'IP' => '2401:4900:5ae9:db46:1984:354d:f843:ea52',
                'country' => 'India',
                'city' => 'Sitapur',
                'region' => 'Uttar Pradesh',
                'code' => 'IN',
                'created_at' => '2023-04-14 20:33:14',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            21 => 
            array (
                'id' => 22,
                'IP' => '2804:1b3:a802:6d04:3d25:da35:41b1:3c9d',
                'country' => 'Brazil',
                'city' => 'Campinas',
                'region' => 'Sao Paulo',
                'code' => 'BR',
                'created_at' => '2023-04-14 20:37:59',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            22 => 
            array (
                'id' => 23,
                'IP' => '151.251.44.25',
                'country' => 'Bulgaria',
                'city' => 'Aksakovo Municipality',
                'region' => 'Varna',
                'code' => 'BG',
                'created_at' => '2023-04-14 21:07:52',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            23 => 
            array (
                'id' => 24,
                'IP' => '103.107.196.150',
                'country' => 'Australia',
                'city' => 'Perth',
                'region' => 'Western Australia',
                'code' => 'AU',
                'created_at' => '2023-04-15 15:27:11',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            24 => 
            array (
                'id' => 25,
                'IP' => '186.152.234.96',
                'country' => 'Argentina',
                'city' => 'Rosario',
                'region' => 'Santa Fe',
                'code' => 'AR',
                'created_at' => '2023-04-15 22:25:26',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            25 => 
            array (
                'id' => 26,
                'IP' => '154.20.151.63',
                'country' => 'Canada',
                'city' => 'Chilliwack',
                'region' => 'British Columbia',
                'code' => 'CA',
                'created_at' => '2023-04-16 02:29:38',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            26 => 
            array (
                'id' => 27,
                'IP' => '196.191.221.126',
                'country' => 'Ethiopia',
                'city' => 'Addis Ababa',
                'region' => 'Addis Ababa',
                'code' => 'ET',
                'created_at' => '2023-04-16 05:01:51',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            27 => 
            array (
                'id' => 28,
                'IP' => '5.155.141.11',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-04-16 05:08:45',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            28 => 
            array (
                'id' => 29,
                'IP' => '2401:4900:1c17:19c9:1c3a:9bbb:a64c:77da',
                'country' => 'India',
                'city' => 'Pune',
                'region' => 'Maharashtra',
                'code' => 'IN',
                'created_at' => '2023-04-16 20:48:59',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            29 => 
            array (
                'id' => 30,
                'IP' => '2804:29b8:5060:9d3:b92f:554b:b0b9:2833',
                'country' => 'Brazil',
                'city' => 'Pereiro',
                'region' => 'Ceara',
                'code' => 'BR',
                'created_at' => '2023-04-16 20:57:56',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            30 => 
            array (
                'id' => 31,
                'IP' => '103.107.196.149',
                'country' => 'Australia',
                'city' => 'Perth',
                'region' => 'Western Australia',
                'code' => 'AU',
                'created_at' => '2023-04-17 08:15:20',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            31 => 
            array (
                'id' => 32,
                'IP' => '197.162.213.179',
                'country' => 'Egypt',
                'city' => 'Tanta',
                'region' => 'Gharbia',
                'code' => 'EG',
                'created_at' => '2023-04-19 05:52:30',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            32 => 
            array (
                'id' => 33,
                'IP' => '73.158.116.177',
                'country' => 'United States',
                'city' => 'Los Altos',
                'region' => 'California',
                'code' => 'US',
                'created_at' => '2023-04-19 07:00:13',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            33 => 
            array (
                'id' => 34,
                'IP' => '188.133.23.52',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-04-19 16:21:18',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            34 => 
            array (
                'id' => 35,
                'IP' => '2405:201:e004:596a:3d27:c78a:7161:2abc',
                'country' => 'India',
                'city' => 'Chennai',
                'region' => 'Tamil Nadu',
                'code' => 'IN',
                'created_at' => '2023-04-20 06:57:49',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            35 => 
            array (
                'id' => 36,
                'IP' => '2601:644:4700:f7a0:51b2:5c9d:9264:dd2e',
                'country' => 'United States',
                'city' => 'San Pablo',
                'region' => 'California',
                'code' => 'US',
                'created_at' => '2023-04-20 10:28:11',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            36 => 
            array (
                'id' => 37,
                'IP' => '178.134.197.99',
                'country' => 'Georgia',
                'city' => 'Batumi',
                'region' => 'Achara',
                'code' => 'GE',
                'created_at' => '2023-04-21 19:46:36',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            37 => 
            array (
                'id' => 38,
                'IP' => '188.133.45.5',
                'country' => 'Syria',
                'city' => 'Qadsayyā',
                'region' => 'Rif-dimashq',
                'code' => 'SY',
                'created_at' => '2023-04-21 22:51:47',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            38 => 
            array (
                'id' => 39,
                'IP' => '116.206.14.50',
                'country' => 'Indonesia',
                'city' => 'Bandung',
                'region' => 'West Java',
                'code' => 'ID',
                'created_at' => '2023-04-22 02:06:19',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            39 => 
            array (
                'id' => 40,
                'IP' => '136.158.42.161',
                'country' => 'Philippines',
                'city' => 'Valenzuela',
                'region' => 'Metro Manila',
                'code' => 'PH',
                'created_at' => '2023-04-22 05:48:36',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            40 => 
            array (
                'id' => 41,
                'IP' => '182.234.220.177',
                'country' => 'Taiwan',
                'city' => 'New Taipei',
                'region' => 'New Taipei',
                'code' => 'TW',
                'created_at' => '2023-04-22 11:17:44',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            41 => 
            array (
                'id' => 42,
                'IP' => '93.41.61.231',
                'country' => 'Italy',
                'city' => 'Padova',
                'region' => 'Veneto',
                'code' => 'IT',
                'created_at' => '2023-04-23 14:58:11',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            42 => 
            array (
                'id' => 43,
                'IP' => '136.158.32.169',
                'country' => 'Philippines',
                'city' => 'Taguig',
                'region' => 'Metro Manila',
                'code' => 'PH',
                'created_at' => '2023-04-23 17:23:22',
                'updated_at' => '2023-09-18 22:33:32',
            ),
            43 => 
            array (
                'id' => 44,
                'IP' => '103.107.196.149',
                'country' => 'Australia',
                'city' => 'Perth',
                'region' => 'Western Australia',
                'code' => 'AU',
                'created_at' => '2023-04-26 13:45:46',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            44 => 
            array (
                'id' => 45,
                'IP' => '145.249.55.7',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-04-27 00:02:19',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            45 => 
            array (
                'id' => 46,
                'IP' => '77.255.56.152',
                'country' => 'Poland',
                'city' => 'Warsaw',
                'region' => 'Mazovia',
                'code' => 'PL',
                'created_at' => '2023-04-27 04:33:54',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            46 => 
            array (
                'id' => 47,
                'IP' => '40.77.139.5',
                'country' => 'United States',
                'city' => 'Chicago',
                'region' => 'Illinois',
                'code' => 'US',
                'created_at' => '2023-04-29 09:51:02',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            47 => 
            array (
                'id' => 48,
                'IP' => '117.205.189.17',
                'country' => 'India',
                'city' => 'Silchar',
                'region' => 'Assam',
                'code' => 'IN',
                'created_at' => '2023-05-04 09:17:39',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            48 => 
            array (
                'id' => 49,
                'IP' => '89.39.104.193',
                'country' => 'Netherlands',
                'city' => 'Naaldwijk',
                'region' => 'South Holland',
                'code' => 'NL',
                'created_at' => '2023-05-10 01:44:59',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            49 => 
            array (
                'id' => 50,
                'IP' => '178.253.95.112',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-05-11 16:31:48',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            50 => 
            array (
                'id' => 51,
                'IP' => '178.253.95.112',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-05-11 16:38:33',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            51 => 
            array (
                'id' => 52,
                'IP' => '178.253.95.112',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-05-11 16:38:47',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            52 => 
            array (
                'id' => 53,
                'IP' => '178.253.95.112',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-05-11 16:39:29',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            53 => 
            array (
                'id' => 54,
                'IP' => '102.88.62.88',
                'country' => 'Nigeria',
                'city' => 'Lagos',
                'region' => 'Lagos',
                'code' => 'NG',
                'created_at' => '2023-05-19 08:04:01',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            54 => 
            array (
                'id' => 55,
                'IP' => '102.88.62.24',
                'country' => 'Nigeria',
                'city' => 'Lagos',
                'region' => 'Lagos',
                'code' => 'NG',
                'created_at' => '2023-05-19 08:06:02',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            55 => 
            array (
                'id' => 56,
                'IP' => '94.47.51.10',
                'country' => 'Syria',
                'city' => 'Qadsayyā',
                'region' => 'Rif-dimashq',
                'code' => 'SY',
                'created_at' => '2023-05-19 19:42:50',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            56 => 
            array (
                'id' => 57,
                'IP' => '94.47.51.10',
                'country' => 'Syria',
                'city' => 'Qadsayyā',
                'region' => 'Rif-dimashq',
                'code' => 'SY',
                'created_at' => '2023-05-19 19:42:51',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            57 => 
            array (
                'id' => 58,
                'IP' => '94.47.51.10',
                'country' => 'Syria',
                'city' => 'Qadsayyā',
                'region' => 'Rif-dimashq',
                'code' => 'SY',
                'created_at' => '2023-05-19 19:42:55',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            58 => 
            array (
                'id' => 59,
                'IP' => '188.171.23.25',
                'country' => 'Spain',
                'city' => 'Cabanaquinta',
                'region' => 'Principality of Asturias',
                'code' => 'ES',
                'created_at' => '2023-05-24 18:40:29',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            59 => 
            array (
                'id' => 60,
                'IP' => '83.5.195.222',
                'country' => 'Poland',
                'city' => 'Warsaw',
                'region' => 'Mazovia',
                'code' => 'PL',
                'created_at' => '2023-06-01 08:04:34',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            60 => 
            array (
                'id' => 61,
                'IP' => '82.84.68.67',
                'country' => 'Italy',
                'city' => 'Milan',
                'region' => 'Lombardy',
                'code' => 'IT',
                'created_at' => '2023-06-01 11:53:34',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            61 => 
            array (
                'id' => 62,
                'IP' => '188.133.38.36',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-06-03 04:10:13',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            62 => 
            array (
                'id' => 63,
                'IP' => '66.249.64.129',
                'country' => 'United States',
                'city' => 'Mountain View',
                'region' => 'California',
                'code' => 'US',
                'created_at' => '2023-06-05 01:26:48',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            63 => 
            array (
                'id' => 64,
                'IP' => '31.9.182.70',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-06-07 21:19:05',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            64 => 
            array (
                'id' => 65,
                'IP' => '94.47.155.235',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-06-09 05:15:40',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            65 => 
            array (
                'id' => 66,
                'IP' => '94.47.155.235',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-06-09 05:17:31',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            66 => 
            array (
                'id' => 67,
                'IP' => '94.47.155.235',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-06-09 05:18:04',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            67 => 
            array (
                'id' => 68,
                'IP' => '40.77.188.88',
                'country' => 'United States',
                'city' => 'Chicago',
                'region' => 'Illinois',
                'code' => 'US',
                'created_at' => '2023-06-17 16:04:27',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            68 => 
            array (
                'id' => 69,
                'IP' => '5.155.8.41',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-06-26 03:31:42',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            69 => 
            array (
                'id' => 70,
                'IP' => '66.249.66.43',
                'country' => 'United States',
                'city' => 'Mountain View',
                'region' => 'California',
                'code' => 'US',
                'created_at' => '2023-06-30 11:03:54',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            70 => 
            array (
                'id' => 71,
                'IP' => '31.9.153.43',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-07-09 16:50:40',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            71 => 
            array (
                'id' => 72,
                'IP' => '169.150.218.7',
                'country' => 'Netherlands',
                'city' => 'Amsterdam',
                'region' => 'North Holland',
                'code' => 'NL',
                'created_at' => '2023-07-13 20:05:35',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            72 => 
            array (
                'id' => 73,
                'IP' => '172.104.228.6',
                'country' => 'Germany',
                'city' => 'Frankfurt am Main',
                'region' => 'Hesse',
                'code' => 'DE',
                'created_at' => '2023-07-14 19:49:33',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            73 => 
            array (
                'id' => 74,
                'IP' => '188.160.139.224',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-07-18 21:46:56',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            74 => 
            array (
                'id' => 75,
                'IP' => '188.71.238.91',
                'country' => 'Kuwait',
                'city' => 'Kuwait City',
                'region' => 'Al Asimah',
                'code' => 'KW',
                'created_at' => '2023-08-18 18:26:36',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            75 => 
            array (
                'id' => 76,
                'IP' => '188.71.238.91',
                'country' => 'Kuwait',
                'city' => 'Kuwait City',
                'region' => 'Al Asimah',
                'code' => 'KW',
                'created_at' => '2023-08-18 18:28:47',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            76 => 
            array (
                'id' => 77,
                'IP' => '5.0.91.2',
                'country' => 'Syria',
                'city' => 'Homs',
                'region' => 'Homs Governorate',
                'code' => 'SY',
                'created_at' => '2023-09-02 21:18:24',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            77 => 
            array (
                'id' => 78,
                'IP' => '5.0.91.2',
                'country' => 'Syria',
                'city' => 'Homs',
                'region' => 'Homs Governorate',
                'code' => 'SY',
                'created_at' => '2023-09-02 21:26:48',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            78 => 
            array (
                'id' => 79,
                'IP' => '5.155.222.45',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-09-03 09:56:21',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            79 => 
            array (
                'id' => 80,
                'IP' => '94.47.177.76',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-09-03 19:48:19',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            80 => 
            array (
                'id' => 81,
                'IP' => '94.47.139.50',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-09-03 20:04:51',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            81 => 
            array (
                'id' => 82,
                'IP' => '5.0.9.170',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-09-05 01:56:52',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            82 => 
            array (
                'id' => 83,
                'IP' => '5.0.181.239',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-09-09 07:42:49',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            83 => 
            array (
                'id' => 84,
                'IP' => '5.0.181.239',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-09-09 08:14:55',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            84 => 
            array (
                'id' => 85,
                'IP' => '5.0.181.239',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-09-09 08:15:03',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            85 => 
            array (
                'id' => 86,
                'IP' => '5.0.58.192',
                'country' => 'Syria',
                'city' => 'Qadsayyā',
                'region' => 'Rif-dimashq',
                'code' => 'SY',
                'created_at' => '2023-09-09 08:28:09',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            86 => 
            array (
                'id' => 87,
                'IP' => '5.155.101.7',
                'country' => 'Syria',
                'city' => 'Damascus',
                'region' => 'Damascus Governorate',
                'code' => 'SY',
                'created_at' => '2023-09-18 20:25:06',
                'updated_at' => '2023-09-18 22:33:33',
            ),
            87 => 
            array (
                'id' => 88,
                'IP' => '2803:9800:9440:51d2:4182:d584:34f1:5950',
                'country' => 'Argentina',
                'city' => 'San Miguel de Tucumán',
                'region' => 'Tucuman',
                'code' => 'AR',
                'created_at' => '2023-09-29 19:07:45',
                'updated_at' => '2023-09-29 19:07:45',
            ),
            88 => 
            array (
                'id' => 89,
                'IP' => '188.70.57.4',
                'country' => 'Kuwait',
                'city' => 'Kuwait City',
                'region' => 'Al Asimah',
                'code' => 'KW',
                'created_at' => '2023-09-29 19:09:09',
                'updated_at' => '2023-09-29 19:09:09',
            ),
            89 => 
            array (
                'id' => 90,
                'IP' => '188.71.219.220',
                'country' => 'Kuwait',
                'city' => 'Kuwait City',
                'region' => 'Al Asimah',
                'code' => 'KW',
                'created_at' => '2023-09-29 19:09:47',
                'updated_at' => '2023-09-29 19:09:47',
            ),
        ));
        
        
    }
}