## Bcc outgoing emails

Sending bcc from all outgoing emails.

### Requirements

- laravel >=5.2.*

### Installation

1. Update your `config/app.php` by adding the SwiftBcc provider
```php
/**
 * Set SwiftBcc provider
 */
SwiftBcc\SwiftBccProvider::class,
```

2. Update your `config/mail.php` with a `bcc` key
```php
/**
 * Mail where all copies go
 */
'bcc' => 'a.b@example.com',
```