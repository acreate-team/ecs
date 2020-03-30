<?php

 return     ['class' => 'nodge\eauth\EAuth',
            'popup' => true, // Use the popup window instead of redirecting.
            'cache' => false, // Cache component name or false to disable cache. Defaults to 'cache' on production environments.
            'cacheExpire' => 0, // Cache lifetime. Defaults to 0 - means unlimited.
            'httpClient' => array(
                // uncomment this to use streams in safe_mode
                //'useStreamsFallback' => true,
            ),
            'services' => array( // You can change the providers and their classes.
                /*
                'vkontakte' => array(
                    // register your app here: https://vk.com/editapp?act=create&site=1
                    'class' => 'nodge\eauth\services\VKontakteOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                ),
                'google' => array(
                    'class' => 'nodge\eauth\services\GoogleOpenIDService',
                    //'realm' => '*.example.org', // your domain, can be with wildcard to authenticate on subdomains.
                ),

                'yandex' => array(
                    'class' => 'nodge\eauth\services\YandexOpenIDService',
                    //'realm' => '*.example.org', // your domain, can be with wildcard to authenticate on subdomains.
                ),

                'twitter' => array(
                    // register your app here: https://dev.twitter.com/apps/new
                    'class' => 'nodge\eauth\services\TwitterOAuth1Service',
                    'key' => '...',
                    'secret' => '...',
                ),
                'google_oauth' => array(
                    // register your app here: https://code.google.com/apis/console/
                    'class' => 'nodge\eauth\services\GoogleOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                    'title' => 'Google',
                ),
                'yandex_oauth' => array(
                    // register your app here: https://oauth.yandex.ru/client/my
                    'class' => 'nodge\eauth\services\YandexOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                    'title' => 'Yandex',
                ),
                'facebook' => array(
                    // register your app here: https://developers.facebook.com/apps/
                    'class' => 'nodge\eauth\services\FacebookOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                ),
                'steam' => array(
                    'class' => 'nodge\eauth\services\SteamOpenIDService',
                    //'realm' => '*.example.org', // your domain, can be with wildcard to authenticate on subdomains.
                ),
                'odnoklassniki' => array(
                    // register your app here: http://dev.odnoklassniki.ru/wiki/pages/viewpage.action?pageId=13992188
                    // ... or here: http://www.odnoklassniki.ru/dk?st.cmd=appsInfoMyDevList&st._aid=Apps_Info_MyDev
                    'class' => 'nodge\eauth\services\OdnoklassnikiOAuth2Service',
                    'clientId' => '...',
                    'clientSecret' => '...',
                    'clientPublic' => '...',
                    'title' => 'Odnoklas.',
                ),
                                 */
            )];