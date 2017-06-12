<?php
/**
 * SwiftBccProvider file
 */
namespace SwiftBcc;

use Illuminate\Support\ServiceProvider;

/**
 * SwiftBccProvider class
 */
class SwiftBccProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var boolean
	 */
	protected $defer = true;
	
	/**
	 * Register SwiftBcc as plugin
	 *
	 * @return null
	 */
	public function register() {
		
		// register SwiftBcc as a singleton in the application
		$this->app->singleton('SwiftBcc\SwiftBcc', function ($app) {
			return new \SwiftBcc\SwiftBcc($app['config']->get('mail'));
		});

		// register SwiftBcc as a plugin for swift mail library
		$this->app->extend('swift.mailer', function (\Swift_Mailer $objSwiftMailer, $app) {
			$objSwiftMailer->registerPlugin($app->make('SwiftBcc\SwiftBcc'));
			return $objSwiftMailer;
		});
	}
	
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return ['SwiftBcc\SwiftBcc'];
	}
}