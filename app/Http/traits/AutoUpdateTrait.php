<?php
namespace App\Http\traits;

trait AutoUpdateTrait{
    /*
    |============================================================
    | # For Version Upgrade - you should follow these point in DEMO :
    |       1. clientVersionNumber >= minimumRequiredVersion
    |       2. latestVersionUpgradeEnable === true
    |       3. demoVersionNumber > clientVersionNumber
    |
    |===========================================================
    */

    public function isUpdateAvailable()
    {
        $versionUpgradeData = [
            "alert_version_upgrade_enable" => false,
            "demo_version" => "1.5.1",
            "version_upgrade_file_url" => "#",
            "latest_version_db_migrate_enable" => false,
        ];

        return $versionUpgradeData;
    }

    private function stringToNumberConvert($dataString) {
        $myArray = explode(".", $dataString);
        $versionString = "";
        foreach($myArray as $element) {
          $versionString .= $element;
        }
        $versionConvertNumber = intval($versionString);
        return $versionConvertNumber;
    }
}
