<?php

namespace BB;

abstract class SpotHitResources
{

    public static $sendSms = array(SpotHitClient::POST_METHOD, 'api/envoyer/sms');
    public static $sendEmail = array(SpotHitClient::POST_METHOD, 'api/envoyer/e-mail');

}