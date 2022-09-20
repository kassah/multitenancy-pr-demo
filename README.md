# Multi-tenancy via Authentication Example

This example serves to show how multi-tenancy could be used based on authentication.

## Usage

* `./vendor/bin/sail up -d` to bring up Laravel Sail
* `./vendor/bin/sail migrate:fresh` to wipe and migrate the database.
* `./vendor/bin/sail db:seed`
* open your browser to http://localhost/
* login with user: test@tenant.com / password
* click "Tenant Test" tab
* observe "You're a part of Tenant" that shows the users tenant.
* sign out
* login with user: test@notenant.com / password
* click "Tenant Test" tab
* observe exception "The request expected a current tenant but none was set."

## Reference Code

Commits below implemented functionality.

* ce7b5c808fc662e3c0895e64b311bf3dcedb99d1 - Base Install of Saptie Multi-tenancy.
* 84d9a80afd8505b9f83b85838b6cb9e661eca929 - Applied Authentication Aware Tenant logic to Laravel application.
* 20e08791a4251169c19950c865a2d5bb08131fe5 - Created test view to observe current tenant.
* 825c6e2b163febe7c42b7679f7ea34d81a2cb811 - Database Seeder 
