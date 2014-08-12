#Overview
This folder holds instructions for the database engine to execute in the following scenarios:

- During a deployment/promotion (or optionally during application bootstrapping), the target environment database does not exist.
- During a deployment/promotion, the target environment database is outdated.

#CreateDatabase.sql
The commands to execute if the target environment database (or optionally the runtime environment database) does not exist.

#NextUpdate.sql
The commands to execute if the target environment database is outdated.

*After NextUpdate.sql runs, this file will be archived in the Output folder and then blanked out, so that the same commands never run more than once.*