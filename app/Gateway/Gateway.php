<?php

namespace App\Gateway;

interface Gateway
{
    public function redirectToProvider();

    public function handleProviderCallback();
}