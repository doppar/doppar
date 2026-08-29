<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | The mailer used whenever a Mailable is sent without an explicit
    | ->driver() override on the Mail facade. Must match a key below.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Doppar's mailer is Symfony Mailer under the hood, so every entry here
    | ultimately resolves to a Symfony Transport DSN. You can either:
    |
    |   1) Set 'dsn' directly to any scheme Symfony understands - smtp://,
    |      smtps:// (implicit TLS), sendmail://, native://, null://, or a
    |      bridge scheme once its package is installed (mailgun+api://,
    |      ses+api://, postmark+api://, brevo+api://, sendgrid+api://, ...),
    |      or
    |   2) For an smtp-style mailer, leave 'dsn' empty and fill in host,
    |      port, username, password, encryption and local_domain instead -
    |      MailService assembles the DSN for you.
    |
    | Symfony also understands compound DSNs for high availability, which
    | you can use as a literal 'dsn' string:
    |
    |   'dsn' => 'failover(smtp://primary sendmail://default)'
    |   'dsn' => 'roundrobin(smtp://one smtp://two)'
    |
    | Failover tries transports in order until one succeeds; round-robin load
    | balances across them.
    |
    */

    'mailers' => [

        'smtp' => [
            'dsn' => env('MAILER_DSN'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
            'timeout' => env('MAIL_TIMEOUT'),
        ],

        'sendmail' => [
            'dsn' => env('MAIL_SENDMAIL_DSN', 'sendmail://default'),
        ],

        'null' => [
            'dsn' => 'null://null',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all emails sent by your application to be sent from
    | the same address. Here you may specify a name and address that is
    | used globally for all emails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Message Signing
    |--------------------------------------------------------------------------
    |
    | Symfony Mime can sign every outgoing email with DKIM (RFC 6376) and/or
    | wrap it as a signed S/MIME message. Both rely on PHP's openssl
    | extension. Leave a signer disabled to skip it entirely - it is applied
    | to every mailer above, right before the message is sent.
    |
    */

    'signing' => [

        'dkim' => [
            'enabled' => env('MAIL_DKIM_ENABLED', false),
            'private_key' => env('MAIL_DKIM_PRIVATE_KEY'), // PEM string, or a "file://..." path
            'passphrase' => env('MAIL_DKIM_PASSPHRASE', ''),
            'domain' => env('MAIL_DKIM_DOMAIN'),
            'selector' => env('MAIL_DKIM_SELECTOR'),
        ],

        'smime' => [
            'enabled' => env('MAIL_SMIME_ENABLED', false),
            'certificate' => env('MAIL_SMIME_CERTIFICATE'), // path to a PEM certificate
            'private_key' => env('MAIL_SMIME_PRIVATE_KEY'), // path to a PEM private key
            'passphrase' => env('MAIL_SMIME_PASSPHRASE'),
        ],
    ],
];
