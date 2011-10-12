<?php

class myUser extends sfGuardSecurityUser
{
  public function getCurrentProvider()
  {
    return $this->getGuardUser()->getTokens()->get(0)->getProvider();
  }
}
