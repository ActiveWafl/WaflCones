#DataModel
The files in this folder represent the entire data model for this application.
For most applications, each data model file will correspond to a database table.
In database-first development, the data model will be created automatically for you.

#FunctionalModel
Most of the application logic lives here.
A functional model generally has methods that apply-to the application's instance of the underlying data model.
Functional models will be generated at the same time as the data models.
However, unlike data models, functional models are never over-written.

#Creating the models automatically from a database
To reverse-engineer your database into a data model, 
first configure your database settings in Config/Settings.[environment].syrp
and then run WaflCones/Bin/UpdateDataModel.