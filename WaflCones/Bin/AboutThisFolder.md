#Application utilities
These helpful command-line scripts can be run in Windows (.bat) or Linux.

##DeployDatabaseChanges
Executes and pending database changes (from NextUpdate.sql by default), 
archives the changes, and deletes the NextUpdate.sql contents (so as not to run more than once).

##WaflCones
If creating a non-web application, this file will execute the application (rename to match your app).

##RunIntegrationTests
Use the registered integration testing extension (Selenium by default) to execute the application's integration tests (from WaflCones/Tests)

##RunUnitTests
Use the registered unit testing extension (PhpUnit by default) to execute the application's integration tests (from WaflCones/Tests)

##UpdateDataModel
Generate/update the application's data models from the configured data storage/database.
If you're doing database-first development, then you should run this script when you first create the database and after any changes are made to the database.
It will automatically update your application's data models.
It will also create the corresponding functional model if it doesn't exist.