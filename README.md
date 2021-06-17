# contactcatalogus

[![StyleCI](https://github.styleci.io/repos/206145398/shield?branch=master)](https://github.styleci.io/repos/206145398?branch=master)
[![Docker Image CI](https://github.com/ConductionNL/contactcatalogus/workflows/Docker%20Image%20CI/badge.svg?branch=master)](https://github.com/ConductionNL/contactcatalogus/actions?query=workflow%3A"Docker+Image+CI")
[![Artifacthub](https://img.shields.io/endpoint?url=https://artifacthub.io/badge/repository/contact-catalogus)](https://artifacthub.io/packages/helm/contact-catalogus/contactcatalogus)
[![BCH compliance](https://bettercodehub.com/edge/badge/ConductionNL/contactcatalogus?branch=master)](https://bettercodehub.com/)
[![Componenten Catalogus](https://img.shields.io/badge/vng--componentencatalogus-posted-green)](https://componentencatalogus.commonground.nl/componenten/180?)
[![Status badge](https://shields.api-test.nl/endpoint.svg?style=for-the-badge&url=https%3A//api-test.nl/api/v1/provider-latest-badge/e447f8d0-b4f2-4911-a22b-e770f5a288b4/)](https://api-test.nl/server/4/f76cdd7a-b147-47c4-829b-f85132182b25/e447f8d0-b4f2-4911-a22b-e770f5a288b4/latest/)

Description
----
Het Contacten Component bevat lijsten van contactpersonen, hiermee heeft het vanuit bron perspectief doorgaans een aanvullende of vervangende taak ten opzichte van het BRP. Met andere woorden in het Contacten Component vinden we personen die we niet uit het BRP halen. Dat kan zijn, omdat deze personen niet in het BRP staan, we nog niet weten wat het BSN van een persoon is of omdat we simpelweg geen rechten of toegang hebben tot het BRP vanuit het proces waar we mee bezig zijn.

Daarnaast fungeert het Contacten Component als een Common Ground variant van de contactpersonenlijst, zoals we die kennen vanuit een e-mail applicatie of telefoon. Het is dus ook mogelijk om personen op te nemen in een contactenlijst. Hiermee worden contact en functionaliteiten voor gebruikers (in application form) gerealiseerd.

Als laatste biedt het Contacten Component de mogelijkheid om gegevens van organisaties op te slaan. Het component ondersteunt bewust alleen de persoonsgegevens, maar kan in samenwerking met het CMR en ORC een Customer Relation Management systeem vormen, waarbij het ORC de mogelijkheid biedt om bijvoorbeeld leads in kaart te brengen.

Additional Information
----

- [Contributing](CONTRIBUTING.md)
- [ChangeLogs](CHANGELOG.md)
- [RoadMap](ROADMAP.md)
- [Security](SECURITY.md)
- [Licence](LICENSE.md)


Installation
----
We differentiate between two way's of installing this component, a local installation as part of the provided developers toolkit or an [helm](https://helm.sh/) installation on an development or production environment.

#### Local installation
First make sure you have [docker desktop](https://www.docker.com/products/docker-desktop) running on your computer. Then clone the repository to a directory on your local machine through a [git command](https://github.com/git-guides/git-clone) or [git kraken](https://www.gitkraken.com) (ui for git). If successful you can now navigate to the directory of your cloned repository in a command prompt and execute docker-compose up.
```CLI
$ docker-compose up
```
This will build the docker image and run the used containers and when seeing the log from the php container: "NOTICE: ready to handle connections", u are ready to view the documentation at localhost on your preferred browser.

#### Instalation on Kubernetes or Haven
As a haven compliant commonground component this component is installable on kubernetes trough helm. The helm files can be found in the api/helm folder. For installing this component trough helm simply open your (still) favorite command line interface and run
```CLI
$ helm install [name] ./api/helm --kubeconfig kubeconfig.yaml --namespace [name] --set settings.env=prod,settings.debug=0,settings.cache=1
```
For an in depth installation guide you can refer to the [installation guide](/api/helm) contained with the helm files, it also contains a short tutorial on getting your cluster ready to expose your installation to the world

Standards
----

This component adheres to international, national and local standards (in that order), notable standards are:

- Any applicable [W3C](https://www.w3.org) standard, including but not limited to [rest](https://www.w3.org/2001/sw/wiki/REST), [JSON-LD](https://www.w3.org/TR/json-ld11/) and [WEBSUB](https://www.w3.org/TR/websub/)
- Any applicable [schema](https://schema.org/) standard
- [OpenAPI Specification](https://github.com/OAI/OpenAPI-Specification/blob/master/versions/3.0.0.md)
- [GAIA-X](https://www.data-infrastructure.eu/GAIAX/Navigation/EN/Home/home.html)
- [Publiccode](https://docs.italia.it/italia/developers-italia/publiccodeyml-en/en/master/index.html), see the [publiccode](api/public/schema/publiccode.yaml) for further information
- [Forum Stanaardisatie](https://www.forumstandaardisatie.nl/open-standaarden)
- [NL API Strategie](https://docs.geostandaarden.nl/api/API-Strategie/)
- [Common Ground Realisatieprincipes](https://componentencatalogus.commonground.nl/20190130_-_Common_Ground_-_Realisatieprincipes.pdf)
- [Haven](https://haven.commonground.nl/docs/de-standaard)
- [NLX](https://docs.nlx.io/understanding-the-basics/introduction)
- [Standard for Public Code](https://standard.publiccode.net/), see the [compliancy scan](publiccode.md) for further information.

This component is based on the following [schema.org](https://schema.org) sources:
- [Address](https://schema.org/PostalAddress)
- [Person](https://schema.org/Person)

Developers toolkit and technical information
----
You can find the data model, OAS documentation and other helpfull developers material like a  postman collection under api/public/schema, development support is provided trough the [samenorganiseren slack channel](https://join.slack.com/t/samenorganiseren/shared_invite/zt-dex1d7sk-wy11sKYWCF0qQYjJHSMW5Q).

Couple of quick tips when you start developing
- If you not yet have setup the component locally read the Tutorial for setting up your local environment.
- You can find the other components on [Github](https://github.com/ConductionNL).
- Take a look at the [commonground componenten catalogus](https://componentencatalogus.commonground.nl/componenten?) to prevent development collitions.
- Use [Commongroun.conduction.nl](https://commonground.conduction.nl/) for easy deployment of test environments to deploy your development to.
- For information on how to work with the component you can refer to the tutorial [here](TUTORIAL.md).


Contributing
----
First of al please read the [Contributing](CONTRIBUTING.md) guideline's ;)

But most imporantly, welcome! We strife to keep an active community at [commonground.nl](https://commonground.nl/), please drop by and tell is what you are thinking about so that we can help you along.


Credits
----
Information about the authors of this component can be found [here](AUTHORS.md)

Copyright © [Utrecht](https://www.utrecht.nl/) 2019
