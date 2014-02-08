<?php

    class gapi {
        
        function getFirstProfileId(&$analytics) {
            $accounts = $analytics->management_accounts->listManagementAccounts();
            if (count($accounts->getItems()) > 0) {
                $items = $accounts->getItems();
                $firstAccountId = $items[0]->getId();
                $webproperties = $analytics->management_webproperties->listManagementWebproperties($firstAccountId);
                if (count($webproperties->getItems()) > 0) {
                    $items = $webproperties->getItems();
                    $firstWebpropertyId = $items[0]->getId();
                    $profiles = $analytics->management_profiles->listManagementProfiles($firstAccountId, $firstWebpropertyId);
                    if (count($profiles->getItems()) > 0) {
                        $items = $profiles->getItems();
                        return $items[0]->getId();
                    } else {
                        throw new Exception('No profiles found for this user.');
                    }
                } else {
                    throw new Exception('No webproperties found for this user.');
                }
            } else {
                throw new Exception('No accounts found for this user.');
            }
        }

        function getResults(&$analytics, $profileId) {
            $optParams = array(
                'dimensions' => 'ga:longitude,ga:latitude',
                'sort' => '-ga:visits',
                //'filters' => 'ga:medium==organic',
                //'max-results' => '25'
            );

            return $analytics->data_ga->get(
                'ga:' . $profileId,
                date('Y-m-d', strtotime('yesterday')), //'2012-03-03',
                date('Y-m-d', strtotime('now')), //'2012-12-31',
                'ga:visits',
                $optParams);
        }

    }

?>
