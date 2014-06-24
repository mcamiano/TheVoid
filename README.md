Small half-baked sample of employing Sentry in stand-alone one-of page
flipping ping-ponging transaction Point of Service (P.O.S.) apps.

## Instructions

Clone the repo.

`composer install` the dependencies.

Open a SQL gui tool or mysql command line and import the Sentry schema located under `vendor/cartalyst/sentry/schema/mysql.sql`

*Do not run the Sentry schema sql blindly against an existing database: it drops tables.*

Access index.php 

On the first access, index.php file redirects through a couple of scripts, 
one to seed groups/permissions, and the next to seed a couple of users, after which
it ping-pongs back to index.php.

## What it does

Not much. After setting up some sample data, the form allows attempts to login
over https, and attempts to authenticate and authorize users, dying on
an error if it fails and dumping the permissions if it succeeds.
