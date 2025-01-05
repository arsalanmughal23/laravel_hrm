<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
	// php artisan db:seed --class=CountriesTableSeeder

	public function run(): void
    {
        DB::table('countries')->delete();

        $countries = array(
            array('id' => 1,'code' => 'AF' ,'name' => "Afghanistan", 'status_id' => 1),
            array('id' => 2,'code' => 'AL' ,'name' => "Albania", 'status_id' => 1),
            array('id' => 3,'code' => 'DZ' ,'name' => "Algeria", 'status_id' => 1),
            array('id' => 4,'code' => 'AS' ,'name' => "American Samoa", 'status_id' => 1),
            array('id' => 5,'code' => 'AD' ,'name' => "Andorra", 'status_id' => 1),
            array('id' => 6,'code' => 'AO' ,'name' => "Angola", 'status_id' => 1),
            array('id' => 7,'code' => 'AI' ,'name' => "Anguilla", 'status_id' => 1),
            array('id' => 8,'code' => 'AQ' ,'name' => "Antarctica", 'status_id' => 1),
            array('id' => 9,'code' => 'AG' ,'name' => "Antigua And Barbuda", 'status_id' => 1),
            array('id' => 10,'code' => 'AR','name' => "Argentina", 'status_id' => 1),
            array('id' => 11,'code' => 'AM','name' => "Armenia", 'status_id' => 1),
            array('id' => 12,'code' => 'AW','name' => "Aruba", 'status_id' => 1),
            array('id' => 13,'code' => 'AU','name' => "Australia", 'status_id' => 1),
            array('id' => 14,'code' => 'AT','name' => "Austria", 'status_id' => 1),
            array('id' => 15,'code' => 'AZ','name' => "Azerbaijan", 'status_id' => 1),
            array('id' => 16,'code' => 'BS','name' => "Bahamas The", 'status_id' => 1),
            array('id' => 17,'code' => 'BH','name' => "Bahrain", 'status_id' => 1),
            array('id' => 18,'code' => 'BD','name' => "Bangladesh", 'status_id' => 1),
            array('id' => 19,'code' => 'BB','name' => "Barbados", 'status_id' => 1),
            array('id' => 20,'code' => 'BY','name' => "Belarus", 'status_id' => 1),
            array('id' => 21,'code' => 'BE','name' => "Belgium", 'status_id' => 1),
            array('id' => 22,'code' => 'BZ','name' => "Belize", 'status_id' => 1),
            array('id' => 23,'code' => 'BJ','name' => "Benin", 'status_id' => 1),
            array('id' => 24,'code' => 'BM','name' => "Bermuda", 'status_id' => 1),
            array('id' => 25,'code' => 'BT','name' => "Bhutan", 'status_id' => 1),
            array('id' => 26,'code' => 'BO','name' => "Bolivia", 'status_id' => 1),
            array('id' => 27,'code' => 'BA','name' => "Bosnia and Herzegovina", 'status_id' => 1),
            array('id' => 28,'code' => 'BW','name' => "Botswana", 'status_id' => 1),
            array('id' => 29,'code' => 'BV','name' => "Bouvet Island", 'status_id' => 1),
            array('id' => 30,'code' => 'BR','name' => "Brazil", 'status_id' => 1),
            array('id' => 31,'code' => 'IO','name' => "British Indian Ocean Territory", 'status_id' => 1),
            array('id' => 32,'code' => 'BN','name' => "Brunei", 'status_id' => 1),
            array('id' => 33,'code' => 'BG','name' => "Bulgaria", 'status_id' => 1),
            array('id' => 34,'code' => 'BF','name' => "Burkina Faso", 'status_id' => 1),
            array('id' => 35,'code' => 'BI','name' => "Burundi", 'status_id' => 1),
            array('id' => 36,'code' => 'KH','name' => "Cambodia", 'status_id' => 1),
            array('id' => 37,'code' => 'CM','name' => "Cameroon", 'status_id' => 1),
            array('id' => 38,'code' => 'CA','name' => "Canada", 'status_id' => 1),
            array('id' => 39,'code' => 'CV','name' => "Cape Verde", 'status_id' => 1),
            array('id' => 40,'code' => 'KY','name' => "Cayman Islands", 'status_id' => 1),
            array('id' => 41,'code' => 'CF','name' => "Central African Republic", 'status_id' => 1),
            array('id' => 42,'code' => 'TD','name' => "Chad", 'status_id' => 1),
            array('id' => 43,'code' => 'CL','name' => "Chile", 'status_id' => 1),
            array('id' => 44,'code' => 'CN','name' => "China", 'status_id' => 1),
            array('id' => 45,'code' => 'CX','name' => "Christmas Island", 'status_id' => 1),
            array('id' => 46,'code' => 'CC','name' => "Cocos (Keeling) Islands", 'status_id' => 1),
            array('id' => 47,'code' => 'CO','name' => "Colombia", 'status_id' => 1),
            array('id' => 48,'code' => 'KM','name' => "Comoros", 'status_id' => 1),
            array('id' => 49,'code' => 'CG','name' => "Congo", 'status_id' => 1),
            array('id' => 50,'code' => 'CD','name' => "Congo The Democratic Republic Of The", 'status_id' => 1),
            array('id' => 51,'code' => 'CK','name' => "Cook Islands", 'status_id' => 1),
            array('id' => 52,'code' => 'CR','name' => "Costa Rica", 'status_id' => 1),
            array('id' => 53,'code' => 'CI','name' => "Cote D Ivoire (Ivory Coast)", 'status_id' => 1),
            array('id' => 54,'code' => 'HR','name' => "Croatia (Hrvatska)", 'status_id' => 1),
            array('id' => 55,'code' => 'CU','name' => "Cuba", 'status_id' => 1),
            array('id' => 56,'code' => 'CY','name' => "Cyprus", 'status_id' => 1),
            array('id' => 57,'code' => 'CZ','name' => "Czech Republic", 'status_id' => 1),
            array('id' => 58,'code' => 'DK','name' => "Denmark", 'status_id' => 1),
            array('id' => 59,'code' => 'DJ','name' => "Djibouti", 'status_id' => 1),
            array('id' => 60,'code' => 'DM','name' => "Dominica", 'status_id' => 1),
            array('id' => 61,'code' => 'DO','name' => "Dominican Republic", 'status_id' => 1),
            array('id' => 62,'code' => 'TP','name' => "East Timor", 'status_id' => 1),
            array('id' => 63,'code' => 'EC','name' => "Ecuador", 'status_id' => 1),
            array('id' => 64,'code' => 'EG','name' => "Egypt", 'status_id' => 1),
            array('id' => 65,'code' => 'SV','name' => "El Salvador", 'status_id' => 1),
            array('id' => 66,'code' => 'GQ','name' => "Equatorial Guinea", 'status_id' => 1),
            array('id' => 67,'code' => 'ER','name' => "Eritrea", 'status_id' => 1),
            array('id' => 68,'code' => 'EE','name' => "Estonia", 'status_id' => 1),
            array('id' => 69,'code' => 'ET','name' => "Ethiopia", 'status_id' => 1),
            array('id' => 70,'code' => 'XA','name' => "External Territories of Australia", 'status_id' => 1),
            array('id' => 71,'code' => 'FK','name' => "Falkland Islands", 'status_id' => 1),
            array('id' => 72,'code' => 'FO','name' => "Faroe Islands", 'status_id' => 1),
            array('id' => 73,'code' => 'FJ','name' => "Fiji Islands", 'status_id' => 1),
            array('id' => 74,'code' => 'FI','name' => "Finland", 'status_id' => 1),
            array('id' => 75,'code' => 'FR','name' => "France", 'status_id' => 1),
            array('id' => 76,'code' => 'GF','name' => "French Guiana", 'status_id' => 1),
            array('id' => 77,'code' => 'PF','name' => "French Polynesia", 'status_id' => 1),
            array('id' => 78,'code' => 'TF','name' => "French Southern Territories", 'status_id' => 1),
            array('id' => 79,'code' => 'GA','name' => "Gabon", 'status_id' => 1),
            array('id' => 80,'code' => 'GM','name' => "Gambia The", 'status_id' => 1),
            array('id' => 81,'code' => 'GE','name' => "Georgia", 'status_id' => 1),
            array('id' => 82,'code' => 'DE','name' => "Germany", 'status_id' => 1),
            array('id' => 83,'code' => 'GH','name' => "Ghana", 'status_id' => 1),
            array('id' => 84,'code' => 'GI','name' => "Gibraltar", 'status_id' => 1),
            array('id' => 85,'code' => 'GR','name' => "Greece", 'status_id' => 1),
            array('id' => 86,'code' => 'GL','name' => "Greenland", 'status_id' => 1),
            array('id' => 87,'code' => 'GD','name' => "Grenada", 'status_id' => 1),
            array('id' => 88,'code' => 'GP','name' => "Guadeloupe", 'status_id' => 1),
            array('id' => 89,'code' => 'GU','name' => "Guam", 'status_id' => 1),
            array('id' => 90,'code' => 'GT','name' => "Guatemala", 'status_id' => 1),
            array('id' => 91,'code' => 'XU','name' => "Guernsey and Alderney", 'status_id' => 1),
            array('id' => 92,'code' => 'GN','name' => "Guinea", 'status_id' => 1),
            array('id' => 93,'code' => 'GW','name' => "Guinea-Bissau", 'status_id' => 1),
            array('id' => 94,'code' => 'GY','name' => "Guyana", 'status_id' => 1),
            array('id' => 95,'code' => 'HT','name' => "Haiti", 'status_id' => 1),
            array('id' => 96,'code' => 'HM','name' => "Heard and McDonald Islands", 'status_id' => 1),
            array('id' => 97,'code' => 'HN','name' => "Honduras", 'status_id' => 1),
            array('id' => 98,'code' => 'HK','name' => "Hong Kong S.A.R.", 'status_id' => 1),
            array('id' => 99,'code' => 'HU','name' => "Hungary", 'status_id' => 1),
            array('id' => 100,'code' => 'IS','name' => "Iceland", 'status_id' => 1),
            array('id' => 101,'code' => 'IN','name' => "India", 'status_id' => 1),
            array('id' => 102,'code' => 'ID','name' => "Indonesia", 'status_id' => 1),
            array('id' => 103,'code' => 'IR','name' => "Iran", 'status_id' => 1),
            array('id' => 104,'code' => 'IQ','name' => "Iraq", 'status_id' => 1),
            array('id' => 105,'code' => 'IE','name' => "Ireland", 'status_id' => 1),
            array('id' => 106,'code' => 'IL','name' => "Israel", 'status_id' => 1),
            array('id' => 107,'code' => 'IT','name' => "Italy", 'status_id' => 1),
            array('id' => 108,'code' => 'JM','name' => "Jamaica", 'status_id' => 1),
            array('id' => 109,'code' => 'JP','name' => "Japan", 'status_id' => 1),
            array('id' => 110,'code' => 'XJ','name' => "Jersey", 'status_id' => 1),
            array('id' => 111,'code' => 'JO','name' => "Jordan", 'status_id' => 1),
            array('id' => 112,'code' => 'KZ','name' => "Kazakhstan", 'status_id' => 1),
            array('id' => 113,'code' => 'KE','name' => "Kenya", 'status_id' => 1),
            array('id' => 114,'code' => 'KI','name' => "Kiribati", 'status_id' => 1),
            array('id' => 115,'code' => 'KP','name' => "Korea North", 'status_id' => 1),
            array('id' => 116,'code' => 'KR','name' => "Korea South", 'status_id' => 1),
            array('id' => 117,'code' => 'KW','name' => "Kuwait", 'status_id' => 1),
            array('id' => 118,'code' => 'KG','name' => "Kyrgyzstan", 'status_id' => 1),
            array('id' => 119,'code' => 'LA','name' => "Laos", 'status_id' => 1),
            array('id' => 120,'code' => 'LV','name' => "Latvia", 'status_id' => 1),
            array('id' => 121,'code' => 'LB','name' => "Lebanon", 'status_id' => 1),
            array('id' => 122,'code' => 'LS','name' => "Lesotho", 'status_id' => 1),
            array('id' => 123,'code' => 'LR','name' => "Liberia", 'status_id' => 1),
            array('id' => 124,'code' => 'LY','name' => "Libya", 'status_id' => 1),
            array('id' => 125,'code' => 'LI','name' => "Liechtenstein", 'status_id' => 1),
            array('id' => 126,'code' => 'LT','name' => "Lithuania", 'status_id' => 1),
            array('id' => 127,'code' => 'LU','name' => "Luxembourg", 'status_id' => 1),
            array('id' => 128,'code' => 'MO','name' => "Macau S.A.R.", 'status_id' => 1),
            array('id' => 129,'code' => 'MK','name' => "Macedonia", 'status_id' => 1),
            array('id' => 130,'code' => 'MG','name' => "Madagascar", 'status_id' => 1),
            array('id' => 131,'code' => 'MW','name' => "Malawi", 'status_id' => 1),
            array('id' => 132,'code' => 'MY','name' => "Malaysia", 'status_id' => 1),
            array('id' => 133,'code' => 'MV','name' => "Maldives", 'status_id' => 1),
            array('id' => 134,'code' => 'ML','name' => "Mali", 'status_id' => 1),
            array('id' => 135,'code' => 'MT','name' => "Malta", 'status_id' => 1),
            array('id' => 136,'code' => 'XM','name' => "Man (Isle of)", 'status_id' => 1),
            array('id' => 137,'code' => 'MH','name' => "Marshall Islands", 'status_id' => 1),
            array('id' => 138,'code' => 'MQ','name' => "Martinique", 'status_id' => 1),
            array('id' => 139,'code' => 'MR','name' => "Mauritania", 'status_id' => 1),
            array('id' => 140,'code' => 'MU','name' => "Mauritius", 'status_id' => 1),
            array('id' => 141,'code' => 'YT','name' => "Mayotte", 'status_id' => 1),
            array('id' => 142,'code' => 'MX','name' => "Mexico", 'status_id' => 1),
            array('id' => 143,'code' => 'FM','name' => "Micronesia", 'status_id' => 1),
            array('id' => 144,'code' => 'MD','name' => "Moldova", 'status_id' => 1),
            array('id' => 145,'code' => 'MC','name' => "Monaco", 'status_id' => 1),
            array('id' => 146,'code' => 'MN','name' => "Mongolia", 'status_id' => 1),
            array('id' => 147,'code' => 'MS','name' => "Montserrat", 'status_id' => 1),
            array('id' => 148,'code' => 'MA','name' => "Morocco", 'status_id' => 1),
            array('id' => 149,'code' => 'MZ','name' => "Mozambique", 'status_id' => 1),
            array('id' => 150,'code' => 'MM','name' => "Myanmar", 'status_id' => 1),
            array('id' => 151,'code' => 'NA','name' => "Namibia", 'status_id' => 1),
            array('id' => 152,'code' => 'NR','name' => "Nauru", 'status_id' => 1),
            array('id' => 153,'code' => 'NP','name' => "Nepal", 'status_id' => 1),
            array('id' => 154,'code' => 'AN','name' => "Netherlands Antilles", 'status_id' => 1),
            array('id' => 155,'code' => 'NL','name' => "Netherlands The", 'status_id' => 1),
            array('id' => 156,'code' => 'NC','name' => "New Caledonia", 'status_id' => 1),
            array('id' => 157,'code' => 'NZ','name' => "New Zealand", 'status_id' => 1),
            array('id' => 158,'code' => 'NI','name' => "Nicaragua", 'status_id' => 1),
            array('id' => 159,'code' => 'NE','name' => "Niger", 'status_id' => 1),
            array('id' => 160,'code' => 'NG','name' => "Nigeria", 'status_id' => 1),
            array('id' => 161,'code' => 'NU','name' => "Niue", 'status_id' => 1),
            array('id' => 162,'code' => 'NF','name' => "Norfolk Island", 'status_id' => 1),
            array('id' => 163,'code' => 'MP','name' => "Northern Mariana Islands", 'status_id' => 1),
            array('id' => 164,'code' => 'NO','name' => "Norway", 'status_id' => 1),
            array('id' => 165,'code' => 'OM','name' => "Oman", 'status_id' => 1),
            array('id' => 166,'code' => 'PK','name' => "Pakistan", 'status_id' => 1),
            array('id' => 167,'code' => 'PW','name' => "Palau", 'status_id' => 1),
            array('id' => 168,'code' => 'PS','name' => "Palestinian Territory Occupied", 'status_id' => 1),
            array('id' => 169,'code' => 'PA','name' => "Panama", 'status_id' => 1),
            array('id' => 170,'code' => 'PG','name' => "Papua new Guinea", 'status_id' => 1),
            array('id' => 171,'code' => 'PY','name' => "Paraguay", 'status_id' => 1),
            array('id' => 172,'code' => 'PE','name' => "Peru", 'status_id' => 1),
            array('id' => 173,'code' => 'PH','name' => "Philippines", 'status_id' => 1),
            array('id' => 174,'code' => 'PN','name' => "Pitcairn Island", 'status_id' => 1),
            array('id' => 175,'code' => 'PL','name' => "Poland", 'status_id' => 1),
            array('id' => 176,'code' => 'PT','name' => "Portugal", 'status_id' => 1),
            array('id' => 177,'code' => 'PR','name' => "Puerto Rico", 'status_id' => 1),
            array('id' => 178,'code' => 'QA','name' => "Qatar", 'status_id' => 1),
            array('id' => 179,'code' => 'RE','name' => "Reunion", 'status_id' => 1),
            array('id' => 180,'code' => 'RO','name' => "Romania", 'status_id' => 1),
            array('id' => 181,'code' => 'RU','name' => "Russia", 'status_id' => 1),
            array('id' => 182,'code' => 'RW','name' => "Rwanda", 'status_id' => 1),
            array('id' => 183,'code' => 'SH','name' => "Saint Helena", 'status_id' => 1),
            array('id' => 184,'code' => 'KN','name' => "Saint Kitts And Nevis", 'status_id' => 1),
            array('id' => 185,'code' => 'LC','name' => "Saint Lucia", 'status_id' => 1),
            array('id' => 186,'code' => 'PM','name' => "Saint Pierre and Miquelon", 'status_id' => 1),
            array('id' => 187,'code' => 'VC','name' => "Saint Vincent And The Grenadines", 'status_id' => 1),
            array('id' => 188,'code' => 'WS','name' => "Samoa", 'status_id' => 1),
            array('id' => 189,'code' => 'SM','name' => "San Marino", 'status_id' => 1),
            array('id' => 190,'code' => 'ST','name' => "Sao Tome and Principe", 'status_id' => 1),
            array('id' => 191,'code' => 'SA','name' => "Saudi Arabia", 'status_id' => 1),
            array('id' => 192,'code' => 'SN','name' => "Senegal", 'status_id' => 1),
            array('id' => 193,'code' => 'RS','name' => "Serbia", 'status_id' => 1),
            array('id' => 194,'code' => 'SC','name' => "Seychelles", 'status_id' => 1),
            array('id' => 195,'code' => 'SL','name' => "Sierra Leone", 'status_id' => 1),
            array('id' => 196,'code' => 'SG','name' => "Singapore", 'status_id' => 1),
            array('id' => 197,'code' => 'SK','name' => "Slovakia", 'status_id' => 1),
            array('id' => 198,'code' => 'SI','name' => "Slovenia", 'status_id' => 1),
            array('id' => 199,'code' => 'XG','name' => "Smaller Territories of the UK", 'status_id' => 1),
            array('id' => 200,'code' => 'SB','name' => "Solomon Islands", 'status_id' => 1),
            array('id' => 201,'code' => 'SO','name' => "Somalia", 'status_id' => 1),
            array('id' => 202,'code' => 'ZA','name' => "South Africa", 'status_id' => 1),
            array('id' => 203,'code' => 'GS','name' => "South Georgia", 'status_id' => 1),
            array('id' => 204,'code' => 'SS','name' => "South Sudan", 'status_id' => 1),
            array('id' => 205,'code' => 'ES','name' => "Spain", 'status_id' => 1),
            array('id' => 206,'code' => 'LK','name' => "Sri Lanka", 'status_id' => 1),
            array('id' => 207,'code' => 'SD','name' => "Sudan", 'status_id' => 1),
            array('id' => 208,'code' => 'SR','name' => "Suriname", 'status_id' => 1),
            array('id' => 209,'code' => 'SJ','name' => "Svalbard And Jan Mayen Islands", 'status_id' => 1),
            array('id' => 210,'code' => 'SZ','name' => "Swaziland", 'status_id' => 1),
            array('id' => 211,'code' => 'SE','name' => "Sweden", 'status_id' => 1),
            array('id' => 212,'code' => 'CH','name' => "Switzerland", 'status_id' => 1),
            array('id' => 213,'code' => 'SY','name' => "Syria", 'status_id' => 1),
            array('id' => 214,'code' => 'TW','name' => "Taiwan", 'status_id' => 1),
            array('id' => 215,'code' => 'TJ','name' => "Tajikistan", 'status_id' => 1),
            array('id' => 216,'code' => 'TZ','name' => "Tanzania", 'status_id' => 1),
            array('id' => 217,'code' => 'TH','name' => "Thailand", 'status_id' => 1),
            array('id' => 218,'code' => 'TG','name' => "Togo", 'status_id' => 1),
            array('id' => 219,'code' => 'TK','name' => "Tokelau", 'status_id' => 1),
            array('id' => 220,'code' => 'TO','name' => "Tonga", 'status_id' => 1),
            array('id' => 221,'code' => 'TT','name' => "Trinidad And Tobago", 'status_id' => 1),
            array('id' => 222,'code' => 'TN','name' => "Tunisia", 'status_id' => 1),
            array('id' => 223,'code' => 'TR','name' => "Turkey", 'status_id' => 1),
            array('id' => 224,'code' => 'TM','name' => "Turkmenistan", 'status_id' => 1),
            array('id' => 225,'code' => 'TC','name' => "Turks And Caicos Islands", 'status_id' => 1),
            array('id' => 226,'code' => 'TV','name' => "Tuvalu", 'status_id' => 1),
            array('id' => 227,'code' => 'UG','name' => "Uganda", 'status_id' => 1),
            array('id' => 228,'code' => 'UA','name' => "Ukraine", 'status_id' => 1),
            array('id' => 229,'code' => 'AE','name' => "United Arab Emirates", 'status_id' => 1),
            array('id' => 230,'code' => 'GB','name' => "United Kingdom", 'status_id' => 1),
            array('id' => 231,'code' => 'US','name' => "United States", 'status_id' => 1),
            array('id' => 232,'code' => 'UM','name' => "United States Minor Outlying Islands", 'status_id' => 1),
            array('id' => 233,'code' => 'UY','name' => "Uruguay", 'status_id' => 1),
            array('id' => 234,'code' => 'UZ','name' => "Uzbekistan", 'status_id' => 1),
            array('id' => 235,'code' => 'VU','name' => "Vanuatu", 'status_id' => 1),
            array('id' => 236,'code' => 'VA','name' => "Vatican City State (Holy See)", 'status_id' => 1),
            array('id' => 237,'code' => 'VE','name' => "Venezuela", 'status_id' => 1),
            array('id' => 238,'code' => 'VN','name' => "Vietnam", 'status_id' => 1),
            array('id' => 239,'code' => 'VG','name' => "Virgin Islands (British)", 'status_id' => 1),
            array('id' => 240,'code' => 'VI','name' => "Virgin Islands (US)", 'status_id' => 1),
            array('id' => 241,'code' => 'WF','name' => "Wallis And Futuna Islands", 'status_id' => 1),
            array('id' => 242,'code' => 'EH','name' => "Western Sahara", 'status_id' => 1),
            array('id' => 243,'code' => 'YE','name' => "Yemen", 'status_id' => 1),
            array('id' => 244,'code' => 'YU','name' => "Yugoslavia", 'status_id' => 1),
            array('id' => 245,'code' => 'ZM','name' => "Zambia", 'status_id' => 1),
            array('id' => 246,'code' => 'ZW','name' => "Zimbabwe", 'status_id' => 1),
        );
        DB::table('countries')->insert($countries);
    }
}
