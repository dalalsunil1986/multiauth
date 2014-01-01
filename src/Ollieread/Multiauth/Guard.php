<?php namespace Ollieread\Multiauth;

use Illuminate\Auth\Guard as OriginalGuard;
use Illuminate\Auth\UserProviderInterface;
use Illuminate\Session\Store as SessionStore;

class Guard extends OriginalGuard {
	
	protected $name;
	
	public function __construct(UserProviderInterface $provider, SessionStore $session, $name, Request $request = null) {
		parent::__construct($provider, $session, $request);
		
		$this->name = $name;
	}
	
	public function getName() {
		return 'login_' . $this->name . '_' . md5(get_class($this));
	}
	
	public function getRecallerName() {
		return 'remember_' . $this->name . '_' . md5(get_class($this));
	}
	
}
