# About this component

Het Contacten Component bevat lijsten van contact personen, hiermee heeft het vanuit bron perspectief doorgaans een aanvullende of vervangende taak ten opzichte van het BRP. Met andere woorden in het Contacten Component vinden we personen die we niet uit het BRP halen. Dat kan zijn, omdat deze personen niet in het BRP staan, we nog niet weten wat het BSN van een persoon is of omdat we simpelweg geen rechten of toegang hebben tot het BRP vanuit het proces waar we mee bezig zijn.

Daarnaast fungeert het Contacten Component als een Common Ground variant van de contactpersonenlijst zoals we die kennen vanuit een e-mail applicatie of telefoon. Het is dus ook mogelijk om personen op te nemen in een contactenlijst. Hiermee worden contact en functionaliteiten voor gebruikers (in application form) gerealiseerd.

Als laatste biedt het Contacten Component de mogelijkheid om gegevens van organisaties op te slaan. Het component ondersteunt bewust alleen de persoonsgegevens, maar kan in samenwerking met het CMR en ORC een Customer Relation Management systeem vormen, waarbij het ORC de mogelijkheid biedt om bijvoorbeeld leads in kaart te brengen.

## Documentation

- [Installation manual](https://github.com/ConductionNL/contactencomponent/blob/master/INSTALLATION.md).
- [contributing](https://github.com/ConductionNL/contactencomponent/blob/master/CONTRIBUTING.md) for tips tricks and general rules concerning contributing to this component.
- [codebase](https://github.com/ConductionNL/contactencomponent) on github.
- [codebase](https://github.com/ConductionNL/contactencomponent/archive/master.zip) as a download.

## Features
This repository uses the power of the [commonground proto component](https://github.com/ConductionNL/commonground-component) provide common ground specific functionality based on the [VNG Api Strategie](https://docs.geostandaarden.nl/api/API-Strategie/). Including  

* Comes with a paired [React](https://reactjs.org/) application, to provide face to your code
* And a fully functional (and automatically updated) [React Admin](https://marmelab.com/react-admin/) backend to easily test and proof your component
* Design your own data model as plain old PHP classes or [**import an existing one**](https://api-platform.com/docs/schema-generator)
  from the [Schema.org](https://schema.org/) vocabulary
* **Expose in minutes a hypermedia REST or a GraphQL API** with pagination, data validation, access control, relation embedding,
  filters and error handling...
* Benefit from Content Negotiation: [GraphQL](http://graphql.org), [JSON-LD](http://json-ld.org), [Hydra](http://hydra-cg.com),
  [HAL](http://stateless.co/hal_specification.html), [JSONAPI](https://jsonapi.org/), [YAML](http://yaml.org/), [JSON](http://www.json.org/), [XML](https://www.w3.org/XML/) and [CSV](https://www.ietf.org/rfc/rfc4180.txt) are supported out of the box
* Enjoy the **beautiful automatically generated API documentation** (Swagger/[OpenAPI](https://www.openapis.org/))
* Add [**a convenient Material Design administration interface**](https://api-platform.com/docs/admin) built with [React](https://reactjs.org/)
  without writing a line of code
* **Scaffold fully functional Progressive-Web-Apps and mobile apps** built with [React](https://api-platform.com/docs/client-generator/react), [Vue.js](https://api-platform.com/docs/client-generator/vuejs) or [React Native](https://api-platform.com/docs/client-generator/react-native) thanks to [the client
  generator](https://api-platform.com/docs/client-generator) (a Vue.js generator is also available)
* Install a development environment and deploy your project in production using **[Docker](https://api-platform.com/docs/distribution#using-the-official-distribution-recommended)** and [Kubernetes](https://api-platform.com/docs/deployment/kubernetes)
* Easily add **[JSON Web Token](https://api-platform.com/docs/core/jwt) or [OAuth](https://oauth.net/) authentication**
* Create specs and tests with a **developer friendly API testing tool** on top of [Behat](http://behat.org/)
* use **thousands of Symfony bundles and React components** with API Platform
* reuse **all your Symfony and React skills**, benefit of the incredible amount of documentation available
* enjoy the popular [Doctrine ORM](http://www.doctrine-project.org/projects/orm.html) (used by default, but fully optional:
  you can use the data provider you want, including but not limited to MongoDB and ElasticSearch)
  

Credits
-------

## License
Copyright &copy; [Gemeente Utrecht](https://www.utrecht.nl/)  2019 

[Licensed under the EUPL](LICENCE.md)

