<?php

require('stripe-php-master/init.php');
$publishablekey="pk_test_51IEvoIG16j1OpvbDbilrkjJ5SUJKnEj2o4iirscaGrDUuKAlLs0s2cCkWPaD1liLr79iwzESQns79tgwvPaGunHU00m2uUXvlQ";
$secretkey="sk_test_51IEvoIG16j1OpvbDaeucm19TyCEK8tMmxA3gBUPOOypBnOVUmyiRCTHwYzqUjeijBlOIw3zfQKNJjjvPyyPz9GF000ZEDNfiEs";
\Stripe\Stripe::setApiKey($secretkey);
?>