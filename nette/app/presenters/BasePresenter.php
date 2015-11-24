<?php

namespace App\Presenters;

use Nette;
use App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    public function startup()
    {
        parent::startup();

        if( !$this->user->isLoggedIn() )
        {
            if($this->name == 'Sign'){return;}
            $this->redirect('Sign:in');
        }
        $this->template->username = $this->user->getIdentity()->meno . " " . $this->user->getIdentity()->priezvisko;
        $this->template->userinfo = $this->user->getIdentity();

    }


}
